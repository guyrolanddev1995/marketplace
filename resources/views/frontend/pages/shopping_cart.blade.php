@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/custom/cartlist.css') }}">
@endsection

@section('content')
<section class="cart-part">
    <div class="container">
        @if(!\Cart::isEmpty())
        <div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-list">
                        <table class="table-list">
                            <thead>
                                <tr>
                                    <th scope="col">Produit</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\Cart::getContent() as $key => $item)
                                <tr>
                                    <td class="table-product"><img src="{{ asset('storage/'.$item->attributes['image']) }}" alt="product-1"></td>
                                    <td class="table-name"><h5>{{ $item->name }}</h5></td>
                                    <td class="table-price"><h5>{{ currency($item->price, 'XOF', currency()->getUserCurrency()) }} </h5></td>
                                    <td class="table-quantity">
                                        <input type="number" data-id="{{ $item->id }}" class="quantity" placeholder="1" value="{{ $item->quantity }}">
                                    </td>
                                    <td class="table-total"><h5>{{ currency(($item->price * $item->quantity), 'XOF', currency()->getUserCurrency())}}</h5></td>
                                    <td class="table-action">
                                        <a href="{{ route('site.products.details', $item->attributes['slug']) }}"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('checkout.cart.remove', $item->id) }}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="cart-back">
                        <a href="{{ route('site.home') }}" class="btn btn-inline">
                            <i class="fas fa-undo-alt"></i>
                            <span>Retour à la boutique</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="cart-totals">
                        <h2 class="title">Total du panier</h2>
                        <ul>
                            <li>
                                <span>Total</span>
                                <span>{{ currency(\Cart::getSubTotal(), 'XOF', currency()->getUserCurrency()) }} </span>
                                
                            </li>
                        </ul>
                    </div>
                    <div class="cart-proceed">
                        <a href="{{ route('check-out') }}" class="btn btn-inline">
                            <i class="fas fa-check"></i>
                            <span>Finaliser la commande</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="text-center">
                <img src="{{ asset('frontend/img/empty-cart.svg') }}" alt="" width="300px">
                <H1 class="my-4">Votre panier est vide</H1>
                <a href="{{ route('site.home') }}" class="text-success">Cliquer ici pour faire votre boutique</a>
            </div>
        @endif
        
    </div>
</section>
@endsection

@section('scripts')
<script>
   (function(){
       const classname = document.querySelectorAll('.quantity')
       
       Array.from(classname).forEach(element => {
           element.addEventListener('change', () => {
              let id = element.getAttribute('data-id')
              window.axios.patch(`/cart/${id}/update`, {
                  quantity: element.value
              })
              .then(response => {
                  window.location.href = "{{ route('checkout.cart') }}"
              })
              .catch(error => {
                console.log(error.response.data)
                window.location.href = "{{ route('checkout.cart') }}"
              })
           })
       });
   })()
</script>
@endsection