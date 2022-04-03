@extends('web.plantilla')
@section('contenido')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('web/img/breadcrumb-bg2.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Sobre Nosotros</h2>
                        <div class="bt-option">
                            <a href="./index.html">Inicio</a>
                            <span>Nosotros</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

   <!-- ChoseUs Section Begin -->
<section class="choseus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>¿Por qué elegirnos?</span>
                    <h2>ENTRENAR YA NO ES LO QUE ERA</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-018-scale"></span>
                    <h4>Alcanzamos la meta</h4>
                    <p>Nos interesa trazar un plan hacia tu objetivo de manera sana, conciente y disciplinada</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-033-juice"></span>
                    <h4>Plan nutrional saludable</h4>
                    <p>Desde Heaven Fit te ofrecemos la posibilidad de armar tu propio plan nutricional enfocado
                        en tu meta. Es el complemento perfecto para tu entrenamiento
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-002-dumbell"></span>
                    <h4>¿Te cuesta entrenar?</h4>
                    <p>Traemos una novedosa forma de entrenar donde nos enfocamos en que disfrutes hasta que
                        alcances los resultados. Con nosotros no te va a costar entrenar!

                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-014-heart-beat"></span>
                    <h4>Te cuidamos</h4>
                    <p>En Heaven fit tenemos mucha experiencia tratando con distintos tipos
                        de lesiones y enfermedades. Para que a la hora de entrenar eso no sea
                        un obstaculo.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ChoseUs Section End -->

    <!-- About US Section Begin -->
    <section class="choseus-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="about-video set-bg" data-setbg="{{ asset('web/img/about-us.jpg') }}">
                        <a href="https://www.youtube.com/watch?v=EzKkl64rRbM" class="play-btn video-popup"><i
                                class="fa fa-caret-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="about-text">
                        <div class="section-title">
                            <span>Sobre nosotros</span>
                            <h2>What we have done</h2>
                        </div>
                        <div class="at-desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                                viverra maecenas accumsan lacus vel facilisis. aliquip ex ea commodo consequat sit amet,
                                consectetur adipiscing elit, sed do eiusmod tempor.</p>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About US Section End -->

    <!-- Banner Section Begin -->
    <section class="banner-section set-bg" data-setbg="{{ asset('web/img/banner-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="bs-text">
                        <h2>registration now to get more deals</h2>
                        <div class="bt-tips">Where health, beauty and fitness meet.</div>
                        <a href="#" class="primary-btn  btn-normal">Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

   

   
@endsection