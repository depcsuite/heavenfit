<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Heaven Fit</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/barfiller.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}" type="text/css">

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="fa fa-close"></i>
        </div>
        <nav class="canvas-menu mobile-menu">
            <ul>
                <li><a href="/">Inicio</a></li>
                <li><a href="/nosotros">Nosotros</a></li>
                <li><a href="/profesores">Profesores</a></li>
                <li><a href="/clases">Calendario</a></li>
                <li><a href="/planes">Planes</a></li>
                <li><a href="/contacto">Contacto</a></li>
                <li><a href="/login">ingresar</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="canvas-social">
            <a href="http://wa.me/5492478471095"><i class="fa fa-whatsapp"></i></a>
            <a href="https://www.instagram.com/_heavenfit/"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="/index.php">
                            <img class="img-logo" src="{{ asset('web/img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="nav-menu">
                        <ul>
                            <li <?php echo $_SERVER["REQUEST_URI"] == "/" ? 'class="active"' : ""; ?>> <a href="/"> Inicio</a></li>
                            <li <?php echo $_SERVER["REQUEST_URI"] == "/nosotros" ? 'class="active"' : ""; ?>> <a href="/nosotros"> Nosotros</a></li>
                            <li <?php echo $_SERVER["REQUEST_URI"] == "/profesores" ? 'class="active"' : ""; ?>> <a href="/profesores"> Profesores</a></li>
                            <li <?php echo $_SERVER["REQUEST_URI"] == "/clases" ? 'class="active"' : ""; ?>> <a href="/clases">Calendario</a></li>
                            <li <?php echo $_SERVER["REQUEST_URI"] == "/planes" ? 'class="active"' : ""; ?>> <a href="/planes">Planes</a></li>
                            <li <?php echo $_SERVER["REQUEST_URI"] == "/contacto" ? 'class="active"' : ""; ?>> <a href="/contacto">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="top-option">
                        <div class="to-social">
                            
                            @if(Session::get('usuario_id') > 0)
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    Mi cuenta <span class="caret"></span>
                                </button>

                                <ul class="dropdown-menu bg-secondary" role="menu">
                                    <li><a href="/perfil-usuario">Ficha cliente</a></li>
                                    <li class="divider"></li>
                                    <li><a href="/logout">Cerrar sesion</a></li>
                                </ul>
                            </div>
                            @else
                            <a href="/login">Ingresar</a>
                            @endif
                            <a href="http://wa.me/5492478471095"  target="_blank" rel="noopener noreferrer"><i class="fa fa-whatsapp"></i></a>
                            <a href="https://www.instagram.com/_heavenfit/"  target="_blank" rel="noopener noreferrer"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="canvas-open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header End -->

    @yield('contenido')

    <!-- Get In Touch Section Begin -->
    <div class="gettouch-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-2">
                    <div class="gt-text">
                        <i class="fa fa-mobile"></i>
                        <ul>
                            <li>+54 2478 471095</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text email">
                        <i class="fa fa-envelope"></i>
                        <p>info@heaven-fit.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Get In Touch Section End -->

    <!-- Footer Section Begin -->
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-md-2">
                    <div class="fs-about">
                        <div class="fa-logo">
                            <a href="#"><img class="img-logo" src="{{ asset('web/img/logo.png') }}" alt=""></a>
                        </div>
                        <p>En Heaven Fit buscamos lograr un entrenamiento sano, conciente y entretenido, creemos en la idea de que entrenar puede ser placentero
                            y en eso nos basamos a la hora de planificar las clases.
                        </p>
                        <div class="fa-social">
                            <a href="https://www.instagram.com/_heavenfit/"><i class="fa fa-instagram"></i></a>
                            <a href="mailto:lourdesyorio51@gmail.com"><i class="fa  fa-envelope-o"></i></a>
                            <a href="http://wa.me/5492478471095"><i class="fa  fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="fs-widget">
                        <h4>Links utiles</h4>
                        <ul>
                            <li><a href="/nosotros">Nosotros</a></li>
                            <li><a href="/profesores">Profesores</a></li>
                            <li><a href="/clases">Clases</a></li>
                            <li><a href="/planes">Planes</a></li>
                            <li><a href="/contacto">Contacto</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="fs-widget">
                        <h4>Soporte</h4>
                        <ul>
                            <li><a href="/login">Login</a></li>
                            <li><a href="/contacto">Contacto</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('web/js/popper.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('web/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('web/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery.barfiller.js') }}"></script>
    <script src="{{ asset('web/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('web/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('web/js/main.js') }}"></script>

</body>

</html>