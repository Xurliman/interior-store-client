@php use Illuminate\Support\Facades\Storage; @endphp
<div class="custom d-flex align-items-start {{ $class }}">
    <button class="custom-btn">
        <img src="{{ asset('img/icons/Pencil.svg') }}" alt=""/>
    </button>

    <div class="custom__items">
        @foreach($categories as $category)
            <div
                class="custom__block"
                style="{{ $category->display ? 'display:block' : 'display:none' }}">
                <div class="custom__item">
                    <img
                        class="custom__item_img"
                        src="{{ Storage::url($category->products()->where('is_visible', true)->first()->image?->path) }}"
                        alt=""/>
                    <span class="custom__item_title">{{ $category->name }}</span>

                    <button
                        x-data="{ toggleDropList:false, categoryId : {{ $category->id }}, lastEvent: '' }"
                        x-on:click="
                            if (lastEvent !== 'mask-btn-clicked') {
                                toggleDropList = !toggleDropList;
                            }
                            categoryId = {{ $category->id }};
                            $dispatch('toggle-drop-list', {
                                toggleDropList: toggleDropList,
                                categoryId: categoryId
                            });
                            lastEvent = 'toggle-btn-clicked'"
                        @mask-btn-clicked.window="
                            categoryId = $event.detail.categoryId;
                            toggleDropList = true;
                            lastEvent = 'mask-btn-clicked' "
                        @product-selected.window="
                            toggleDropList =
                                categoryId == $event.detail.categoryId;
                            lastEvent = 'product-selected' "
                        :class="{ 'open' : (toggleDropList && categoryId == {{$category->id}}) }"
                        class="custom-item-btn"
                        data-mask="{{ $category->id }}">
                        <img data-item="{{ $category->id }}"
                             data-mask="{{ $category->id }}"
                             src="{{ asset('img/icons/open-custom.svg') }}"
                             alt=""/>
                    </button>
                </div>

                <div
                    x-data="{ toggleDropList:false, categoryId : {{ $category->id }}}"
                    @toggle-drop-list.window="toggleDropList = $event.detail.toggleDropList; categoryId = $event.detail.categoryId;"
                    @mask-btn-clicked.window="categoryId = $event.detail.categoryId;toggleDropList = true"
                    :class="{ 'open' : (toggleDropList && categoryId == {{$category->id}}) }"
                    class="custom-drop-list">
                    <button
                        x-on:click="$wire.removeProducts({{ $category->id }})"
                        class="custom-item-remove {{ in_array($category->id, collect($selectedProducts)->pluck('category_id')->toArray()) ? 'active' : ''}}">
                            Remove
                    </button>

                    <div class="drop-list-container">
                        @foreach($category->products->where('is_visible', true) as $product)
                            @php
                                $productConfiguration = collect($product->productConfigurations)
                                    ->where('view_id', $view_id)
                                    ->first();
                            @endphp
                            @if($productConfiguration)
                                <button
                                        id="productSelectedBtn"
                                        x-on:click="
                                            $wire.productSelected({{ $category->id }}, {{ $product->id }});
                                            $dispatch('product-selected', { categoryId : {{ $category->id }} })"
                                        class="load-jpg">
                                    <img class="custom__img"
                                         data-remove="{{ $category->id }}"
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
