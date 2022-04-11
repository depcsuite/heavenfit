@extends('web.plantilla')
@section('contenido')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('web/img/breadcrumb-bg3.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Elegí un profesor</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title contact-title">
                        <h2>Profesores:</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                  <div class="col-lg-6">
                        @foreach($array_profesores as $profesor)
                            <a href="/contratar-profesor/{$profesor->idprofesor}">{{ $profesor->nombre }}</a>
                        @endforeach
                  </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->


@endsection
