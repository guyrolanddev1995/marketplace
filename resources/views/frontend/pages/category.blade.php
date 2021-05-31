@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/custom/product-list-3.css') }}">
@endsection

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 py-3" style="font-size:14px">
                <a href="{{ route('site.home') }}" style="color:black">Accueil </a> 
                 > 
                <a href="{{ route('site.famille', $category->parent->slug) }}" style="color:black">{{ $category->parent->name }}</a>
                > 
                <a href="#">{{ $category->name }}</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-bar shadow-sm">
                    <h6>Catégories</h6>
                    <div class="product-bar-content">
                        <ul class="nasted-dropdown">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('site.category', $category->slug) }}">
                                        <span>{{ $category->slug }}</span>
                                        @if($category->products_count > 0)
                                            <span class="badge badge-pill badge-success">{{ $category->products_count }}</span>
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                @if(count($products) > 0)
                    <div class="container">
                        <div class="row product-card-parent bg-white">
                            @foreach($products as $product)
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                    <div class="product-card card-gape shadow-sm">
                                        <div class="product-img">
                                            <img src="{{ asset('storage/'.$product->product_image) }}" alt="{{ $product->name }}" style="width: 100%; height:100%">
                                            <ul class="product-widget">
                                                <li><a href="{{ route('site.products.details', $product->slug) }}"><i class="fas fa-eye"></i></a></li>
                                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-name">
                                                <h6><a href="{{ route('site.products.details', $product->slug) }}">{{ $product->name }}</a></h6>
                                            </div>
                                            <div class="product-price">
                                                <h6>{{  currency($product->price, 'XOF', currency()->getUserCurrency()) }}</h6>
                                            </div>
                                            <div class="product-btn">
                                                <a href="{{ route('site.products.details', $product->slug) }}">
                                                    <i class="fas fa-shopping-basket"></i>
                                                    <span>Ajouter au panier</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @if($products->hasPages())
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="pagination ">
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->previousPageUrl() }}">
                                            <i class="fas fa-long-arrow-alt-left"></i>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                                        <li class="page-item"><a class="page-link {{ $products->currentPage() == $i ? 'active' : '' }}" href="{{ $products->url($i) }}" >{{ $i }}</a></li>
                                    @endfor
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}">
                                            <i class="fas fa-long-arrow-alt-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                     @endif
                @else
                    <div class="text-center bg-white py-3">
                        <img src="{{ asset('frontend/img/empty.svg') }}" alt="" width="300px">
                        <h3 class="my-4">Aucun produit disponible</h3>
                        <a href="{{ route('site.home') }}" class="text-success">
                            Retour à la boutique
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection