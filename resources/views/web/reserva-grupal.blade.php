@extends('web.plantilla')
@section('contenido')
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title h2 mt-5">
                    <h2>Reserva Clase Grupal</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1 mb-5">
                <h3 class="text-light">Este es el calendario de las clases grupales, puede unirse a cualquier clase en el orden que quiera segun la cantidad de clases por semana que haya seleccionado:</h3>
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
        <div class="row">
            <div class="col-10 offset-md-1 mb-4 mt-5">
                <h3 class="text-light">Aqui realiza el pago. una vez verificado le enviamos los links para conectarse a las clases:</h3>
            </div>
        </div>

        <!-- 
                  <div class="col-6">                        
                  <div class="row">
                              <div class="col-12 center">
                                    <div class="card mx-auto" style="width: 18rem;">
                                         <a href="/pago-mercadopago/{{ $idPlan }}"> <img src="{{ asset('web/img/pago/mercado-pago.png') }}" class="card-img-top gris" alt=""> </a>
                                    </div>
                              </div>
                        </div>
                  </div>
                  -->
    
    <div class="row">
        <div class="col-12 center">
            <div class="card mx-auto" style="width: 18rem;">
                <a href="/pago-transferencia/{{ $idPlan }}"> <img src="{{ asset('web/img/pago/transferencia-bancaria.jpg') }}" class="card-img-top gris" alt=""> </a>

            </div>
            <!-- <p class="text-ligth offset-3"> *Los pagos por transferencia tienen un 10% de descuento!</p> -->
        </div>
    </div>
    </div>
</section>
@endsection