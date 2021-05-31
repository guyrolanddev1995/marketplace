<main class="banner-part slider-arrow slider-dots">
    @foreach($banners as $banner)
        <section class="banner">
            <img src="{{ asset('storage/'.$banner->media) }}" alt="">
        </section>
    @endforeach
</main>