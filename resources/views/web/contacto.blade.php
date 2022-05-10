@extends('web.plantilla')
@section('contenido')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('web/img/breadcrumb-bg3.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Contacto</h2>
                        <div class="bt-option">
                            <a href="index.php">Inicio</a>
                            <span>Contacto</span>
                        </div>
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
                <div class="col-lg-6">
                    <div class="section-title contact-title">
                        <h2>Contactos:</h2>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-text">
                            <i class="fa fa-mobile"></i>
                            <ul>
                                <li>+54 2478 471095</li>
                            </ul>
                        </div>
                        <div class="cw-text email">
                            <i class="fa fa-envelope"></i>
                            <p>lourdesyorio51@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                            <input type="text" placeholder="Nombre y Apellido" name="txtNombre" required>
                            <input type="text" placeholder="Email" name="txtEmail" required>
                            <input type="text" placeholder="Asunto" name="txtAsunto" required>
                            <textarea placeholder="Mensaje" name="txtMensaje" required></textarea>
                            <button type="submit" name="btnEnviar">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>            
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
 
