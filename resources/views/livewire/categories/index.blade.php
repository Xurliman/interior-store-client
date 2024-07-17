@php use Illuminate\Support\Facades\Storage; @endphp
<div class="custom d-flex align-items-start {{ $class }}">
    <button class="custom-btn">
        <img src="{{ asset('img/icons/Pencil.svg') }}" alt=""/>
    </button>

    <div class="custom__items">
        @foreach($categorised_products as $products)
            @php
                $category = collect($products)->first()->category;
            @endphp
            <div id="{{ $category->div_id }}" class="custom__block" style="display: block;">
                <!-- Custom Item -->
                <div class="custom__item">
                    <img class="custom__item_img" src="{{ Storage::url($products->first()->image?->path) }}" alt=""/>
                    <span class="custom__item_title">{{ $category->name }}</span>

                    <button class="custom-item-btn" data-mask="{{ $category->data_mask }}">
                        <img data-item="{{ $category->data_mask }}" data-mask="{{ $category->data_mask }}"
                             src="{{ asset('img/icons/open-custom.svg') }}" alt=""/>
                    </button>
                </div>

                <!-- Custom Drop List -->
                <div class="custom-drop-list {{ $category_id == $category->id ? 'open' : '' }}" data-item="{{ $category->data_mask }}" data-mask="{{ $category->data_mask }}">
                    <button wire:click.prevent="removeProducts({{ $category->id }})" class="custom-item-remove {{ $category_id == $category->id ? 'active' : '' }}" data-remove="{{ $category->data_mask }}">
                        Remove
                    </button>

                    <div class="drop-list-container">
                        @foreach($products as $product)
                            @php
                                $productConfiguration = $product
                                    ->productConfigurations()
                                    ->first();
                            @endphp
                            <button wire:click.prevent="productSelected({{ $category->id }}, {{ $product->id }})" class="load-jpg {{ $productConfiguration->btn_class }} {{ $productConfiguration->extra_class }}">
                                <img class="custom__img custom-{{ $productConfiguration->class }}"
                                     data-object="{{ $productConfiguration->data_object }}"
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
