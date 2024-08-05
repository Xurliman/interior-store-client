<div
    x-data="{ openSavedModal:false }"
    @open-saved-modal.window="openSavedModal=$event.detail.openSavedModal;"
    x-on:click="openSavedModal=!openSavedModal"
    :class="{'active': openSavedModal}"
    class="saved-blackout"
    data-modal="saved">
    <div
        x-data
        x-show="openSavedModal && $wire.selectedProducts.length > 0"
        :class="{ 'active': openSavedModal && $wire.selectedProducts.length > 0 }"
        class="saved-modal">
        <button
            class="close-saved-modal ms-auto mb-4">
            <img src="{{ asset('img/icons/Cancel.svg') }}" alt="Cancel"/>
        </button>

        <div class="saved-modal-container">
            <h4 class="saved-modal__items_title h4">
                Saved to My gallery
            </h4>

            <div class="saved-modal__items d-flex flex-column">
                @foreach($selected_products as $product)
                    <div class="saved-modal__item d-flex">
                        <h5 class="saved-modal__item_title h5">{{ $product['name'] }} &nbsp;</h5>
                        <h5 class="saved-modal__item-price">{{ $product['price']['currency']['symbol'] }}{{ $product['price']['value'] }}</h5>
                    </div>
                @endforeach
            </div>

            <div class="saved-modal__items d-flex flex-column">
                <div class="d-flex me-auto mt-2">
                    <form
                        method="POST"
                        action="{{ route('carts.store', ['view_id'=> $view_id, 'selected_products' => json_encode($selected_products)]) }}">
                        @csrf
                        <button type="submit"
                            class="check-out-saved-modal mb-2 me-3">
                            Check out
                        </button>
                    </form>
                    <button class="close-saved-modal mb-2">
                        Back
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Empty Modal -->
    <div
        x-data
        x-show="openSavedModal && $wire.selectedProducts.length == 0"
        :class="{ 'active': openSavedModal && $wire.selectedProducts.length == 0 }"
        class="saved-modal-empty">
        <button
            class="close-saved-modal ms-auto">
            <img src="{{ asset('img/icons/Cancel.svg') }}" alt="Cancel"/>
        </button>

        <h4 class="saved-modal__items_title mt-3 h4">
            No products to save
        </h4>
        <button class="close-saved-modal mb-2">Back</button>
    </div>
</div>
