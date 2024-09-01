@php use App\Models\Setting; @endphp
<div class="container-xxl">
    <div class="order__container">
        <div class="order__menu">
            <button class="move-up">
                <img src="{{ asset('img/icons/move-up.svg') }}" alt="move-up"/>
            </button>

            <span class="order__count ms-2">{{count($selected_products)}} items</span>

            @if (session()->has('message'))
                <div class="alert alert-success" style="position: absolute; width: max-content; bottom: 75%; right: 0%">
                    <span>{{ session('message') }}</span>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger" style="position: absolute; width: max-content; bottom: 75%; right: 0%">
                    <span>{{ session('error') }}</span>
                </div>
            @endif
            <button
                x-on:click="$wire.order()"
                class="order__btn"
                type="submit">
                Order
            </button>
        </div>

        <div class="order__list">
            @forelse($selected_products as $productId)
                @php
                    $product = \App\Models\Product::firstWhere('id', $productId);
                @endphp
                <div class="order__item d-flex flex-column">
                    <span class="order__item_title">{{ $product?->name }}</span>
                    <span class="order__item_price">{{ Setting::getCurrencySymbol().$product?->price }}</span>
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
