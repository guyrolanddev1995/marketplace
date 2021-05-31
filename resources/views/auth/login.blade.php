@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('/css/custom/signin-up.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center items-center" style="margin:100px 0">
        <div class="col-md-6">
            <div class="login-header mb-5 text-center">
                <h2>Connectez-vous à votre compte</h2>
            </div>
            <form action="{{ route('login') }}" method="post">
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

               <div class="form-group">
                    <label for="password">{{ __('Mot de passe') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid mt-2 @enderror" placeholder="Entrer votre mot de passe" name="password" value="{{ old('password') }}" required autocomplete="password"/>
                    @error('password')
                        <div class="invalid-feedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <label class="row justify-content-between mb-4">
                    <div class="custom-control col-6 ml-3 custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="signin-check">
                        <label class="custom-control-label" for="signin-check">Se souvenir de moi</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="col-5 text-right">Mot de passe oublié ?</a>
                </label>

                <label class="form-btn text-center">
                    <button type="submit" class="btn btn-outline pull-right">Se connecter</button>
                </label>
            </form>
            <div class="form-bottom text-center mt-5">
                <p>Vous n'avez pas de compte ? Cliquer <a href="{{ route('register') }}">ici</a> pour en créer.</p>
            </div>

        </div>
    </div>
</div>
@endsection
