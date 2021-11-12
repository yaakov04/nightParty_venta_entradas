@extends('layouts.web')

@section('content')
<livewire:header>
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
                    <img src="{{ asset('img/foto-dj.jpg') }}" alt="Fotografía de un DJ">
                </figure>
                <p class="section-color__p">
                    Integer luctus nibh tincidunt, iaculis erat in, fermentum est. Aenean ut hendrerit metus. Morbi vitae augue vel justo porttitor sagittis at a nisi.
                </p>
            </section>
            <section class="section-color">
                <figure>
                    <img src="{{ asset('img/foto-fiesta-1.jpg') }}" alt="Fotografía de una fiesta">
                </figure>
                <p class="section-color__p section-color__p--blue">
                    Integer luctus nibh tincidunt, iaculis erat in, fermentum est. Aenean ut hendrerit metus. Morbi vitae augue vel justo porttitor sagittis at a nisi.
                </p>
            </section>
        </div>
    </main>
<livewire:footer>
@endsection