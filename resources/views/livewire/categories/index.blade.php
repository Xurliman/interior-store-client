@php use Illuminate\Support\Facades\Storage; @endphp
<div class="custom d-flex align-items-start {{ $class }}">
    <button class="custom-btn">
        <img src="{{ asset('img/icons/Pencil.svg') }}" alt=""/>
    </button>

    <div class="custom__items">
        @foreach($categories as $category)
            <div id="{{ $category->div_id }}" class="custom__block">
                <!-- Custom Item -->
                <div class="custom__item">
                    <img class="custom__item_img" src="{{ Storage::url($category->products->first()->image?->path) }}" alt=""/>
                    <span class="custom__item_title">{{ $category->name }}</span>

                    <button class="custom-item-btn" data-mask="{{ $category->data_mask }}">
                        <img data-item="{{ $category->data_mask }}" data-mask="{{ $category->data_mask }}"
                             src="{{ asset('img/icons/open-custom.svg') }}" alt=""/>
                    </button>
                </div>

                <!-- Custom Drop List -->
                <div class="custom-drop-list {{ $category_id == $category->id ? 'open' : '' }}" data-item="{{ $category->data_mask }}" data-mask="{{ $category->data_mask }}">
                    <button class="custom-item-remove {{ $category_id == $category->id ? 'active' : '' }}" data-remove="{{ $category->data_mask }}">
                        Remove
                    </button>

                    <div class="drop-list-container">
                        @foreach($category->products as $product)
                            <button wire:click="productSelected({{ $category->id }}, {{ $product->id }})" class="load-jpg {{ $product->productConfiguration->btn_class }} {{ $product->productConfiguration->extra_class }}">
                                <img class="custom__img custom-{{ $product->productConfiguration->class }}"
                                     data-object="{{ $product->productConfiguration->data_object }}"
                                     data-remove="{{ $category->data_mask }}"
                                     src="{{ Storage::url($product->image?->path) }}" alt="Floor"/>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
