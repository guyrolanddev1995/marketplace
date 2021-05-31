<nav class="navbar-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-element">
                    <ul class="left-widget">
                        <li><a class="icon icon-inline menu-bar" href="#"><i class="fas fa-align-left"></i></a></li>
                    </ul>
                    <a class="navbar-logo" href="{{ route("site.home") }}">
                        <img src="{{ asset('storage/'.config('settings.site_logo'))}}" alt="{{ config('settings.site_title') }}">
                    </a>
                    <form class="search-form navbar-src">
                        <input type="text" placeholder="Taper quelque chose ici...">
                        <button class="btn btn-inline">
                            <i class="fas fa-search"></i>
                            <span>Recherche</span>
                        </button>
                    </form>
                    <ul class="right-widget">
                        @guest
                        <li class="navbar-item items user-icon navbar-dropdown">
                            <a class="icon icon-inline" href="#">
                                <i class="fas fa-user"></i>
                             </a>
                            <ul class="dropdown-user-list">
                                <li><a class="dropdown-link" href="{{ route('login') }}"><i class="fas fa-lock"></i> SE CONNECTER</a></li>
                                <li><a class="dropdown-link" href="{{ route('register') }}"><i class="fas fa-user"></i> S'INSCRIRE</a></li>
                            </ul>
                        </li>
                        @else
                        <li class="navbar-item  items user-icon navbar-dropdown">
                            <a class="" href="#">
                               Bonjour, {{ Auth::user()->prenom }}
                            </a>
                             <ul class="dropdown-user-list">
                                    <li><a class="dropdown-link" href="{{ route('profil.dashbord') }}"><i class="fas fa-user"></i> Votre compte</a></li>
                                    <li><a class="dropdown-link" href="{{ route('profil.orders') }}"><i class="fas fa-shopping-cart"></i> Vos commandes</a></li>
                                    <li>
                                        <a class="dropdown-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Se déconnecter</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                            </ul>
                        </li>
                        @endguest
                        <li class="items"><a class="icon icon-inline" href="{{ route('checkout.cart') }}">
                            <i class="fas fa-shopping-cart"></i>
                            <sup>{{ $cartCount }}</sup></a>
                        </li>
                    </ul>

                    <ul class="right-mobil-widget">
                        @guest
                        <li class="navbar-item items user-icon">
                            <a class="icon icon-inline" href="{{ route('login') }}">
                                <i class="fas fa-user-lock"></i>
                             </a>
                        </li>
                        @else
                        <li class="navbar-item items user-icon">
                            <a class="icon icon-inline" href="{{ route('profil.dashbord') }}">
                                <i class="fas fa-user"></i>
                            </a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-slide">
                    <div class="navbar-content">
                        <div class="navbar-slide-cross">
                            <a class="icon icon-inline cross-btn" href="#"><i class="fas fa-times"></i></a>
                        </div>
                        <div class="navbar-slide-logo">
                            <a href="#"><img src="{{ asset('frontend/img/logo.jpeg')}}" alt="logo"></a>
                        </div>
                        <form class="search-form mb-4 navbar-slide-src">
                            <input type="text" placeholder="Rechercher">
                            <button class="btn btn-inline">
                                <i class="fas fa-search"></i>
                            </button>
                        </form> 
                        <ul class="navbar-list">
                            <li class="navbar-item {{ Route::currentRouteName() == 'site.home' ? 'active' : '' }}"><a class="navbar-link" href="{{ route('site.home') }}">Accueil</a></li>
                            @foreach($familles as $famille)
                                <li class="navbar-item navbar-dropdown navbar-megamenu">
                                    <a class="navbar-link dropdown-indicator" href="{{ route('site.famille', $famille->slug) }}">
                                        <span>{{ $famille->name }}</span>
                                        @if(count($famille->categories) > 0)
                                            <i class="fas fa-chevron-down"></i>
                                        @endif
                                    </a>
                                    @if(count($famille->categories) > 0)
                                        <div class="megamenu">
                                            <ul>
                                                @foreach($famille->categories as $category)
                                                    <li><a href="{{ route('site.category', $category->slug) }}"><span>{{ $category->name }}</span></a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                            <li class="navbar-item"><a class="navbar-link" href="singles/contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>