<div class="gallery">
    <div class="container-xxl">
        <h2 class="gallery__title h2 mb-4">Gallery</h2>

        <div class="gallery__grid">
            @forelse($carts as $cart)
                <div class="gallery__item">
                    <img
                        class="gallery__img mb-2"
                        src="{{ \Illuminate\Support\Facades\Storage::url($cart->image?->path) }}"
                        alt="{{ $cart->image?->path }}"/>

                    <div class="gallery__cont">
                        <h3 class="gallery__item_title mb-3">
                            {{ $cart->view?->scene?->name }}
                        </h3>

                        <div class="gallery__desc d-flex flex-column">
                            @foreach($cart->products as $product)
                                <span class="gallery__accessors">
                                {{ $product->name }}
                                    {{ $product->price->currency->symbol.$product->price->value }}
                            </span>
                            @endforeach
                        </div>

                        <button
                            wire:click="update()"
                            class="gallery__btn">
                            Modify
                        </button>
                        <button
                            wire:confirm="Are you sure you want to delete this post?"
                            wire:click="deleteProduct({{ $cart->id }})"
                            class="gallery__btn cm-error">
                            Delete
                        </button>
                    </div>
                </div>
            @empty
                <h1>No gallery</h1>
            @endforelse
        </div>
    </div>
</div>
