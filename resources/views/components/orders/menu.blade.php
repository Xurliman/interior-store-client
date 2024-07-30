<div class="container-xxl">
    <div class="order__container">
        <div class="order__menu">
            <button class="move-up">
                <img src="{{ asset('img/icons/move-up.svg') }}" alt="move-up"/>
            </button>

            <span class="order__count ms-2">{{count($selected_products)}} items</span>

            <form
                method="post"
                action="{{ route('carts.store') }}">
                @csrf
                <input type="hidden" value="{{ count($selected_products)>0 ? json_encode($selected_products) : '' }}" name="selected_products" required>
                @error('$selected_products')
                    {{ $message }}
                @enderror
                <button
                    class="order__btn"
                    type="submit" >
                    Cart
                </button>
            </form>
        </div>

        <div class="order__list">
            @forelse($selected_products as $productId)
                @php
                    $product = \App\Models\Product::firstWhere('id', $productId)->load('price.currency');
                @endphp
                <div class="order__item d-flex flex-column">
                    <span class="order__item_title">{{ $product?->name }}</span>
                    <span class="order__item_price">{{ $product?->price?->currency?->symbol }}{{ $product?->price?->value }}</span>
                </div>
            @empty
                <span class="order__list-empty">No products yet</span>
            @endforelse
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
