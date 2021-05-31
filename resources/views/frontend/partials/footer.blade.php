 <!--=====================================
                     FOOTER PART START
        =======================================-->
        <footer class="footer-part">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="footer-content">
                            <a href="{{ route('site.home') }}"><img src="{{ asset('storage/'.config('settings.site_logo'))}}" alt="{{ config('settings.site_title') }}"></a>
                            <p>
                                <strong>{{ config('settings.site_title') }}</strong> est une plateforme sur laquelle vous pouvez acheter différents produits vivriers depuis la Côte d’Ivoire et vous faire livrer dans le monde entier, dans les meilleurs délais.
                            </p>
                            <ul class="footer-icon">
                                @if(config('settings.social_facebook'))
                                    <li><a class="icon icon-inline" href="{{ url(config('settings.social_facebook')) }}"><i class="fab fa-facebook-f"></i></a></li> 
                                @endif
                                @if(config('settings.social_twitter'))
                                    <li><a class="icon icon-inline" href="{{ url(config('settings.social_twitter')) }}"><i class="fab fa-twitter"></i></a></li>
                                @endif
                                @if(config('settings.social_instagram'))
                                    <li><a class="icon icon-inline" href="{{ url(config('settings.social_instagram')) }}"><i class="fab fa-instagram"></i></a></li>
                                @endif
                                @if(config('settings.social_linkedin'))
                                    <li><a class="icon icon-inline" href="{{ url(config('settings.social_linkedin')) }}"><i class="fab fa-linkedin"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="footer-content">
                            <h3 class="title">Liens Rapides</h3>
                            <div class="footer-widget">
                                <ul>
                                    <li><a href="#">Mon compte</a></li>
                                    <li><a href="#">Historique des commandes</a></li>
                                    <li><a href="#">Suivi de commande</a></li>
                                    <li><a href="#">Produits phares</a></li>
                                    <li><a href="#">Recherche</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="footer-content">
                            <h3 class="title">Contacts</h3>
                            <div class="footer-widget">
                                <ul>
                                    <li>Email: <strong>{{ config('settings.email1') }}</strong></li>
                                    @if(config('settings.email2'))
                                        <li>Autre: <strong>{{ config('settings.email2') }}</strong></li>
                                    @endif

                                    <li>Téléphone:
                                        <strong>
                                            {{ config('settings.phone1') }}, 
                                            @if(config('settings.phone2')) {{ config('settings.phone2') }}, @endif
                                            @if(config('settings.phone3')) {{ config('settings.phone3') }} @endif
                                        </strong>
                                    </li>
                                   
                                    @if(config('settings.address')) <li>Adresse postale: <strong>{{ config('settings.address') }}</strong></li>@endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--=====================================
                      FOOTER PART END
        =======================================-->
        

        <!--=====================================
                 FOOTER BOTTOM PART START
        =======================================-->
        <div class="footer-bottom">
            <div class="container text-center">
                <p class="text-center">Copyright &copy; 2020 | Tous droits réservés</p>
            </div>
        </div>
        <!--=====================================
                 FOOTER BOTTOM PART END
        =======================================-->