@extends('layouts.web')

@section('content')
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
                    <h1 class="hero__headline">Night Party</h1>
                </div>
                <div class="hero__btn-container">
                    <a href="{{ route('register') }}" class="hero__btn">Quiero entrar</a href="#">
                </div>
            </div>

        </div>
    </header>
    <main>
        <div class="container">
            <section class="section-one">
                <h2 class="section-one__headline">¿Qué es Night Party?</h2>
                <p class="section-one__p">
                    Integer luctus nibh tincidunt, iaculis erat in, fermentum est. Aenean ut hendrerit.
                </p>
            </section>
            <section class="section-color">
                <figure>
                    <img src="./img/foto-dj.jpg" alt="Fotografía de un DJ">
                </figure>
                <p class="section-color__p">
                    Integer luctus nibh tincidunt, iaculis erat in, fermentum est. Aenean ut hendrerit metus. Morbi vitae augue vel justo porttitor sagittis at a nisi.
                </p>
            </section>
            <section class="section-color">
                <figure>
                    <img src="./img/foto-fiesta-1.jpg" alt="Fotografía de una fiesta">
                </figure>
                <p class="section-color__p section-color__p--blue">
                    Integer luctus nibh tincidunt, iaculis erat in, fermentum est. Aenean ut hendrerit metus. Morbi vitae augue vel justo porttitor sagittis at a nisi.
                </p>
            </section>
        </div>
    </main>
    <footer class="section-end">
        <div class="section-end-container">
            <h2 class="section-end__headline">Night Party</h2>
            <h3>Una experiencia única</h3>
            <div class="hero__btn-container">
                <a href="{{ route('register') }}" class="hero__btn hero__btn--end">Quiero entrar</a href="#">
            </div>
        </div>
            <p class="section-end__footer">Todos los derechos reservados &copy;</p>
    </footer>
@endsection