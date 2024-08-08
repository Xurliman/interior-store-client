@php use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Facades\Storage; @endphp
<div class="scene">
    <!-- Camera View -->
    <div class="camera-view">
        @foreach($scene->views as $sceneView)
            <button
                wire:click.prevent="viewSelected({{ $sceneView->id }})"
                class="camera__item d-flex flex-column"
                data-view="{{ $sceneView->data_view }}">
                <img
                    data-view="{{ $sceneView->data_view }}"
                    class="camera__item_img {{ $sceneView->name }}"
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
                            class="loading-jpg foreground foreground-{{ $scene->img_class }} active"
                            src="{{ Storage::url($foreground_img) }}"
                            alt="{{ $foreground_img }}"/>
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
                                        <img
                                            class="loading-jpg {{ $category->img_class }} {{ in_array($productConfiguration->product_id, collect($selected_products)->pluck('product_id')->toArray()) ? 'object-visible' : ''}}"
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
                        <div
                            id="{{ $view->scene->slug }}-masks"
                            class="kitchen-mask {{ $view->scene->slug }}-masks active">
                            <div class="kitchen-{{ $view->name }} active">
                                @foreach($categories as $category)
                                    @php
                                        $viewItem = $category
                                            ->viewItems()
                                            ->where('view_id', $view->id)
                                            ->first();
                                    @endphp
                                    @if(!is_null($viewItem))
                                        <div
                                            class="mask_btn {{ $view->scene->slug }}-{{ $view->name }}-{{ $viewItem->div_class }}"
                                            data-mask="{{ $category->data_mask }}">

                                        </div>
                                    @else
                                        <div
                                            style="display: none"
                                            class="mask_btn {{ $view->scene->slug }}-{{ $view->name }}-{{ $category->viewItem?->div_class }}"
                                            data-mask="{{ $category->data_mask }}">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        @foreach($categories as $category)
                            @php
                                $mask_img = $category
                                    ->products()
                                    ->whereHas('productConfigurations', function (Builder $query) use ($view){
                                        $query->where('view_id', $view->id)
                                              ->where('is_visible', true);
                                    })->first()?->productConfigurations()
                                    ->where('view_id', $view->id)
                                    ->where('is_visible', true)
                                    ->first()?->images()
                                    ->where('type', 'mask_bg')
                                    ->first()?->path;
                            @endphp
                            <img
                                class="mask mask-{{ $category->data_mask }}"
                                data-mask="{{ $category->data_mask }}"
                                src="{{ $category->id == $category_mask_id ? Storage::url($mask_selected_img) : Storage::url($mask_img) }}"
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
        <x-options.save-button x-data=""/>

        <!-- Camera View -->
        <x-options.camera-view-button/>

        <!-- Download -->
        <livewire:options.image-download-button
            :viewId="$view->id"
            :selected-products="$selected_products"/>

        <!-- Print -->
        <x-options.print-button/>

        <!-- Share -->
        <x-options.share-button/>
    </div>

    <!-- Options Mobile -->
    <div class="options-container">
        <div class="options-mobile">
            <!-- Save -->
            <x-options.save-button/>

            <!-- Camera View -->
            <x-options.camera-view-button/>

            <!-- Download -->
            <livewire:options.image-download-button
                :viewId="$view->id"
                :selected-products="$selected_products"/>

            <!-- Print -->
            <x-options.print-button/>

            <!-- Share -->
            <x-options.share-button/>
        </div>

        <button class="open-options-btn">
            <img src="{{ asset('img/icons/open-options-btn.svg') }}" alt=""/>
        </button>
    </div>

    <!-- Saved Modal -->
    {{--    <x-modals.saved-modal :selected-products="$selected_products" />--}}
    <livewire:options.save-to-gallery
        :view-id="$view->id"
        :selected-products="$selected_products"/>
</div>
