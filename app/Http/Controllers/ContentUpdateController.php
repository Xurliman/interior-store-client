<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContentUpdate;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductConfiguration;
use App\Models\Scene;
use App\Models\User;
use App\Models\View;
use App\Models\ViewItem;
use App\Notifications\UpdateInstalledNotification;
use App\Notifications\ValidationErrorNotification;
use BaconQrCode\Exception\RuntimeException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Application;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Response;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Intervention\Image\ImageManager;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Throwable;
use ZipArchive;

class ContentUpdateController extends Controller
{
    /**
     * @throws RuntimeException|ConnectionException|Throwable
     */
    public function manageContentUpdate($id)
    {
        try {
            $licensingServerUrl = config('license.licensing_server_url');
            $storeId = config('license.store_id');
            $data = $this->downloadUpdate($licensingServerUrl, $storeId);
            $content = $this->unzip($data['filename'], $storeId);
            Storage::disk('public')->deleteDirectory($storeId);
            $response = $this->mapData($content->path, $content);
            $responseMsg = json_decode($response->getContent(),1);
            if ($content['status'] == "failed" && count($responseMsg) == 1) {
                File::deleteDirectory($content->path);
                ContentUpdate::firstWhere('id', $content->id)->delete();
                $users = User::role('admin')->get();

                $notificationMsg = $responseMsg['message'];
                Notification::send($users, new ValidationErrorNotification($notificationMsg));
                return redirect()->back();
            }
            Storage::disk('public')->delete($responseMsg);
            $this->verifyUpload($data['content_update_id'], $licensingServerUrl);
            DatabaseNotification::find($id)->markAsRead();
            $users = User::role('admin')->get();
            Notification::send($users, new UpdateInstalledNotification());
            return redirect()->back();
        } catch (ConnectionException|RuntimeException|QueryException|ValidationException $exception) {
            return response([
                'message' => $exception->getMessage(),
                'code' => $exception->getCode() ?? 500,
            ]);
        }
    }

    /**
     * @param $licensingServerUrl
     * @param $storeId
     * @return array
     * @throws RuntimeException
     * @throws ConnectionException
     */
    public function downloadUpdate($licensingServerUrl, $storeId): array
    {
        $response = Http::post("$licensingServerUrl/api/download-update", [
            'store_id' => $storeId,
        ]);
        $contentUpdateId = json_decode($response->getHeaderLine('X-Additional-Data'), 1)['content_update_id'] ?? null;
        if (!$contentUpdateId) {
            throw new RuntimeException('There is no available update.', 201);
        }
        if (!$response->successful()) {
            throw new ConnectionException('Error during downloading update.', 301);
        }
        $tempFilePath = tempnam(sys_get_temp_dir(), 'downloaded_');

        $fileStream = fopen($tempFilePath, 'wb');
        if ($fileStream === false) {
            throw new RuntimeException('Failed to create temporary file.', 401);
        }
        $responseBody = $response->body();
        $chunkSize = 1024 * 8;
        $responseStream = fopen('php://memory', 'r+');
        fwrite($responseStream, $responseBody);
        rewind($responseStream);

        while (!feof($responseStream)) {
            $chunk = fread($responseStream, $chunkSize);
            fwrite($fileStream, $chunk);
        }

        fclose($fileStream);
        fclose($responseStream);
        $filename = $storeId."/".now()->format('Ymd_His').'.zip';
        Storage::disk('public')->put($filename, file_get_contents($tempFilePath));
        unlink($tempFilePath);
        return array(
            'filename' => $filename,
            'content_update_id' => $contentUpdateId
        );
    }

    public function unzip($fileName, $storeId)
    {
        $filePath = Storage::disk('public')->path($fileName);
        $zip = new ZipArchive();
        $res = $zip->open($filePath);
        if ($res === false) {
            throw new RuntimeException('Failed to open zip file.');
        }
        $extractionPath = storage_path("app/updates/$storeId/".now()->format('YmdHis'));
        $content = ContentUpdate::create([
            'description' => 'Installation was not successful',
            'path' => $extractionPath,
            'update_installed_at' => now(),
            'status' => "failed",
        ]);
        $zip->extractTo($extractionPath);
        $zip->close();
        if (file_exists("$extractionPath/__MACOSX")) {
            File::deleteDirectory("$extractionPath/__MACOSX");
            $extractedFiles = scandir($extractionPath);
            $extractedFiles = array_diff($extractedFiles, array('.', '..'));
            if (count($extractedFiles) === 1 && is_dir($extractionPath . '/' . reset($extractedFiles))) {
                $innerFolder = $extractionPath . '/' . reset($extractedFiles);
                $filesInInnerFolder = scandir($innerFolder);
                $filesInInnerFolder = array_diff($filesInInnerFolder, array('.', '..'));

                foreach ($filesInInnerFolder as $file) {
                    rename($innerFolder . '/' . $file, $extractionPath . '/' . $file);
                }

                File::deleteDirectory($innerFolder);
            }
        }
        return $content;
    }

    /**
     * @throws Throwable
     */
    public function mapData($updateFolder, $content): Application|Response|ResponseFactory
    {
        DB::beginTransaction();
        try {
            $oldImages = Image::where('imageable_type', View::class)
                ->orWhere('imageable_type', Product::class)
                ->orWhere('imageable_type', ProductConfiguration::class)
                ->get();
            Image::destroy(
                collect($oldImages)
                    ->pluck('id')
                    ->toArray()
            );
            Scene::destroy(Scene::all()->pluck('id')->toArray());
            ViewItem::destroy(ViewItem::all()->pluck('id')->toArray());
            Category::destroy(Category::all()->pluck('id')->toArray());
            ProductConfiguration::destroy(ProductConfiguration::all()->pluck('id')->toArray());

            $jsonFilePath = glob("$updateFolder/*.json")[0];
            $jsonStringContent = file_get_contents($jsonFilePath);
            $jsonArrayContent = json_decode($jsonStringContent, true);
            $newSceneData = $newViewData = $newCategoryData = $newProductData = $newViewItemData = $newProductConfigData = $newImageData = [];
            $manager = ImageManager::gd();

            foreach ($jsonArrayContent['scenes'] as $scene) {
                $this->sceneValidate($scene);
                $newSceneData[] = array(
                    'id' => $scene['id'],
                    'name' => $scene['name'],
                    'slug' => $scene['slug'],
                    'created_at' => now(),
                    'updated_at' => now(),
                );
                foreach ($scene['views'] as $view) {
                    $this->viewValidate($view, $updateFolder);
                    $newViewData[] = array(
                        'id' => $view['id'],
                        'scene_id' => $scene['id'],
                        'name' => $view['name'],
                        'is_default' => $view['is_default'],
                        'is_visible' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    );
                    foreach ($view['view_images'] as $type => $image) {
                        $newFileName = $this->storeImage($image['path'], $updateFolder, $manager);
                        $newImageData[] = array(
                            'type' => $type,
                            'path' => $newFileName,
                            'imageable_id' => $view['id'],
                            'imageable_type' => 'App\Models\View',
                            'created_at' => now(),
                            'updated_at' => now(),
                        );
                    }
                }

                foreach ($scene['categories'] as $category) {
                    $this->categoryValidate($category);
                    $newCategoryData[] = array(
                        'id' => $category['id'],
                        'name' => $category['name'],
                        'layer_order' => $category['layer_order'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    );
                }

                foreach ($scene['clickable_zones'] as $viewItem) {
                    $this->viewItemValidate($viewItem);
                    $viewItemIds = collect($newViewItemData)->pluck('id')->toArray();
                    if (!in_array($viewItem['id'], $viewItemIds)) {
                        $newViewItemData[] = array(
                            'id' => $viewItem['id'],
                            'category_id' => $viewItem['category_id'],
                            'view_id' => $viewItem['view_id'],
                            'width' => $viewItem['width'],
                            'height' => $viewItem['height'],
                            'top' => $viewItem['top'],
                            'bottom' => $viewItem['bottom'],
                            'left' => $viewItem['left'],
                            'right' => $viewItem['right'],
                            'created_at' => now(),
                            'updated_at' => now(),
                        );
                    }
                }

                foreach ($scene['products'] as $product) {
                    $this->productValidate($product, $updateFolder);
                    $newProductData[] = array(
                        'id' => $product['id'],
                        'category_id' => $product['category_id'],
                        'name' => $product['name'],
                        'short_name' => $product['short_name'],
                        'description' => $product['description'],
                        'dimensions' => $product['dimensions'],
                        'price' => $product['price'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    );
                    $newFileName = $this->storeImage($product['image'], $updateFolder, $manager);
                    if ($newFileName == "") {
                        throw new RuntimeException('File not exists: ' . $image['path']);
                    }
                    $newImageData[] = array(
                        'type' => null,
                        'path' => $newFileName,
                        'imageable_id' => $product['id'],
                        'imageable_type' => 'App\Models\Product',
                        'created_at' => now(),
                        'updated_at' => now(),
                    );

                    foreach ($product['product_configurations'] as $product_configuration) {
                        $this->productConfigurationValidate($product_configuration, $updateFolder);
                        $productConfigurationIds = collect($newProductConfigData)->pluck('id')->toArray();
                        if (!in_array($product_configuration['id'], $productConfigurationIds)) {
                            $newProductConfigData[] = array(
                                'id' => $product_configuration['id'],
                                'product_id' => $product['id'],
                                'view_id' => $product_configuration['view_id'],
                            );

                            foreach ($product_configuration['conf_images'] as $type => $confImage) {
                                $newFileName = $this->storeImage($confImage['path'], $updateFolder, $manager);
                                if ($newFileName == "") {
                                    throw new RuntimeException('File not exists: ' . $image['path']);
                                }
                                $newImageData[] = array(
                                    'type' => $type,
                                    'path' => $newFileName,
                                    'imageable_id' => $product_configuration['id'],
                                    'imageable_type' => 'App\Models\ProductConfiguration',
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                );
                            }
                        }
                    }
                }
            }

            DB::table('scenes')->insert($newSceneData);
            DB::table('views')->insert($newViewData);
            DB::table('view_items')->insert($newViewItemData);
            DB::table('categories')->insert($newCategoryData);
            DB::table('products')->insert($newProductData);
            DB::table('product_configurations')->insert($newProductConfigData);
            $id = 1;
            DB::table('images')->insert(
                collect($newImageData)->each(function (&$image) use($id) {
                    $image[] = [
                        'id' => $id++,
                    ];
                })->toArray()
            );
            DB::commit();
            ContentUpdate::firstWhere('id', $content->id)->update([
                'status' => 'successful',
                'version' => $jsonArrayContent['global']['version'],
                'description' => $jsonArrayContent['global']['description'],
            ]);
            return response(collect($oldImages)
                ->pluck('path')
                ->toArray(), 200);

        } catch (ValidationException $exception) {
            DB::rollBack();
            return response([
                'message' => $exception->getMessage(),
            ], 422);
        } catch (RuntimeException $exception) {
            DB::rollBack();
            return response([
                'message' => $exception->getMessage()
            ], 500);
        } catch (Throwable $exception) {
            DB::rollBack();
            return response([
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * @throws ValidationException
     */
    public function sceneValidate($scene): void
    {
        $validator = Validator::make($scene, array(
            'id' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'views' => 'required',
            'categories' => 'required',
            'clickable_zones' => 'required',
            'products' => 'required',
        ));
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    /**
     * @throws ValidationException
     */
    public function viewValidate($view, $folder): void
    {
        $validator = Validator::make($view, array(
            'id' => 'required',
            'name' => 'required',
            'is_default' => 'numeric',
            'view_images' => 'required',
            'view_images.transparent_bg' => 'required',
            'view_images.black_bg' => 'required',
        ));
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        foreach ($view['view_images'] as $viewImage) {
            $path = explode('\\', $viewImage['path']);
            $fileName = $path[count($path) - 1];
            $imagePath = $folder . implode('/', array_slice($path, 0, count($path)-1)) . '/' . $fileName;
            if (!file_exists($imagePath)) {
                throw ValidationException::withMessages(["message" => "File not exists: {$viewImage['path']}"]);
            }
        }
    }

    /**
     * @throws ValidationException
     */
    public function viewItemValidate($view): void
    {
        $validator = Validator::make($view, array(
            'id' => 'required',
            'category_id' => 'required',
            'view_id' => 'required',
            'width' => 'required',
            'height' => 'required',
            'top' => 'nullable',
            'bottom' => 'nullable',
            'left' => 'nullable',
            'right' => 'nullable',
        ));
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    /**
     * @throws ValidationException
     */
    public function categoryValidate($category): void
    {
        $validator = Validator::make($category, array(
            'id' => 'required',
            'name' => 'required',
            'layer_order' => 'required',
        ));
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    /**
     * @throws ValidationException
     */
    public function productValidate($product, $folder): void
    {
        $validator = Validator::make($product, array(
            'id' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'short_name' => 'required',
            'description' => 'nullable',
            'dimensions' => 'nullable',
            'price' => 'required',
            'image' => 'required',
            'product_configurations' => 'required',
        ));
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        $path = explode('\\', $product['image']);
        $fileName = $path[count($path) - 1];
        $imagePath = $folder . implode('/', array_slice($path, 0, count($path)-1)) . '/' . $fileName;
        if (!file_exists($imagePath)) {
            throw ValidationException::withMessages(["message" => "File not exists: {$product['image']}"]);
        }
    }

    /**
     * @throws ValidationException
     */
    public function productConfigurationValidate($productConfiguration, $folder): void
    {
        $validator = Validator::make($productConfiguration, array(
            'id' => 'required',
            'view_id' => 'required',
            'conf_images' => 'required',
            'conf_images.transparent_bg' => 'required',
            'conf_images.mask_bg' => 'required',
        ));
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        foreach ($productConfiguration['conf_images'] as $confImage) {
            $path = explode('\\', $confImage['path']);
            $fileName = $path[count($path) - 1];
            $imagePath = $folder . implode('/', array_slice($path, 0, count($path)-1)) . '/' . $fileName;
            if (!file_exists($imagePath)) {
                throw ValidationException::withMessages(["message" => "File not exists: {$confImage['path']}"]);
            }
        }
    }

    public function storeImage($path, $folder, $manager): string
    {
        $path = explode('\\', $path);
        $fileName = $path[count($path) - 1];
        $imagePath = $folder . '/' . implode('/', array_slice($path, 0, count($path)-1)) . '/' . $fileName;
        $img = $manager->read($imagePath);
        $newFileName = uniqid(rand(), false).'_'.$fileName;
        $img->save(storage_path('app/public/'.$newFileName));
        return $newFileName;
    }

    public function verifyUpload($contentUpdateId, $licensingServerUrl): void
    {
        $response = Http::post("$licensingServerUrl/api/verify-update", [
            'content_update_id' => $contentUpdateId,
            'update_installed_at' => now()
        ]);
        if (!$response->successful()) {
            throw new ConflictHttpException('Having trouble verifying update.');
        }
    }
}
