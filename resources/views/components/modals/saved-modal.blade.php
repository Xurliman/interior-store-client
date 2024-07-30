<div class="saved-blackout" data-modal="saved">
    <div class="saved-modal">
        <button class="close-saved-modal ms-auto mb-4">
            <img src="{{ asset('img/icons/Cancel.svg') }}" alt="Cancel"/>
        </button>

        <div class="saved-modal-container">
            <h4 class="saved-modal__items_title h4">
                Saved to My gallery
            </h4>

            <div class="saved-modal__items d-flex flex-column">
                @foreach($selected_products as $product_id)
                    @php
                        $product = \App\Models\Product::firstWhere('id', $product_id)->load('price.currency');
                        if (is_null($product->price)) {
                            dd(collect($product)->toArray());
                        }
                    @endphp
                    <div class="saved-modal__item d-flex">
                        <h5 class="saved-modal__item_title h5">{{ $product?->name }} &nbsp;</h5>
                        <h5 class="saved-modal__item-price">{{ $product?->price?->currency?->symbol }}{{ $product?->price?->value }}</h5>
                    </div>
                @endforeach
            </div>

            <div class="saved-modal__items d-flex flex-column">
                <div class="d-flex me-auto mt-2">
                    <button

                        class="check-out-saved-modal mb-2 me-3">
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
