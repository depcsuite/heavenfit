@extends('web.plantilla')
@section('contenido')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('web/img/breadcrumb-bg.jpg') }}">
      <div class="container">
            <div class="row">
                  <div class="col-lg-12 text-center">
                        <div class="breadcrumb-text">
                              <h2>Profesores</h2>
                              <div class="bt-option">
                                    <a href="./index.html">Inicio</a>
                                    <span>Profesores</span>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</section>
<!-- Breadcrumb Section End -->

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
                              <a href="/reserva" class="primary-btn btn-normal appoinment-btn">Rerservar</a>
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

<!-- Class Details Section Begin -->
<section class="class-details-section spad">
      <div class="container">
            <div class="row py-4">
                  <div class="col-lg-8">
                        <div class="class-details-text">                           
                              <div class="cd-trainer">
                                    <div class="row">
                                          <div class="col-md-6">
                                                <div class="cd-trainer-pic">
                                                      <img src="{{ asset('web/img/team/team-1.jpg') }}" alt="">
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                                <div class="cd-trainer-text">
                                                      <div class="trainer-title">
                                                            <h4>Lourdes Yorio</h4>
                                                            <span>Directora</span>
                                                      </div>
                                                      <p>Mi nombre es Lourdes Yorio y soy la creadora de Heaven Fit, empresa que buscar lograr que las personas amen el deporte. 
                                                      Actualmente, realizo y preparo las rutinas a medida teniendo en cuenta las característica de los alumnos, 
                                                      con el objetivo de que logren su meta entrenando sanamente. <br> <br> 
                                                      Estudios: Instructora de musculación, personal trainer, profesora integral de yoga, instructora de spinning y Top Ride</p>
                                                      
                                                      <ul class="trainer-info">                                                           
                                                            <li><span>Idiomas</span>Español/Ingles</li>
                                                      </ul>
                                                      
                                                      <p> Habilidades: Escucha activa, liderazgo, compromiso, puntualidad, optimismo, esfuerzo y empatía </p>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>            
            <div class="row py-4">
                  <div class="col-lg-8">
                        <div class="class-details-text">                           
                              <div class="cd-trainer">
                                    <div class="row">
                                          <div class="col-md-6">
                                                <div class="cd-trainer-pic">
                                                      <img src="{{ asset('web/img/team/team-2.jpg') }}" alt="">
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                                <div class="cd-trainer-text">
                                                      <div class="trainer-title">
                                                            <h4>Fabiana Valle</h4>
                                                            <span>Entrenadora</span>
                                                      </div>
                                                      <p>Mi nombre es Lourdes Yorio y soy la creadora de Heaven Fit, empresa que buscar lograr que las personas amen el deporte. 
                                                      Actualmente, realizo y preparo las rutinas a medida teniendo en cuenta las característica de los alumnos, 
                                                      con el objetivo de que logren su meta entrenando sanamente. <br> <br> 
                                                      Estudios: Instructora de musculación, personal trainer, profesora integral de yoga, instructora de spinning y Top Ride</p>
                                                      
                                                      <ul class="trainer-info">
                                                            <li><span>Edad</span>21</li>
                                                            <li><span>Idiomas</span>Español/Ingles</li>
                                                      </ul>
                                                      
                                                      <p> Habilidades: Escucha activa, liderazgo, compromiso, puntualidad, optimismo, esfuerzo y empatía </p>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>            
            <div class="row py-4">
                  <div class="col-lg-8">
                        <div class="class-details-text">                           
                              <div class="cd-trainer">
                                    <div class="row">
                                          <div class="col-md-6">
                                                <div class="cd-trainer-pic">
                                                      <img src="{{ asset('web/img/team/team-3.jpg') }}" alt="">
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                                <div class="cd-trainer-text">
                                                      <div class="trainer-title">
                                                            <h4>Camila Coelho</h4>
                                                            <span>Entrenadora</span>
                                                      </div>
                                                      <p>Mi nombre es Lourdes Yorio y soy la creadora de Heaven Fit, empresa que buscar lograr que las personas amen el deporte. 
                                                      Actualmente, realizo y preparo las rutinas a medida teniendo en cuenta las característica de los alumnos, 
                                                      con el objetivo de que logren su meta entrenando sanamente. <br> <br> 
                                                      Estudios: Instructora de musculación, personal trainer, profesora integral de yoga, instructora de spinning y Top Ride</p>
                                                      
                                                      <ul class="trainer-info">
                                                            <li><span>Edad</span>21</li>
                                                            <li><span>Idiomas</span>Español/Ingles</li>
                                                      </ul>
                                                      
                                                      <p> Habilidades: Escucha activa, liderazgo, compromiso, puntualidad, optimismo, esfuerzo y empatía </p>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>            
            <div class="row py-4">
                  <div class="col-lg-8">
                        <div class="class-details-text">                           
                              <div class="cd-trainer">
                                    <div class="row">
                                          <div class="col-md-6">
                                                <div class="cd-trainer-pic">
                                                      <img src="{{ asset('web/img/team/team-4.jpg') }}" alt="">
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                                <div class="cd-trainer-text">
                                                      <div class="trainer-title">
                                                            <h4>Miriam Ruhl</h4>
                                                            <span>Entrenadora</span>
                                                      </div>
                                                      <p>Mi nombre es Lourdes Yorio y soy la creadora de Heaven Fit, empresa que buscar lograr que las personas amen el deporte. 
                                                      Actualmente, realizo y preparo las rutinas a medida teniendo en cuenta las característica de los alumnos, 
                                                      con el objetivo de que logren su meta entrenando sanamente. <br> <br> 
                                                      Estudios: Instructora de musculación, personal trainer, profesora integral de yoga, instructora de spinning y Top Ride</p>
                                                      
                                                      <ul class="trainer-info">
                                                            <li><span>Edad</span>21</li>
                                                            <li><span>Idiomas</span>Español/Ingles</li>
                                                      </ul>
                                                      
                                                      <p> Habilidades: Escucha activa, liderazgo, compromiso, puntualidad, optimismo, esfuerzo y empatía </p>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>            
            <div class="row py-4">
                  <div class="col-lg-8">
                        <div class="class-details-text">                           
                              <div class="cd-trainer">
                                    <div class="row">
                                          <div class="col-md-6">
                                                <div class="cd-trainer-pic">
                                                      <img src="{{ asset('web/img/team/team-5.jpg') }}" alt="">
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                                <div class="cd-trainer-text">
                                                      <div class="trainer-title">
                                                            <h4>Jorgelina Lizzoli</h4>
                                                            <span>Nutricionista</span>
                                                      </div>
                                                      <p>Mi nombre es Lourdes Yorio y soy la creadora de Heaven Fit, empresa que buscar lograr que las personas amen el deporte. 
                                                      Actualmente, realizo y preparo las rutinas a medida teniendo en cuenta las característica de los alumnos, 
                                                      con el objetivo de que logren su meta entrenando sanamente. <br> <br> 
                                                      Estudios: Instructora de musculación, personal trainer, profesora integral de yoga, instructora de spinning y Top Ride</p>
                                                      
                                                      <ul class="trainer-info">
                                                            <li><span>Edad</span>21</li>
                                                            <li><span>Idiomas</span>Español/Ingles</li>
                                                      </ul>
                                                      
                                                      <p> Habilidades: Escucha activa, liderazgo, compromiso, puntualidad, optimismo, esfuerzo y empatía </p>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>          
      </div>
</section>
@endsection