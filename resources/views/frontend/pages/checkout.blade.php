@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/custom/checkout.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom/cartlist.css') }}">
@endsection

@section('content')
    <livewire:site.checkout.checkout-component/>
@endsection