@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/custom/product-details-2.css') }}">
@endsection

@section('content')
<section class="mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 py-3" style="font-size:14px">
                <a href="{{ route('site.home') }}">Accueil </a> 
                 > 
                <a href="{{ route('site.famille', $product->category->parent->slug) }}">{{ $product->category->parent->name }}</a>
                > 
                <a href="{{ route('site.category', $product->category->slug) }}">{{ $product->category->name }}</a>
                > 
                <span>{{ $product->name }}</span>
            </div>
            <div class="col-12 col-md-10">
                <div class="container">
                    <div class="row bg-white shadow-sm py-5">
                        <div class="col-md-6 col-lg-6">
                            <div class="preview preview-slider d-flex items-center">
                                <img src="{{ asset('storage/'.$product->product_image) }}" alt="product-1">
                                @foreach($images as $image)
                                    <img src="{{ asset('storage/galeries/'.$image->full) }}" alt="product-1">
                                @endforeach
                            </div>
                            <div class="thumb-slider">
                                <img src="{{ asset('storage/'.$product->product_image) }}" alt="product-1">
                                @foreach($images as $image)
                                    <img src="{{ asset('storage/galeries/'.$image->full) }}" alt="product-1">
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="product-name">
                                <h3>{{ $product->name }}</h3>
                            </div>
                          
                            <div class="product-price">
                                <p>{{ currency($product->price, 'XOF', currency()->getUserCurrency()) }}</p>
                            </div>
                            <div class="product-review">
                                <p class="mb-2"><strong>Categorie:</strong> <a href="{{ route('site.category', $product->category->slug) }}">{{$product->category->name}}</a></p>
                                <p class="mb-2"><strong>Référence:</strong> {{ $product->sku }}</p>
                                <p><strong>Disponibilité:</strong>  
                                     @if($product->quantity > $product->stock)
                                         <span class="text-success">En stock</span>
                                     @else
                                         <span class="text-danger">Stock épuisé</span>
                                     @endif
                                </p>
                            </div>
                            
                            <div class="product-cart">
                                @if($product->quantity > $product->stock)
                                    <form action="{{ route('product.add.cart') }}" method="POST" role="form">
                                        @csrf
                                        <ul>
                                            <li>
                                                <input type="number" name="qty" placeholder="1" min="{{ $product->min_quantity }}" value="{{ $product->min_quantity }}" max="{{ $product->quantity }}">
                                                <input type="hidden" name="productId" value="{{ $product->id }}">
                                                <input type="hidden" name="image" value="{{ $product->product_image }}">
                                                <input type="hidden" name="slug" value="{{ $product->slug }}">
                                                <input type="hidden" name="price" id="finalPrice" value="{{ $product->sale_price != null ? $product->sale_price : $product->price }}">
                                            </li>
                                            <li>
                                                <button class="btn btn-outline">
                                                    <i class="fas fa-shopping-basket"></i>
                                                    <span>Ajouter au panier</span>
                                                </button>
                                            </li>
                                        </ul>
                                        <p class="mt-3" style="font-size: 14px; color: #49a010">La quantité minimale requise pour commander ce produit est de {{ $product->min_quantity }}</p>
                                    </form>
                                @endif
                                
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-12 bg-white shadow-sm py-5">
                            <div class="product-tab-menu bg-white">
                                <ul class="nav nav-tabs">
                                    <li><a href="#descrip" class="nav-link" data-toggle="tab">description</a></li>
                                    <li><a href="#video" class="nav-link" data-toggle="tab">Video</a></li>
                                </ul>
                            </div>
                            <div class="tab-pane" id="descrip">
                                <div class="product-tab-desc">
                                    {!! $product->description !!}
                                </div>
                            </div>
                            <div class="tab-pane" id="video">
                                @if($product->product_video)
                                    <div class="product-tab-desc">
                                        <video src="{{ asset('storage/'.$product->product_video) }}" width="100%" controls></video>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section">
    @if(count($related_products) > 0)
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="title">Produits similaires</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product-slider slider-arrow">
                    @foreach($related_products as $product)
                        <div class="product-card">
                            <div class="product-img">
                                <img src="{{ asset('storage/'.$product->product_image) }}" alt="product-1">
                                <ul class="product-widget">
                                    <li><a href="{{ route('site.products.details', $product->slug) }}"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="product-name">
                                    <h6><a href="#">{{ $product->name }}</a></h6>
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection