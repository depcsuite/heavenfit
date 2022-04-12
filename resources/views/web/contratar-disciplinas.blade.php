@extends('web.plantilla')
@section('contenido')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('web/img/breadcrumb-bg3.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Elegí una disciplina</h2>
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
                        <h2>Disciplinas:</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                  <form action="" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                        <select name="lstDisciplina" id="lstDisciplina" class="form-control">
                              <option value="" disabled selected>Seleccionar</option>
                              @foreach($array_disciplinas as $disciplina)    
                                    <option value="{{ $disciplina->iddisciplina }}" >{{ $disciplina->nombre }}</option>
                              @endforeach
                        </select> 
                        <button type="submit" class="btn text-white">Siguiente</button>
                  </form>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->


@endsection
