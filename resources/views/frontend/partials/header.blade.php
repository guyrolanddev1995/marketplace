<header class="header-part">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <ul class="header-info">
                    <li>
                        <i class="fas fa-envelope"></i>
                        <p>{{ config('settings.email1') }}</p>
                    </li>
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <p>{{ config('settings.phone1') }}</p>
                    </li>
                    @if(config('settings.phone2'))
                        <li>
                            <i class="fas fa-phone-alt"></i>
                            <p>{{ config('settings.phone2') }}</p>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="header-option">
                    <div class="header-curr text-white navbar-dropdown">
                        Dévise: <input disabled type="text" style="border:none; color:white; background:transparent; width:50px; text-align:center" value="{{ currency()->getUserCurrency()  }}"/>
                        <ul class="dropdown-currency-list">
                            @foreach($currencies as $devise)
                                <li><a class="dropdown-link" href="{{ route('site.devise', $devise->code) }}">{{ $devise->code }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="header-lang">
                        @if(config('settings.social_facebook'))
                            <a class="icon" href="{{ url(config('settings.social_facebook')) }}"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if(config('settings.social_twitter'))
                            <a class="icon" href="{{ url(config('settings.social_twitter')) }}"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if(config('settings.social_instagram'))
                            <a class="icon" href="{{ url(config('settings.social_instagram')) }}"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if(config('settings.social_linkedin'))
                            <a class="icon" href="{{ url(config('settings.social_linkedin')) }}"><i class="fab fa-linkedin"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@section('scripts')
    <script>
        (function(){
            const currency = document.getElementById('currency')
            currency.addEventListener('change',(e) => {
                e.preventDefault()
                axios.post('/devise', {
                    id: currency.value
                })
                .then(response => {
                   
                })
                .catch(error => {
                    console.log(error.response.data)
                })
            })
        })()
    </script>
@endsection