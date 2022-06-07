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
                            <a href="/planes" class="primary-btn">Reserva!</a>
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
                            <a href="/planes" class="primary-btn">Reserva!</a>
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

                    @if($plan->fk_idtipo_plan == 1)
                    <a href="/contratar-invididual-disciplina/<?php echo $plan->idplan; ?>" class="primary-btn pricing-btn">Reservar</a>
                    @endif
                    @if($plan->fk_idtipo_plan == 2)
                    <a href="/contratar-grupal/<?php echo $plan->idplan; ?>" class="primary-btn pricing-btn">Reservar</a>
                    @endif
                    @if($plan->fk_idtipo_plan == 3)
                    <a href="/contratar-invididual-multiple" class="primary-btn pricing-btn">Reservar</a>
                    @endif
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
                            <img src="{{ asset('web/img/testimonial/testimonial-6.jpg') }}" alt="">
                        </div>
                        <div class="ti_text testimonio text-center">
                            <p>Lourdes está muy involucrada, hace que las clases sean dinámicas y divertidas para no aburrirse y rendirse.
                                Su buena onda, calidez, y gran disposición en ayudarme me aseguran de poder cumplir mis metas.
                                Realmente un placer tomar clase con Lourdes!!</p>
                            <h5>Marion De Floris</h5>
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
                        <div class="ti_text testimonio text-center">
                            <p>Mi Profe Fabiana es excelente. Me observa y corrige para optimizar los resultados.
                                Escucha mis requerimientos.Y sobre todo es cálida y divertida! Muy recomendable</p>
                            <h5>Adriana Horowitz</h5>
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
                        <div class="ti_text testimonio text-center">
                            <p>Muy buen equipo de trabajo, gente muy educada y con una gran disposición.
                                Cuando ingresé plantemos objetivos y metas a corto y largo plazo.
                                Antes de comenzar cada clase te consultan si tenes alguna dolencia y se cuida mucho las posturas para no realizar movimiento inadecuados.
                                Estoy muy conforme de cómo venimos trabajando con todo el equipo!</p>
                            <h5>Jorge Eduardo Zerbos</h5>
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
                            <img src="{{ asset('web/img/testimonial/testimonial-3.jpg') }}" alt="">
                        </div>
                        <div class="ti_text testimonio text-center">
                            <p>Excelentes clases y muy divertidas!! nada mejor que
                                entrenar desde casa y respetando el ritmo al que vayas
                                Súper recomendada, una genia!!! :)</p>
                            <h5>Amadí Hinostroza</h5>
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
                            <img src="{{ asset('web/img/testimonial/testimonial-4.jpg') }}" alt="">
                        </div>
                        <div class="ti_text testimonio text-center">
                            <p>Excelente profe que se enfoca en lo que vos buscas y lo que te sirve,
                                también cuidando los movimientos para no lástimarse te motiva a dar más y a disfrutarlo.
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
            <div class="ts_item">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="ti_pic">
                            <img src="{{ asset('web/img/testimonial/testimonial-5.jpg') }}" alt="">
                        </div>
                        <div class="ti_text testimonio text-center">
                            <p>Super atenta, se preocupa por conocerte y hacer todas las preguntas necesarias para armar las rutinas
                                de cada clase a tu medida. Las clases se van ajustando exactamente a lo que necesitaba y el trato es
                                súper amable pero me van desafiando. Me encantan las clases, son Justo lo que necesitaba!
                            </p>
                            <h5>Belen Michel</h5>
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
                        <span>Nuestro equipo</span>
                        <h2>Profesores y nutricionistas</h2>
                    </div>
                    <a href="/planes" class="primary-btn btn-normal appoinment-btn">Conoce más</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="ts-slider owl-carousel">
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-1.jpg') }}">
                        <div class="ts_text">
                            <h4>Lourdes Yorio</h4>
                            <span>Directora</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-2.jpg') }}">
                        <div class="ts_text">
                            <h4>Fabiana Valle</h4>
                            <span>Entrenadora</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-3.jpg') }}">
                        <div class="ts_text">
                            <h4>Camila Coelho</h4>
                            <span>Entrenadora</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-4.jpg') }}">
                        <div class="ts_text">
                            <h4>Miriam Ruhl</h4>
                            <span>Entrenadora</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-5.jpg') }}">
                        <div class="ts_text">
                            <h4>Camila Castro</h4>
                            <span>Entrenadora</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-6.jpg') }}">
                        <div class="ts_text">
                            <h4>Maria Luz Rodriguez</h4>
                            <span>Entrenadora</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-7.jpg') }}">
                        <div class="ts_text">
                            <h4>Jorgelina Lizzoli</h4>
                            <span>Nutricionista</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team Section End -->




@endsection