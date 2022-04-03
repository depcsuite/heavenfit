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
                                          <h4>Athart Rachel</h4>
                                          <span>Gym Trainer</span>
                                    </div>
                              </div>
                        </div>
                        <div class="col-lg-4">
                              <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-3.jpg') }}">
                                    <div class="ts_text">
                                          <h4>Athart Rachel</h4>
                                          <span>Gym Trainer</span>
                                    </div>
                              </div>
                        </div>
                        <div class="col-lg-4">
                              <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-4.jpg') }}">
                                    <div class="ts_text">
                                          <h4>Athart Rachel</h4>
                                          <span>Gym Trainer</span>
                                    </div>
                              </div>
                        </div>
                        <div class="col-lg-4">
                              <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-5.jpg') }}">
                                    <div class="ts_text">
                                          <h4>Athart Rachel</h4>
                                          <span>Gym Trainer</span>
                                    </div>
                              </div>
                        </div>
                        <div class="col-lg-4">
                              <div class="ts-item set-bg" data-setbg="{{ asset('web/img/team/team-6.jpg') }}">
                                    <div class="ts_text">
                                          <h4>Athart Rachel</h4>
                                          <span>Gym Trainer</span>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</section>
<!-- Team Section End -->

<!--ficha profesor-->
<section class="class-details-section spad">
        <div class="container">
            <div class="row">
                  <div class="cd-trainer">
                        <div class="row">
                              <div class="col-md-6">
                                    <div class="cd-trainer-pic">
                                          <img src="{{ asset('web/img/classes/class-details/trainer-profile.jpg') }}" alt="">
                                    </div>
                              </div>
                              <div class="col-md-6">
                                    <div class="cd-trainer-text">
                                          <div class="trainer-title">
                                                <h4>Athart Rachel</h4>
                                                <span>Gym Trainer</span>
                                          </div>
                                          <div class="trainer-social">
                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                                                <a href="#"><i class="fa fa-instagram"></i></a>
                                                <a href="#"><i class="fa  fa-envelope-o"></i></a>
                                          </div>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua viverra maecenas lacus
                                                vel facilisis.</p>
                                          <ul class="trainer-info">
                                                <li><span>Age</span>35</li>
                                                <li><span>Weight</span>148lbs</li>
                                                <li><span>Height</span>10' 2``</li>
                                                <li><span>Occupation</span>no-founder</li>
                                          </ul>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua viverra maecenas lacus
                                                vel facilisis. </p>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</section>
