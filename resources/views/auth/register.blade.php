@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center items-center" style="margin:100px 0">
        <div class="col-md-6">
            <div class="login-header mb-5 text-center">
                <h2>Inscription</h2>
            </div>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nom">{{ __('Nom') }}</label>
                    <input type="type" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="Entrer votre nom" value="{{ old('nom') }}" required autocomplete="nom"/>
                    @error('nom')
                        <div class="invalid-feedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
               </div>

               <div class="form-group">
                    <label for="prenom">{{ __('Prenom') }}</label>
                    <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" placeholder="Entrer votre prenom" value="{{ old('prenom') }}" required autocomplete="prenom"/>
                    @error('prenom')
                        <div class="invalid-feedback text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

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
                    <label for="phone">{{ __('Téléphone') }}</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Entrer votre numéro de téléphone" value="{{ old('phone') }}" required autocomplete="phone"/>
                    @error('phone')
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

                <label class="form-btn">
                    <button type="submit" class="btn btn-outline pull-right">S'inscrire</button>
                </label>
            </form>
            <div class="form-bottom text-center mt-5">
                <p>Avez-vous déjà un compte ? cliquer <a href="{{ route('login') }}"> ici </a> pour vous connecter.</p>
            </div>

        </div>
    </div>
</div>
@endsection
