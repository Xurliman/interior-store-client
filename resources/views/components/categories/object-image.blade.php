<div class="{{ $category->div_class }}">
    @foreach($category->products as $product)
        <img class="loading-jpg {{ $category->img_class }}" src="" data-object="{{ $product->data_object }}"
             data-product="Parquet {{ $loop->iteration }}" data-price="{{ $product->price?->symbol.' '.$product->price?->value }}" data-remove="{{ $category->data_mask }}"
             alt="" />
    @endforeach
</div>
