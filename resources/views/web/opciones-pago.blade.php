@extends('web.plantilla')
@section('contenido')
<section class="contact-section spad">
      <div class="container">
            <div class="row">
                  <div class="col-12">
                        <div class="section-title h2 mt-5">
                              <h2>Opciones de pago</h2>
                        </div>
                  </div>
            </div>
            <div class="row spad">
                  <div class="col-6">                        
                        <div class="row">
                              <div class="col-12 center">
                                    <div class="card mx-auto" style="width: 18rem;">
                                         <a href="/pago-transferencia/{{ $idPlan }}"> <img src="{{ asset('web/img/pago/transferencia-bancaria.jpg') }}" class="card-img-top gris" alt=""> </a>
                                         
                                    </div>
                                    <p class="text-ligth offset-3"> *Los pagos por transferencia tienen un 10% de descuento!</p>
                              </div>
                        </div>
                  </div>
                  <div class="col-6">                        
                  <div class="row">
                              <div class="col-12 center">
                                    <div class="card mx-auto" style="width: 18rem;">
                                         <a href="/pago-mercadopago/{{ $idPlan }}"> <img src="{{ asset('web/img/pago/mercado-pago.png') }}" class="card-img-top gris" alt=""> </a>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</section>
@endsection