@extends('layouts.app')

@section('content')
    @include('frontend.partials.banner', ['banners' => $banners])

        <!--=====================================
                 PRODUCT LIST PART START
        =======================================-->
        <section class="product-list">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <h2 class="title">Recommandés pour vous</h2>
                        </div>
                    </div>
                </div>
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
                                            <h6>{{ currency($product->price, 'XOF', currency()->getUserCurrency()) }}</h6>
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
                </div>
            </div>
        </section>
        <!--=====================================
                 PRODUCT LIST PART END
        =======================================-->

        @include('frontend.partials.featured')
        @include('frontend.partials.newsletter')
@endsection