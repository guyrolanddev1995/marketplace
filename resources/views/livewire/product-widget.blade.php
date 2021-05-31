<ul class="products-list product-list-in-box" wire:poll.750ms>
    @foreach($products as $product)
        <li class="item">
            <div class="product-img">
            <img src="{{ asset('storage/'.$product->product_image) }}" alt="{{ $product->name }}" style="width: 50px; height:50px">
            </div>
            <div class="product-info">
            <a href="javascript:void(0)" class="product-title">{{ $product->name }}
                <span class="pull-right">{{ $product->price }} CFA</span></a>
            </div>
        </li>
    @endforeach
</ul>