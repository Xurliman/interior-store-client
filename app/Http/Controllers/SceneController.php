<?php

namespace App\Http\Controllers;

use App\Helpers\ImageMerger;
use App\Http\Resources\Scene\SceneResource;
use App\Models\Product;
use App\Models\Scene;
use App\Models\Setting;
use App\Models\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SceneController extends Controller
{
    public function index()
    {
        $scenes = SceneResource::collection(Scene::with('views')
            ->where('is_visible', true)
            ->get()
        );
        return view('scenes.index', compact('scenes'));
    }

    public function show(Scene $scene)
    {
        return view('scenes.show', compact('scene'));
    }

    public function printView(Request $request)
    {
        $request->validate([
            'view_id' => 'required|integer|exists:views,id',
            'products' => 'required'
        ]);
        $products = json_decode($request->products, 1);
        return $this->generatePdf($products, $request->view_id)->stream('download.pdf');
    }

    public function downloadPDF(Request $request)
    {
        $request->validate([
            'view_id' => 'required|integer|exists:views,id',
            'products' => 'required'
        ]);
        $products = json_decode($request->products, 1);
        return $this->generatePdf($products, $request->view_id)->download('download.pdf');
    }

    public function generatePdf($products, $viewId): \Barryvdh\DomPDF\PDF
    {
        $view = View::firstWhere('id', $viewId);
        $printImg = "storage/".ImageMerger::imageCreateForView(
            $view,
            collect($products)->pluck('product_id')->toArray());
        return Pdf::loadView('scenes.preview-print', [
            'print_img' => $printImg,
            'setting' => Setting::first(),
            'products' => Product::whereIn('id', collect($products)->pluck('product_id')->toArray())->get(),
        ]);
    }
}
