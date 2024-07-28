@php use Illuminate\Support\Facades\Storage; @endphp
<div class="custom d-flex align-items-start {{ $class }}">
    <button class="custom-btn">
        <img src="{{ asset('img/icons/Pencil.svg') }}" alt=""/>
    </button>

    <div class="custom__items">
        @foreach($categories as $category)
            <div
                id="{{ $category->div_id }}"
                class="custom__block"
                style="{{ $category->display ? 'display:block' : 'display:none' }}">
                <!-- Custom Item -->
                <div class="custom__item">
                    <img class="custom__item_img" src="{{ Storage::url($category->products->first()->image?->path) }}" alt=""/>
                    <span class="custom__item_title">{{ $category->name }}</span>

                    <button
                        @click="$wire.showDropList=true"
                        class="custom-item-btn"
                        data-mask="{{ $category->data_mask }}">
                        <img data-item="{{ $category->data_mask }}" data-mask="{{ $category->data_mask }}"
                             src="{{ asset('img/icons/open-custom.svg') }}" alt=""/>
                    </button>
                </div>

                <!-- Custom Drop List -->
                <div class="custom-drop-list {{ ($category_id == $category->id && $show_drop_list) ? 'open' : '' }}" data-item="{{ $category->data_mask }}" data-mask="{{ $category->data_mask }}">
                    <button
                        x-on:click="
                            $wire.activeClass='';
                            $wire.removeProducts({{ $category->id }})"
                        class="custom-item-remove {{ $category_id == $category->id ? $active_class : ''}}"
                        data-remove="{{ $category->data_mask }}">
                        Remove
                    </button>

                    <div class="drop-list-container">
                        @foreach($category->products as $product)
                            @php
                                $productConfiguration = collect($product->productConfigurations)
                                    ->where('view_id', $view_id)
                                    ->where('is_visible', true)
                                    ->first();
                            @endphp
                            @if($productConfiguration)
                                <button
                                        x-on:click="
                                            $wire.activeClass='active';
                                            $wire.productSelected({{ $category->id }}, {{ $product->id }})"
                                        class="load-jpg {{ $productConfiguration?->btn_class }} {{ $productConfiguration?->extra_class }}">
                                    <img class="custom__img custom-{{ $productConfiguration?->class }}"
                                         data-object="{{ $productConfiguration?->data_object }}"
                                         data-remove="{{ $category->data_mask }}"
                                         src="{{ Storage::url($product->image?->path) }}"
                                         alt="Floor"/>
                                </button>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
