@extends('web.plantilla')
@section('contenido')


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('web/img/breadcrumb-bg1.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Detalle de clases</h2>
                        <div class="bt-option">
                            <a href="./index.html">Inicio</a>
                            <a href="#">Calendario</a>
                            <span>Calendario</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


    <!-- Class Timetable Section Begin -->
    <section class="class-timetable-section class-details-timetable spad pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 offset-md-1">
                    <div class="class-details-timetable_title mt-5">
                        <h5>Calendario clases grupales</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 offset-md-1">
                    <div class="class-timetable details-timetable">
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Lunes</th>
                                    <th>Martes</th>
                                    <th>Miercoles</th>
                                    <th>Jueves</th>
                                    <th>Viernes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="class-time">10.00am - 11.00am</td>
                                    <td class="hover-dp blank-td"></td>
                                    <td class="dark-bg blank-td"></td> 
                                    <td class="hover-dp ts-meta" data-tsmeta="motivation">
                                        <h5>HIIT</h5>
                                        <span>Fabiana Valle</span>
                                    </td>
                                    <td class="dark-bg blank-td"></td>
                                    <td class="hover-dp ts-meta" data-tsmeta="motivation">
                                        <h5>HIIT</h5>
                                        <span>Fabiana Valle</span>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td class="class-time">7.00pm - 8.00pm</td>
                                    <td class="dark-bg hover-dp ts-meta" data-tsmeta="funcional">
                                        <h5>Funcional</h5>
                                        <span>Lourdes Yorio</span>
                                    </td>
                                    <td class="hover-dp blank-td"></td> 
                                    <td class="dark-bg hover-dp ts-meta" data-tsmeta="funcional">
                                        <h5>Funcional</h5>
                                        <span>Lourdes Yorio</span>
                                    </td>
                                    <td class="blank-td"></td>
                                    <td class="dark-bg hover-dp ts-meta" data-tsmeta="funcional">
                                        <h5>Funcional</h5>
                                        <span>Lourdes Yorio</span>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td class="class-time">9.00pm - 10.00pm</td>
                                    <td class="hover-dp blank-td"></td>
                                    <td class="dark-bg hover-dp ts-meta" data-tsmeta="fitness">
                                        <h5>FUNCIONAL E HIIT</h5>
                                        <span>Miriam Rhul</span>
                                    </td>
                                    <td class="hover-dp blank-td"></td>                                    
                                    <td class="dark-bg hover-dp ts-meta" data-tsmeta="fitness">
                                        <h5>FUNCIONAL E HIIT</h5>
                                        <span>Miriam Rhul</span>
                                    </td>
                                    <td class="hover-dp blank-td"></td>                                  
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Class Timetable Section End -->

    <!-- Class Details Section Begin -->
    <section class="class-details-section spad pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-md-2">
                    <div class="class-details-text">
                        <div class="cd-text">
                            <div class="cd-single-item">
                                <h3>Clases grupales</h3>
                                <p>Entrenamieno grupal para todas las edades! Super dinamicas y divertidas,
                                    adaptadas a todos los niveles! Buscamos que el encuentro con personas que
                                    buscan y tienen la misma meta que vos te motive y asi abordar el objetivo en
                                    conjunto! Proba la primera clase gratis!
                                </p>
                            </div>
                        </div>                        
                    </div>
                </div>                
            </div>
        </div>
    </section>
    <!-- Class Details Section End -->
@endsection