@php use Illuminate\Support\Facades\Storage; @endphp
<div class="scene">
    <!-- Camera View -->
    <div class="camera-view">
        @foreach($scene->views as $sceneView)
            <button
                wire:click.prevent="viewSelected({{ $sceneView->id }})"
                class="camera__item d-flex flex-column">
                <img
                    class="camera__item_img"
                    src="{{ Storage::url($sceneView->images()->where('type', 'black_bg')->first()->path) }}"
                    alt=""/>
                <span
                    class="camera__item_txt">{{ $sceneView->name }}
                </span>
            </button>
        @endforeach
    </div>

    <!-- Scene Image / Masks / Objects -->
    <div class="view-scene">
        <!-- Popup Notify -->
        <x-layouts.popup/>

        <!-- Panzoom / Scene images -->
        <div class="my-cont">
            <div class="f-panzoom">
                <div
                    class="f-panzoom__content"
                    id="myPanzoom">
                    <img
                        usemap="#image-map"
                        id="scene-img"
                        class="loading-jpg scene__bg"
                        src="{{ Storage::url($background_img) }}"
                        alt="{{ $background_img }}"/>

                    @if($foreground_img)
                        <img
                            class="loading-jpg foreground active"
                            src="{{ Storage::url($foreground_img) }}"
                            alt="{{ $foreground_img }}"/>
                    @endif

                    <!-- Object Images -->
                    <div class="object__images">
                        @foreach($categories as $category)
                            <div>
                                @foreach($category->products as $product)
                                    @php
                                        /** @var \App\Models\ProductConfiguration $productConfiguration */
                                        $productConfiguration = collect($product->productConfigurations)
                                            ->where('view_id', $view->id)
                                            ->first();
                                    @endphp
                                    @if($productConfiguration)
                                        <img class="loading-jpg {{ in_array($productConfiguration->product_id, collect($selected_products)->pluck('product_id')->toArray()) ? 'object-visible' : ''}}"
                                             style="{{ in_array($product->id, collect($selected_products)->pluck('product_id')->toArray()) ? 'display:block;' : 'display:none;'}}"
                                             src="{{ Storage::url($productConfiguration?->images()->where('type', 'transparent_bg')->first()?->path) }}"
                                             data-product="{{ $product->name }}"
                                             data-price="{{ $product->price }}"
                                             data-remove="{{ $category->data_mask }}"
                                             alt="{{ $product->image?->path }}"/>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach

                    </div>

                    <!-- Masks -->
                    <div class="masks-container">
                        <div class="kitchen-mask active">
                            @foreach($scene->views as $sceneView)
                                @if($view->id == $sceneView->id)
                                    <div class="active">
                                        @foreach($sceneView->items as $item)
                                            <div
                                                class="mask_btn"
                                                style="width: {{$item->width}}%;
                                                height: {{$item->height}}%;
                                                {{$item->top ? "top: {$item->top}%;" : ''}}
                                                {{$item->bottom ? "bottom: {$item->bottom}%;" : ''}}
                                                {{$item->left ? "left: {$item->left}%;" : ''}}
                                                {{$item->right ? "right: {$item->right}%;" : ''}}
                                                background: transparent;
                                                position: absolute;
                                                z-index: 1;
                                                cursor: pointer;"
                                                data-mask="{{ $item->category->data_mask }}">
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="">
                                        @foreach($sceneView->items as $item)
                                            <div
                                                class="mask_btn"
                                                {{--                                            style="width: {{$item->width}}%; height: {{$item->height}}%; top: {{$item->top}}%; bottom: {{$item->bottom}}%; left: {{$item->left}}%; right: {{$item->right}}%; background: transparent; position: absolute; z-index: 1; cursor: pointer;"--}}
                                                data-mask="{{ $item->category->data_mask }}">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        @foreach($categories as $category)
                            <img
                                class="mask mask-{{ $category->data_mask }}"
                                data-mask="{{ $category->data_mask }}"
                                src="{{ !is_null($category->mask_img) ? Storage::url($category->mask_img) : '#'}}"
                                alt="{{ !is_null($category->mask_img) ? Storage::url($category->mask_img) : 'not found' }}"/>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Order Menu -->
            <livewire:orders.menu :selected-products="$selected_products"/>
        </div>
    </div>

    <!-- Custom Menu -->
    <livewire:categories.index :viewId="$view->id" :selected-products="$selected_products"/>
    <!-- Options Desktop -->
    <div class="options">
        <!-- Save -->
        <x-options.save-button x-data/>

        <!-- Camera View -->
        <x-options.camera-view-button />

        <!-- Download -->
        <livewire:options.image-download-button
            :viewId="$view->id"
            :selected-products="$selected_products" />

        <!-- Print -->
        <x-options.print-button />

        <!-- Share -->
        <x-options.share-button />
    </div>

    <!-- Options Mobile -->
    <div class="options-container">
        <div class="options-mobile">
            <!-- Save -->
            <x-options.save-button x-data/>

            <!-- Camera View -->
            <x-options.camera-view-button />

            <!-- Download -->
            <livewire:options.image-download-button
                :viewId="$view->id"
                :selected-products="$selected_products"/>

            <!-- Print -->
            <x-options.print-button />

            <!-- Share -->
            <x-options.share-button />
        </div>

        <button class="open-options-btn">
            <img src="{{ asset('img/icons/open-options-btn.svg') }}" alt=""/>
        </button>
    </div>

    <!-- Saved Modal -->
    {{--    <x-modals.saved-modal :selected-products="$selected_products" />--}}
    <livewire:options.save-to-gallery
        :view-id="$view->id"
        :selected-products="$selected_products"
        :cart="$cart"/>
</div>
