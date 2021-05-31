<div class="btmbar-part">
    <ul class="btmbar-widget">
        <li>
            <a href="{{ route('site.home') }}">
                <i class="fas fa-home"></i>
                <span>Accueil</span>
            </a>
        </li>
        <li>
            <a href="#" class="wish-icon">
                <i class="fas fa-heart"></i>
                <span>Mes Souhaits</span>
                <sup>0</sup>
            </a>
        </li>
        <li>
            <a href="{{ route('checkout.cart') }}" class="cart-icon">
                <i class="fas fa-shopping-basket"></i>
                <span>Mon Panier</span>
                <sup>{{ $cartCount }}</sup>
            </a>
        </li>
        <li>
            @guest
                <a href="#" class="cart-icon">
                    <i class="fas fa-user-lock"></i>
                    <span>Connexion</span>
                </a>
            @else
                <a href="#" class="cart-icon" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Déconnexion</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
            
        </li>
    </ul>
</div>