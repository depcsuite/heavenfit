@extends('web.plantilla')
@section('contenido')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('web/img/breadcrumb-bg.jpg') }}">
      <div class="container">
            <div class="row">
                  <div class="col-lg-12 text-center">
                        <div class="breadcrumb-text">
                              <h2>About us</h2>
                              <div class="bt-option">
                                    <a href="./index.html">Home</a>
                                    <span>About</span>
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
                              <span>Our Plan</span>
                              <h2>Choose your pricing plan</h2>
                        </div>
                  </div>
            </div>
            <div class="row justify-content-center">
                  <div class="col-lg-4 col-md-8">
                        @foreach(array_planes as $plan)
                        <div class="ps-item">
                              <h3>{{ $plan-nombre }}</h3>
                              <div class="pi-price">
                                    <h2>$ 39.0</h2>
                                    <span>SINGLE CLASS</span>
                              </div>
                              <ul>
                                    <li>Free riding</li>
                                    <li>Unlimited equipments</li>
                                    <li>Personal trainer</li>
                                    <li>Weight losing classes</li>
                                    <li>Month to mouth</li>
                                    <li>No time restriction</li>
                              </ul>
                              <a href="#" class="primary-btn pricing-btn">Enroll now</a>
                              <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a>
                        </div>
                  </div>
            </div>
      </div>
</section>