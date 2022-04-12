@extends('web.plantilla')
@section('contenido')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('web/img/breadcrumb-bg3.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Elegí un profesor</h2>
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
                <div class="col-lg-12">
                    <div class="section-title contact-title">
                        <h2>Profesores:</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                  <form action="" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>        
                        @foreach($array_profesores as $profesor)
                        <div class="col-6">
                              <div>
                                    <h3 class="text-light">{{ $profesor->nombre }}</h3>
                              </div>    
                              <div>
                                    <select name="lstHorario" id="lstHorario" class="form-control">
                                          <option value="" disabled selected>Seleccionar</option>
                                          @foreach($array_horarios[$profesor->idprofesor] as $horario)
                                                <option value="{{ $horario->idhorario }}" >{{ date_format(date_create($horario->fecha_desde), "d/m/Y H:i") }} a {{ date_format(date_create($horario->fecha_hasta), "H:i")}} hs.</option>
                                          @endforeach
                                    </select> 
                              </div>
                        </div>
                        @endforeach
                        <button type="submit" class="btn text-white">Reservar</button>
                  </form>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->


@endsection
