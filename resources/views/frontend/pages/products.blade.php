@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/custom/product-list-3.css') }}">
@endsection

@section('content')
<section class="single-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content">
                    <h2>Catalogue des produits</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('site.home') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Catalogue</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-list">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row product-card-parent">
                    @foreach($products as $product)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                        <div class="product-card card-gape">
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
                                    <h6>{{ $product->price }} CFA</h6>
                                </div>
                                <div class="product-btn">
                                    <a href="#">
                                        <i class="fas fa-shopping-basket"></i>
                                        <span>Add to Cart</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
            </div>
           
        </div>
    </div>
</section>
@endsection