@php use Illuminate\Support\Facades\Storage; @endphp
<div class="scene">
    <!-- Camera View -->
    <div class="camera-view">
        @foreach($scene->views as $sceneView)
            <button wire:click.prevent="viewSelected({{ $sceneView->id }})" class="camera__item d-flex flex-column"
                    data-view="{{ $sceneView->data_view }}">
                <img data-view="{{ $sceneView->data_view }}" class="camera__item_img {{ $sceneView->name }}"
                     src="{{ Storage::url($sceneView->images()->where('type', 'black_bg')->first()->path) }}" alt=""/>
                <span class="camera__item_txt">{{ $sceneView->name }}</span>
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
                <div class="f-panzoom__content" id="myPanzoom">
                    <img usemap="#image-map" id="scene-img" class="loading-jpg scene__bg"
                         src="{{ Storage::url($background_img) }}" alt="{{ $background_img }}"/>

                    @if($foreground_img)
                        <img class="loading-jpg foreground foreground-{{ $scene->img_class }} active"
                             src="{{ Storage::url($foreground_img) }}" alt="{{ $foreground_img }}"/>
                    @endif

                    <!-- Object Images -->
                    <div class="object__images">
                        @foreach($categories as $category)
                            <div class="{{ $category->div_class }}">
                                @foreach($category->products as $product)
                                    @php
                                        $productConfiguration = collect($product->productConfigurations)
                                            ->where('view_id', $view->id)
                                            ->where('is_visible', true)
                                            ->first();
                                    @endphp
{{--                                    <img class="loading-jpg {{ $category->img_class }} {{ $product->isInCart($product->id, $cart_id) ? 'object-visible' : ''}}"--}}
                                    @if($productConfiguration)
                                        <img class="loading-jpg {{ $category->img_class }} {{ in_array($productConfiguration->product_id, $selected_products) ? 'object-visible' : ''}}"
                                             src="{{ Storage::url($productConfiguration?->images()->where('type', 'transparent_bg')->first()?->path) }}"
                                             data-object="{{ $productConfiguration?->data_object }}"
                                             data-product="{{ $product->name }}"
                                             data-price="{{ $product->price?->value }}"
                                             data-remove="{{ $category->data_mask }}"
                                             alt="{{ $product->image?->path }}"/>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach

                    </div>

                    <!-- Masks -->
                    <div class="masks-container">
                        <div id="{{ $view->scene->slug }}-masks" class="kitchen-mask {{ $view->scene->slug }}-masks">
                            <div class="kitchen-{{ $view->name }} active">
                                @foreach($view->items as $item)
                                    <div class="mask_btn {{ $view->scene->slug }}-{{ $view->name }}-{{ $item->div_class }}" data-mask="{{ $item->category->data_mask }}"></div>
                                @endforeach
                            </div>
                        </div>

                        @foreach($categories as $category)
                            <img class="mask mask-{{ $category->data_mask }}" data-mask="{{ $category->data_mask }}" src="{{ $category->id == $category_mask_id ? Storage::url($mask_img) : '' }}"
                                 alt="wall-panels"/>
                        @endforeach

                    </div>
                </div>
            </div>

            <!-- Order Menu -->
            <x-orders.menu :selected-products="$selected_products"/>
        </div>
    </div>

    <!-- Custom Menu -->
    <livewire:categories.index :viewId="$view->id"/>
    <!-- Options Desktop -->
    <div class="options">
        <!-- Save -->
        <livewire:options.save-button/>

        <!-- Camera View -->
        <livewire:options.camera-view-button/>

        <!-- Download -->
        <livewire:options.download-button/>

        <!-- Print -->
        <livewire:options.print-button/>

        <!-- Share -->
        <livewire:options.share-button/>
    </div>

    <!-- Options Mobile -->
    <div class="options-container">
        <div class="options-mobile">
            <!-- Save -->
            <livewire:options.save-button/>

            <!-- Camera View -->
            <livewire:options.camera-view-button/>

            <!-- Download -->
            <livewire:options.download-button/>

            <!-- Print -->
            <livewire:options.print-button/>

            <!-- Share -->
            <livewire:options.share-button/>
        </div>

        <button class="open-options-btn">
            <img src="{{ asset('img/icons/open-options-btn.svg') }}" alt=""/>
        </button>
    </div>

    <!-- Saved Modal -->
    <x-modals.saved-modal :selected-products="$selected_products" />

</div>
