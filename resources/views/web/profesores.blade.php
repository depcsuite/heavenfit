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
                                    <a href="/">Inicio</a>
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
                              <a href="/planes" class="primary-btn btn-normal appoinment-btn">Rerservar</a>
                        </div>
                  </div>
            </div>
            <div class="row">
                  <div class="ts-slider owl-carousel">
                        <div class="col-lg-4">
                              <a href="#LourdesY">
                                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-1.jpg') }}">
                                          <div class="ts_text">
                                                <h4>Lourdes Yorio</h4>
                                                <span>Directora</span>
                                          </div>
                                    </div>
                              </a>
                        </div>
                        <div class="col-lg-4">
                              <a href="#FabianaV">
                                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-2.jpg') }}">
                                          <div class="ts_text">
                                                <h4>Fabiana Valle</h4>
                                                <span>Entrenadora</span>
                                          </div>
                                    </div>
                              </a>
                        </div>
                        <div class="col-lg-4">
                              <a href="#CamilaC">
                                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-3.jpg') }}">

                                          <div class="ts_text">
                                                <h4>Camila Coelho</h4>
                                                <span>Entrenadora</span>
                                          </div>
                                    </div>
                              </a>
                        </div>
                        <div class="col-lg-4">
                              <a href="#MiriamR">
                                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-4.jpg') }}">
                                          <div class="ts_text">
                                                <h4>Miriam Ruhl</h4>
                                                <span>Entrenadora</span>
                                          </div>
                                    </div>
                              </a>
                        </div>
                        <div class="col-lg-4">
                              <a href="#CamilaCastro">
                                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-5.jpg') }}">
                                          <div class="ts_text">
                                                <h4>Camila </h4>
                                                <span>Entrenadora</span>
                                          </div>
                                    </div>
                              </a>
                        </div>
                        <div class="col-lg-4">
                              <a href="#MariaLuz">
                                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-6.jpg') }}">
                                          <div class="ts_text">
                                                <h4>Maria luz</h4>
                                                <span>Entrenadora</span>
                                          </div>
                                    </div>
                              </a>
                        </div>
                        <div class="col-lg-4">
                              <a href="#JorgelinaL">
                                    <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-7.jpg') }}">
                                          <div class="ts_text">
                                                <h4>Jorgelina Lizzoli</h4>
                                                <span>Nutricionista</span>
                                          </div>
                                    </div>
                              </a>
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
                                                <div class="cd-trainer-pic" id="LourdesY">
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
                                                            Actualmente, realizo y preparo las rutinas a medida teniendo en cuenta las caracter??stica de los alumnos,
                                                            con el objetivo de que logren su meta entrenando sanamente. <br> <br>
                                                            Estudios: Instructora de musculaci??n, personal trainer, profesora integral de yoga, instructora de spinning y Top Ride</p>

                                                      <ul class="trainer-info">
                                                            <li><span>Idiomas</span>Espa??ol/Ingles</li>
                                                      </ul>

                                                      <p> Habilidades: Escucha activa, liderazgo, compromiso, puntualidad, optimismo, esfuerzo y empat??a </p>
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
                                                <div class="cd-trainer-pic" id="FabianaV">
                                                      <img src="{{ asset('web/img/team/team-2.jpg') }}" alt="">
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                                <div class="cd-trainer-text">
                                                      <div class="trainer-title">
                                                            <h4>Fabiana Valle</h4>
                                                            <span>Entrenadora</span>
                                                      </div>
                                                      <p>Mi nombre es Fabiana Valle. Soy profesora universitaria en educaci??n f??sica y deportes,
                                                            tambien soy profesora integral de yoga <br> <br>
                                                            Estudios: preparadora f??sica, profesora integral de yoga y profesora universitaria de educaci??n f??sica y deportes</p>

                                                      <ul class="trainer-info">
                                                            <li><span>Edad</span>30</li>
                                                            <li><span>Idiomas</span>Espa??ol/Ingles/Italiano</li>
                                                      </ul>

                                                      <p> Habilidades: Educadora motivacional, comunicadora afectiva, gran conocimiento de las necesidades de salud y fitness de los alumnos</p>
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
                                                <div class="cd-trainer-pic" id="CamilaC">
                                                      <img src="{{ asset('web/img/team/team-3.jpg') }}" alt="">
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                                <div class="cd-trainer-text">
                                                      <div class="trainer-title">
                                                            <h4>Camila Coelho</h4>
                                                            <span>Entrenadora</span>
                                                      </div>
                                                      <p>Mi nombre es Camila Coelho. Soy insructora en entrenamieno personal y musculaci??n estoy en el
                                                            tercer a??o del instructurado nacional de educaci??n f??sica <br> <br>
                                                            Estudios: Instructurado en entrenamiento personal y musculaci??n (centro deportivo neofit), Profesorado educaci??n f??sica (3er a??o UNLU)</p>

                                                      <ul class="trainer-info">
                                                            <li><span>Edad</span>20</li>
                                                            <li><span>Idiomas</span>Espa??ol</li>
                                                      </ul>

                                                      <p> Habilidades: Flexible, capacidad para resolver problemas y adaptarme rapidamente, relaci??nes interpersonles(confiable, dedicada, puntual, honesta, interes por los alumnos/as)</p>
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
                                                <div class="cd-trainer-pic" id="MiriamR">
                                                      <img src="{{ asset('web/img/team/team-4.jpg') }}" alt="">
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                                <div class="cd-trainer-text">
                                                      <div class="trainer-title">
                                                            <h4>Miriam Ruhl</h4>
                                                            <span>Entrenadora</span>
                                                      </div>
                                                      <p>Mi nombre es Mirim Ruhl. soy profesora de educaci??n f??sica soy poliglota y tengo amplia
                                                            experiencia en el manejo de grupos de entrenamiento <br> <br>
                                                            Estudios: Profesora de educaci??n f??sica</p>

                                                      <ul class="trainer-info">
                                                            <li><span>Edad</span>34</li>
                                                            <li><span>Idiomas</span>Espa??ol/Ingles/Danes</li>
                                                      </ul>

                                                      <p> Habilidades: capacidad de liderazgo, manejo de grupo, comunicacion interpesonal, escucha y entendimiento de los otros. Coaching y liderazgo educativ??</p>
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
                                                <div class="cd-trainer-pic" id="CamilaCastro">
                                                      <img src="{{ asset('web/img/team/team-5.jpg') }}" alt="">
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                                <div class="cd-trainer-text">
                                                      <div class="trainer-title">
                                                            <h4>Camila Castro</h4>
                                                            <span>Entrenadora</span>
                                                      </div>
                                                      <p>Mi nombre es Camila Castro. Soy estudiante de la licenciatura de actividad f??sica y deportes. Me capacite en el entrenamiento futbolistico <br> <br>
                                                            Estudios: licenciatura actividad f??sica y deportes. Cursos varios con orientacion al entrenamiento futbolistico</p>

                                                      <ul class="trainer-info">
                                                            <li><span>Edad</span>21</li>
                                                            <li><span>Idiomas</span>Espa??ol</li>
                                                      </ul>

                                                      <p> Habilidades: Compromiso y flexibilidad ante cualquier situaci??n </p>
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
                                                <div class="cd-trainer-pic" id="MariaLuz">
                                                      <img src="{{ asset('web/img/team/team-6.jpg') }}" alt="">
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                                <div class="cd-trainer-text">
                                                      <div class="trainer-title">
                                                            <h4>Maria Luz Rodriguez</h4>
                                                            <span>Entrenadora</span>
                                                      </div>
                                                      <p>Mi nombre es Maria Luz. Soy profesora de educacion f??sica y soy cinturon negro 3er dan en taekwon-do (ITF). 
                                                            Actualmente curso la licenciatura en ciencias de la eduaci??n y estoy estudiando para ser acompa??ante terapeutica  <br> <br>
                                                            Estudios: Profesorado eduaci??n f??sica.</p>

                                                      <ul class="trainer-info">
                                                            <li><span>Edad</span>28</li>
                                                            <li><span>Idiomas</span>Espa??ol</li>
                                                      </ul>

                                                      <p> Habilidades: Responsabilidad, escucha activa, empat??a y compromiso </p>
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
                                                <div class="cd-trainer-pic" id="JorgelinaL">
                                                      <img src="{{ asset('web/img/team/team-7.jpg') }}" alt="">
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                                <div class="cd-trainer-text">
                                                      <div class="trainer-title">
                                                            <h4>Jorgelina Lizzoli</h4>
                                                            <span>Nutricionista</span>
                                                      </div>
                                                      <p>Mi nombre es Jorgelina Lizzoli. Formo parte del equipo armando los planes alimenticios enfocados en los objetivos f??sicos <br> <br>
                                                            Estudios: Lic.Nutrici??n (Instituto Universitario Cemic), posgrado en alimentaci??n vegetariana/vegana y dipomatura en nutrici??n digesto-absortiva(celiaquia) </p>

                                                      <ul class="trainer-info">
                                                            <li><span>Edad</span>28</li>
                                                            <li><span>Idiomas</span>Espa??ol</li>
                                                      </ul>

                                                      <p> Habilidades: Escucha activa, liderazgo, compromiso, puntualidad, optimismo, esfuerzo y empat??a </p>
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