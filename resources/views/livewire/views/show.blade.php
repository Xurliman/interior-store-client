@php use Illuminate\Support\Facades\Storage; @endphp
<div class="scene">
    <!-- Camera View -->
    <div class="camera-view">

        @foreach($scene->views as $sceneView)
            <button wire:click.prevent="viewSelected({{ $sceneView }})" class="camera__item d-flex flex-column"
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
                        <!-- Floor -->
                        @foreach($categories as $category)
                            <div class="{{ $category->div_class }}">
                                @foreach($category->products as $product)
                                    <img class="loading-jpg {{ $category->img_class }} {{ $product->id == $product_id ? $object_class : ''}}"
                                         src="{{ Storage::url($product->productConfiguration->images()->where('type', 'transparent_bg')->first()?->path) }}"
                                         data-object="{{ $product->productConfiguration->data_object }}"
                                         data-product="{{ $product->name }}"
                                         data-price="{{ $product->price?->currency?->symbol.''.$product->price?->value }}"
                                         data-remove="{{ $category->data_mask }}"
                                         alt="{{ $product->image?->path }}"/>
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
            <div class="container-xxl">
                <div class="order__container">
                    <div class="order__menu">
                        <button class="move-up">
                            <img src="{{ asset('img/icons/move-up.svg') }}" alt="move-up"/>
                        </button>

                        <span class="order__count ms-2">0 item</span>

                        <button class="order__btn">Order</button>
                    </div>

                    <div class="order__list">
                        <span class="order__list-empty">No products yet</span>
                    </div>
                </div>

                <!-- Zoom in / Zoom out -->
                <div class="slidecontainer">
                    <button class="zoom-btn" id="zoomOutButton">
                        -
                    </button>
                    <button class="zoom-btn" id="zoomInButton">
                        +
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Menu -->
    <livewire:categories.index/>

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
    <div class="saved-blackout" data-modal="saved">
        <div class="saved-modal">
            <button class="close-saved-modal ms-auto mb-4">
                <img src="{{ asset('img/icons/Cancel.svg') }}" alt="Cancel"/>
            </button>

            <div class="saved-modal-container">
                <h4 class="saved-modal__items_title h4">
                    Saved to My gallery
                </h4>

                <div class="saved-modal__items d-flex flex-column"></div>

                <div class="saved-modal__items d-flex flex-column">
                    <div class="d-flex me-auto mt-2">
                        <button class="check-out-saved-modal mb-2 me-3">
                            Check out
                        </button>
                        <button class="close-saved-modal mb-2">
                            Back
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty Modal -->
        <div class="saved-modal-empty">
            <button class="close-saved-modal ms-auto">
                <img src="{{ asset('img/icons/Cancel.svg') }}" alt="Cancel"/>
            </button>

            <h4 class="saved-modal__items_title mt-3 h4">
                No products to save
            </h4>
            <button class="close-saved-modal mb-2">Back</button>
        </div>
    </div>

</div>
