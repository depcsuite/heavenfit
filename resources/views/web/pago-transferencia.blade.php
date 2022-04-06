@extends('web.plantilla')
@section('contenido')
<section class="contact-section spad">
      <div class="container">
            <div class="row">
                  <div class="col-12">
                        <div class="section-title h2 mt-5">
                              <h2>Pago por transferencia bancaria</h2>
                        </div>
                  </div>
            </div>
            <div class="row spad">
                  <div class="col-12">
                        <p>Realizá la transferencia a una de las siguientes cuentas y adjuntá el comprobante de pago:</p>
                  </div>
                  <div class="col-6">
                        <table class="table text-white">
                              <tr>
                                    <th colspan="2" class="text-center">Banco Macro</th>
                              </tr>
                              <tr>
                                    <th>CBU:</th>
                                    <td>2850584840095163463928</td>
                              </tr>
                              <tr>
                                    <th>Alias:</th>
                                    <td>GANCHO.SUR.JARRA</td>
                              </tr>
                              <tr>
                                    <th>Nombre:</th>
                                    <td>Lourdes Yorio</td>
                              </tr>
                              <tr>
                                    <th>CUIT:</th>
                                    <td>27425402000</td>
                              </tr>
                              <tr>
                                    <th>Importe:</th>
                                    <td>${{ number_format($plan->precio,2, ',', '.') }}</td>
                              </tr>
                        </table>
                  </div>
                  <div class="col-6">
                        <table class="table text-white">
                              <tr>
                                    <th colspan="2" class="text-center">Mercadopago</th>
                              </tr>
                              <tr>
                                    <th>CVU:</th>
                                    <td></td>
                              </tr>
                              <tr>
                                    <th>Alias:</th>
                                    <td></td>
                              </tr>
                              <tr>
                                    <th>Nombre:</th>
                                    <td>Lourdes Yorio</td>
                              </tr>
                              <tr>
                                    <th>CUIT:</th>
                                    <td>27425402000</td>
                              </tr>
                              <tr>
                                    <th>Importe:</th>
                                    <td>${{ number_format($plan->precio,2, ',', '.') }}</td>
                              </tr>
                        </table>
                  </div>
     
                  <form action="" method="POST" enctype="multipart/form-data">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                        <div class="col-12 text-white">
                              <p>Adjuntá el comprobante de pago</p>
                        </div> 
                        <div class="col-12 text-white">
                              <input type="file" name="archivo" id="archivo" accept="image/png, image/gif, image/jpeg">
                              <small>.jpg, .jpeg, .png</small>
                              <button name="btnEnviar" id="btnEnviar" class="">Enviar</button>
                        </div> 
                  </form>
            </div>
      </div>
</section>
