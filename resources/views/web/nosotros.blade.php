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
                        <a href="/">Inicio</a>
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
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0 mb-5">
                <div class="about-video set-bg" data-setbg="{{ asset('web/img/about-us.jpg') }}"></div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="about-text">
                    <div class="section-title">
                        <span>Sobre nosotros</span>
                        <h2>Heaven Fit</h2>
                    </div>
                    <div class="at-desc">
                        <p>Misión: cambiar la perspectiva del deporte. Disfrutar el proceso<br><br>
                            Visión: lograr los objetivos deportivos de las personas <br><br>
                            Valores: liderazgo, calidad, pasión, integridad, honestidad, empatía,
                            optimismo, paciencia, perseverancia, puntualidad, superación, servicial,
                            voluntad, respeto, esfuerzo y gratitud.
                        </p>
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
                    <h2>Entrenamiento empresarial</h2>
                    <div class="bt-tips">Contactanos</div>
                    <a href="/contacto" class="primary-btn  btn-normal">Contacto</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<section class="choseus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="container">
                    <div class="section-title">
                        <span>Heaven Fit</span>
                        <h2>Sumate a nuestro equipo!</h2>
                    </div>
                    <div class="leave-comment align-self-start">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                            <input type="text" placeholder="Nombre y Apellido" name="txtNombre" required>
                            <input type="text" placeholder="Experiencia" name="txtExperiencia" required>
                            <input type="text" placeholder="Correo" name="txtCorreo" required>
                            <input type="text" placeholder="Telefono" name="txtTelefono" required>
                            <input type="text" placeholder="Edad" name="txtEdad" required>
                            <select name="lstSexo" id="lstSexo" class="select my-2 mx-0">
                                <option selected disabled>Sexo</option>
                                <option value="femenino">Femenino</option>
                                <option value="masculino">Masculino</option>
                            </select>
                            <select name="lstDisponibilidad" id="lstDisponibilidad" class="select my-2 mx-0">
                                <option selected disabled>Disponibilidad</option>
                                <option value="mañana">Mañana</option>
                                <option value="tarde">Tarde</option>
                                <option value="mañana y tarde">Mañana y Tarde</option>
                            </select>
                            <label for="" class="form-label text-light">Cargar CV:</label>
                            <small class="text-light">(.PDF, .doc, .docx)</small>
                            <input type="file" name="txtCv" class="form-control" accept=".doc, .docx, .pdf">
                            <button type="submit" name="btnEnviar">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-0 align-self-center mt-5 pt-5">
                <div class="breadcrumb-section set-bg" data-setbg="{{ asset('web/img/equipo2.jpg') }}"></div>
            </div>
        </div>
</section>
@endsection