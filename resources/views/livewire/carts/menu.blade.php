<div class="container-xxl">
    <div class="order__container">
        <div class="order__menu">
            <button class="move-up">
                <img src="{{ asset('img/icons/move-up.svg') }}" alt="move-up"/>
            </button>

            <span class="order__count ms-2">{{count($cart->products)}} items</span>

            <button class="order__btn">Cart</button>
        </div>

        <div class="order__list">
            @forelse($cart->products as $product)
                <div class="order__item d-flex flex-column">
                    <span class="order__item_title">{{ $product?->name }}</span>
                    <span class="order__item_price">{{ "$".$product?->price }}</span>
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
