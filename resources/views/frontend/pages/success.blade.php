@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/custom/checkout.css') }}">
@endsection

@section('content')
   <!--=====================================
                 SINGLE BANNER PART START
        =======================================-->
        <section class="single-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-content">
                            <h2>Félicitation</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="checkout-part">
            <div class="container">
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <img src="https://cdn2.iconfinder.com/data/icons/greenline/512/check-512.png" alt="" width="250px">
                            <h3 class="title-checkend mt-4">
                                Félicitations! Votre commande a été prise en compte. <br><br>
                                Vous recevrez un SMS après validation de votre commande
                            </h3>
                            <a href="{{ route('site.home')}}" class="mt-4">Retour à la boutique</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection