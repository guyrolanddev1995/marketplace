@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('/css/custom/signin-up.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center items-center" style="margin:100px 0">
        <div class="col-md-6">
            <div class="login-header mb-5 text-center">
                <h2>Mot de passe oublié ?</h2>
            </div>
            <form action="{{ route('password.email') }}" method="post">
                @csrf
               <div class="form-group">
                    <label for="email">{{ __('Adresse email') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Entrer votre adresse email" value="{{ old('email') }}" required autocomplete="email"/>
                    @error('email')
                        <div class="invalid-feedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
               </div>

                <label class="form-btn text-center">
                    <button type="submit" class="btn btn-outline pull-right">Réinitialiser votre mot de passe</button>
                </label>
            </form>
        </div>
    </div>
</div>
@endsection

