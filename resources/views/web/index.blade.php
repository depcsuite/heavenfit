@extends("web.plantilla")
@section('contenido')
<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hs-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="{{ asset('web/img/hero/hero-1.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="hi-text">
                            <span>Clases 100% personalizadas</span>
                            <h1>Primera clase <strong>Gratis</strong></h1>
                            <a href="#" class="primary-btn">Reserva!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hs-item set-bg" data-setbg="{{ asset('web/img/hero/hero-2.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="hi-text">
                            <span>Clases online y presenciales</span>
                            <h1>Entrenar es <strong>Placer</strong> </h1>
                            <a href="#" class="primary-btn">Reserva!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

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

<!-- Classes Section Begin -->
<section class="classes-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Nuestras Clases</span>
                    <h2>A TU MEDIDA</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="{{ asset('web/img/classes/class-1.jpg') }}" alt="">
                    </div>
                    <div class="ci-text">
                        <span>ALTA INTENSIDAD</span>
                        <h5>HIIT</h5>
                        <a href="/clases"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="{{ asset('web/img/classes/class-2.jpg') }}" alt="">
                    </div>
                    <div class="ci-text">
                        <span>Ashtanga/HATHA</span>
                        <h5>YOGA</h5>
                        <a href="/clases"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="{{ asset('web/img/classes/class-3.jpg') }}" alt="">
                    </div>
                    <div class="ci-text">
                        <span>CARDIO</span>
                        <h5>Spinning</h5>
                        <a href="/clases"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="{{ asset('web/img/classes/class-4.jpg') }}" alt="">
                    </div>
                    <div class="ci-text">
                        <span>FUERZA/HIPERTROFIA</span>
                        <h4>Musculacion</h4>
                        <a href="/clases"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="{{ asset('web/img/classes/class-5.jpg') }}" alt="">
                    </div>
                    <div class="ci-text">
                        <span>Funcional</span>
                        <h4>Entrenamiento Funcional</h4>
                        <a href="/clases"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ChoseUs Section End -->

<!-- Pricing Section Begin -->
<section class="pricing-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span><a href="/planes">Nuestros planes</a></span>
                    <h2>Elegí el plan que mas se adapte a tu objetivo</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($array_planes as $plan)
            <div class="col-lg-4 col-md-8">
                <div class="ps-item">
                    <h3>{{ $plan->nombre }}</h3>
                    <div class="pi-price">
                        <h2>${{$plan->precio}}</h2>
                    </div>
                    <ul>
                        <li> {{$plan->descripcion}} </li>
                    </ul>
                    <a href="#" class="primary-btn pricing-btn">Reservar</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Pricing Section End -->

 <!-- Testimonial Section Begin -->
 <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Testimonio</span>
                        <h2>Nuestros clientes</h2>
                    </div>
                </div>
            </div>
            <div class="ts_slider owl-carousel">
                <div class="ts_item">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="ti_pic">
                                <img src="{{ asset('web/img/testimonial/testimonial-1.jpg') }}" alt="">
                            </div>
                            <div class="ti_text">
                                <p>Estoy en clases On-line con el equipo de Lourdes y todas las chicas son divinas, super profesionales,<br /> 
                                 me gusta que me asesoren y es super cómodo para gente como yo que no le gusta ir a gimnasios <br /> ó no tiene constancia, 
                                 haces ejercicio sin salir de tu zona de confort. Lo recomiendo al 100%</p>
                                <h5>Melisa</h5>
                                <div class="tt-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ts_item">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="ti_pic">
                                <img src="{{ asset('web/img/testimonial/testimonial-2.jpg') }}" alt="">
                            </div>
                            <div class="ti_text">
                                <p>El equipo de Lourdes es excelente! Las clases son dinámicas y 100% personalizadas. En poco <br />
                                    tiempo empecé a ver resultados y me siento mucho mejor, con más energía y fuerza! Super recomendada! <br /> 
                                    Tienen diferentes modalidades, presencial, por zoom, individuales y grupales, para todos los gustos!</p>
                                <h5>Ana</h5>
                                <div class="tt-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ts_item">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="ti_pic">
                                <img src="{{ asset('web/img/testimonial/testimonial-1.jpg') }}" alt="">
                            </div>
                            <div class="ti_text">
                                <p>Excelentes clases y muy divertidas!! nada mejor que <br />
                                   entrenar desde casa y respetando el ritmo al que vayas <br />
                                   Súper recomendada, una genia!!! :)</p>
                                <h5>Amadí</h5>
                                <div class="tt-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ts_item">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="ti_pic">
                                <img src="{{ asset('web/img/testimonial/testimonial-2.jpg') }}" alt="">
                            </div>
                            <div class="ti_text">
                                <p>Excelente profe que se enfoca en lo que vos buscas y lo que te sirve, <br />
                                   también cuidando los movimientos para no lástimarse te motiva a dar más y a disfrutarlo. <br /> 
                                   Si tenés poca disciplina para entrenar te la recomiendo mucho!</p>
                                <h5>Leonardo Maestri</h5>
                                <div class="tt-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

<!-- Team Section Begin -->
<section class="team-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="team-title">
                    <div class="section-title">
                        <span>Our Team</span>
                        <h2>TRAIN WITH EXPERTS</h2>
                    </div>
                    <a href="#" class="primary-btn btn-normal appoinment-btn">appointment</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="ts-slider owl-carousel">
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-1.jpg') }}">
                        <div class="ts_text">
                            <h4>Athart Rachel</h4>
                            <span>Gym Trainer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-2.jpg') }}">
                        <div class="ts_text">
                            <h4>Athart Rachel</h4>
                            <span>Gym Trainer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-3.jpg') }}">
                        <div class="ts_text">
                            <h4>Athart Rachel</h4>
                            <span>Gym Trainer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-4.jpg') }}">
                        <div class="ts_text">
                            <h4>Athart Rachel</h4>
                            <span>Gym Trainer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-5.jpg') }}">
                        <div class="ts_text">
                            <h4>Athart Rachel</h4>
                            <span>Gym Trainer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-6.jpg') }}">
                        <div class="ts_text">
                            <h4>Athart Rachel</h4>
                            <span>Gym Trainer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team Section End -->




@endsection