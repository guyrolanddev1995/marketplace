@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/custom/account.css') }}">
@endsection

@section('content')
<section class="account-part mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="account-menu">
                    <ul class="nav nav-tabs">
                        <li><a href="{{ route('profil.dashbord') }}" class="nav-link {{ Route::currentRouteName() == 'profil.dashbord' ? 'active' : '' }}">Tableau de bord</a></li>
                        <li><a href="{{ route('profil.orders') }}" class="nav-link {{ Route::currentRouteName() == 'profil.orders' ? 'active' : '' }}">Commandes</a></li>
                        <li><a href="{{ route('profil.account.edit') }}" class="nav-link {{ Route::currentRouteName() == 'profil.account.edit' ? 'active' : '' }}">Information personnelles</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- dashboard content -->
        <div class="tab-pane {{ Route::currentRouteName() == 'profil.dashbord' ? 'active' : '' }}" id="dash">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Tableau de bord</h2>
                    </div>
                </div>
                
                
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Informations personnelles</h3>
                            <a href="#">Modifier</a>
                        </div>
                        <ul class="account-list">
                            <li>
                                <h6>Nom:</h6>
                                <p>{{ Auth::user()->nom }}</p>
                            </li>
                            <li>
                                <h6>Prénom:</h6>
                                <p>{{ Auth::user()->prenom }}</p>
                            </li>
                            <li>
                                <h6>Email:</h6>
                                <p>{{ Auth::user()->email }}</p>
                            </li>
                            <li>
                                <h6>Téléphone:</h6>
                                <p>{{ Auth::user()->phone }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- order content -->
        <div class="tab-pane {{ Route::currentRouteName() == 'profil.orders' ? 'active' : '' }}" id="order">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Historique de mes commandes</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="order-content">
                        <table class="table-list">
                            <thead>
                                <tr>
                                    <th scope="col">Commandes</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Produits</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td class="table-order"><p>{{ $order->code }}</p></td>
                                    <td class="table-date"><p>{{ $order->updated_at }}</p></td>
                                    <td class="table-status">
                                        <p>
                                            @if($order->status == 1)
                                                <span style="color:orange">en cour de livraison</span>
                                            @elseif($order->status == 2)
                                                <span style="color:green">commande livrée</span>
                                            @else
                                                <span style="color:blue">Commande en attente</span>
                                            @endif
                                        </p>
                                    </td>
                                    <td class="table-product">
                                        <p>
                                            {{ count($order->products) }} items
                                        </p>
                                    </td>
                                    <td class="table-total"><p>{{ currency($order->amount +  $order->frais_livraison, 'XOF', $order->currency) }}</p></td>
                                    <td class="table-action">
                                        <a href="#"><i class="fas fa-eye"></i></a>
                                        @if($order->status == 0)
                                            <a href="{{ route('profil.orders.delete', $order->code) }}"><i class="fas fa-trash-alt"></i></a>
                                        @endif
                                        <a href="{{ route('profil.orders.tracking', $order->code) }}"><i class="fas fa-map-marked-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- settings content -->
        <div class="tab-pane {{ Route::currentRouteName() == 'profil.account.edit' ? 'active' : '' }}" id="sett">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Informations personnelles</h2>
                    </div>
                    <form class="settings-form" method="post" action="{{ route('profil.account.update') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nom" class="form-label">Nom:</label>
                                    <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', Auth::user()->nom) }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="prenom" class="form-label">Prénom:</label>
                                    <input type="text"name="prenom" id="prenom" class="form-control" value="{{ old('prenom', Auth::user()->prenom) }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Adresse email:</label>
                                    <input name="email" type="email" id="email" class="form-control" value="{{ old('prenom', Auth::user()->email) }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Téléphone:</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', Auth::user()->phone) }}">
                                </div>
                            </div>
             
                            <div class="col-lg-12">
                                <div class="form-btn">
                                    <button type="submit" class="btn btn-inline">
                                        <i class="fas fa-user-check"></i>
                                        <span>Mettre à jour</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection