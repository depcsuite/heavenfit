@extends('web.plantilla')
@section('contenido')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('web/img/breadcrumb-bg4.jpg') }}">
      <div class="container">
            <div class="row">
                  <div class="col-lg-12 text-center">
                        <div class="breadcrumb-text">
                              <h2>Planes</h2>
                              <div class="bt-option">
                                    <a href="./index.html">Inicio</a>
                                    <span>Planes</span>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</section>
<!-- Breadcrumb Section End -->

<section class="pricing-section spad">
      <div class="container">
            <div class="row">
                  <div class="col-lg-12">
                        <div class="section-title">
                              <span>Nuestros planes</span>
                              <h2>Elegi el plan que mas se adapte a tu objetivo</h2>
                        </div>
                  </div>
            </div>
            <div class="row justify-content-center">
                  @foreach($array_planes as $plan)
                  <div class="col-lg-4 col-md-8">     
                        <div class="ps-item">
                              <h3>{{ $plan->nombre }}</h3>
                              <div class="pi-price">
                                    <h2>${{$plan->precio}}</h2>                                    
                              </div>
                              <ul>
                                  <li> {{$plan->descripcion}} </li>  
                              </ul>
                              <a href="#" class="primary-btn pricing-btn">Reservar</a>
                        </div>                        
                  </div>
                  @endforeach
            </div>
      </div>
</section>