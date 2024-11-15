@php use Illuminate\Support\Facades\Storage; @endphp
<div class="scene-window active">
    <div class="scene">
        <div class="camera-view">
            @foreach($scene->views->where('is_visible', true) as $sceneView)
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

        <div class="view-scene">
            <x-layouts.popup/>

            <div class="my-cont">
                <div
                    class="f-panzoom"
                     style="overflow: hidden; user-select: none; touch-action: none;">
                    <div
                        class="f-panzoom__content"
                        id="myPanzoom"
                        style="cursor: move; user-select: none; touch-action: none; transform-origin: 50% 50%; transition: none; transform: scale(1) translate(0px, 0px);">
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
                                            <img
                                                class="loading-jpg {{ in_array($productConfiguration->product_id, collect($selected_products)->pluck('product_id')->toArray()) ? 'object-visible' : ''}}"
                                                 style="{{ in_array($product->id, collect($selected_products)->pluck('product_id')->toArray()) ? 'display:block;' : 'display:none;'}}"
                                                 src="{{ Storage::url($productConfiguration?->images()->where('type', 'transparent_bg')->first()?->path) }}"
                                                 data-product="{{ $product->name }}"
                                                 data-price="{{ $product->price }}"
                                                 alt="{{ $product->image?->path }}"/>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach

                        </div>

                        <div class="masks-container">
                            <div class="kitchen-mask active">
                                @foreach($scene->views as $sceneView)
                                    @if($view->id == $sceneView->id)
                                        <div class="active">
                                            @foreach($sceneView->items as $item)
                                                <div
                                                    x-data="{ categoryId: {{ $item->category->id }} }"
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
                                                    x-on:click="$dispatch('mask-btn-clicked', { categoryId: categoryId })">
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="">
                                            @foreach($sceneView->items as $item)
                                                <div
                                                    x-data="{ categoryId: {{ $item->category->id }} }"
                                                    class="mask_btn"
                                                    x-on:click="$dispatch('mask-btn-clicked', { categoryId: categoryId })">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            @foreach($categories as $category)
                                <img
                                    x-data="{ glitchMaskImage:false, custom:document.querySelector('.custom') }"
                                    @mask-btn-clicked.window="glitchMaskImage = ($event.detail.categoryId == {{ $category->id }});
                                        setTimeout(() => {
                                            glitchMaskImage = false;
                                        }, 200);
                                        custom.classList.add('open');"
                                    :class="{ 'active': glitchMaskImage }"
                                    class="mask"
                                    src="{{ !is_null($category->mask_img) ? Storage::url($category->mask_img) : '#'}}"
                                    alt="{{ !is_null($category->mask_img) ? Storage::url($category->mask_img) : 'not found' }}"/>
                            @endforeach
                        </div>
                    </div>
                </div>

                <livewire:orders.menu :selected-products="$selected_products"/>
                </div>
            </div>

        <livewire:categories.index :viewId="$view->id" :selected-products="$selected_products"/>
        <div class="options">
            <x-options.save-button x-data/>

            <x-options.camera-view-button />

            <livewire:options.image-download-button
                :viewId="$view->id"
                :selected-products="$selected_products" />

            <livewire:options.print-button
                :view-id="$view->id"
                :selected-products="$selected_products"/>

            <x-options.share-button />
        </div>

        <div class="options-container">
            <div class="options-mobile">
                <x-options.save-button x-data/>

                <x-options.camera-view-button />

                <livewire:options.image-download-button
                    :viewId="$view->id"
                    :selected-products="$selected_products"/>

                <livewire:options.print-button
                    :view-id="$view->id"
                    :selected-products="$selected_products"/>

                <x-options.share-button />
            </div>

            <button class="open-options-btn">
                <img src="{{ asset('img/icons/open-options-btn.svg') }}" alt=""/>
            </button>
        </div>

        <livewire:options.save-to-gallery
            :view-id="$view->id"
            :selected-products="$selected_products"
            :cart="$cart"/>
        <livewire:options.share-modal
            :view-id="$view->id"
            :selected-products="$selected_products"/>
    </div>
</div>
