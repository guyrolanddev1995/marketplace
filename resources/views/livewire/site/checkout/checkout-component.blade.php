<section class="checkout-part">
    <div class="container">
        <form method="post" action="{{ route('check-out.store') }}">
            @csrf
            <div class="row">
                <livewire:site.checkout.address/>
                
                <livewire:site.checkout.product-resume/>
            </div>
        </form>
    </div>
</section>