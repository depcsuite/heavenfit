@extends('web.plantilla')
@section('contenido')
<section class="contact-section spad">
      <div class="container">
            <div class="row">
                  <div class="col-12">
                        <div class="section-title h2 mt-5">
                              <h2>Reserva Clase Individual</h2>
                        </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-2">
                  <a href="https://koalendar.com/u/PtcBFs47GYPEFuiDwc9zk4akelx1"> <img src="{{ asset('web/img/pago/calendario.png') }}" style="border-radius:50% ;" alt=""> </a>
                  </div>
                  <div class="col-8 mb-4">
                        
                        <h3 class="text-light pt-5">Toque el icono que lo llevará al calendario de reserva, ahí prodra elegir la profesora y el horario que mas le convenga </h3>
                  </div>

            </div>
            <div class="row">
                  <div class="col-2">
                       <!-- <div class="marco-img"></div> -->
                       <img src="{{ asset('web/img/team/team-2.jpg') }}" class="marco-img" alt="">
                  </div>
                  <div class="col-2">
                        <img src="{{ asset('web/img/team/team-3.jpg') }}" class="marco-img" alt="">
                  </div>
                  <div class="col-2">
                        <img src="{{ asset('web/img/team/team-4.jpg') }}" class="marco-img" alt="">
                  </div>
                  <div class="col-2">
                        <img src="{{ asset('web/img/team/team-5.jpg') }}" class="marco-img" alt="">
                  </div>
                  <div class="col-2">
                       <img src="{{ asset('web/img/team/team-6.jpg') }}" class="marco-img" onclick="<?php seleccionar(12) ?>" alt="">
                  </div>
            </div>
            @if(isset($seleccionar) && $seleccionar == 12)
                    <div class="alert alert-primary" role="alert">
                        <?php echo "prueba"?>
                    </div>
            @endif
      </div>
</section>
@endsection
<?php function seleccionar($num){
      $seleccionar = $num;
      return $seleccionar;
} ?>