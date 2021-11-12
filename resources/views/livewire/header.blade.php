<header>
    <div class="hero">
        <div class="container">
            <nav class="hero__nav">
                <a href="#" class="hero__nav-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hero__nav-link"><i class="fab fa-twitter"></i></a>
            </nav>
            <div class="hero__info">
                <span class="hero__info-span"><i class="fas fa-calendar-alt"></i> 20 Nov</span>
                <span class="hero__info-span"><i class="fas fa-map-marker-alt"></i> Monterrey, Mx</span>
            </div>
            <div class="hero__headline-container">
                <h1 class="hero__headline"><a href="{{ route('home') }}">Night Party</a></h1>
            </div>
            <div class="hero__btn-container">
               @if(Request::is('/'))
               <x-link-button :linkButton="$linkButton" />
               @endif
            </div>
        </div>

    </div>
</header>
