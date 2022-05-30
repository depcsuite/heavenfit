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
                  <div class="col-md-8 col-12 mb-4 mx-auto">
                        <h3 class="text-light pt-5 text-center">Toque el icono de la profesora que desee elegir y le aparecera el calendario para reservar la clase</h3>
                  </div>

            </div>
            <div class="row">
                  <div class="col-md-2 ml-md-5">
                        <!-- <div class="marco-img"></div> -->
                        <img src="{{ asset('web/img/team/team-2.jpg') }}" id="profe1" class="marco-img" alt="">
                  </div>
                  <div class="ifrm1"></div>

                  <div class="col-md-2">
                        <img src="{{ asset('web/img/team/team-3.jpg') }}" id="profe2" class="marco-img" alt="">
                  </div>
                  <div class="ifrm2"></div>

                  <div class="col-md-2">
                        <img src="{{ asset('web/img/team/team-4.jpg') }}" id="profe3" class="marco-img" alt="">
                  </div>
                  <div class="ifrm3"></div>

                  <div class="col-md-2">
                        <img src="{{ asset('web/img/team/team-5.jpg') }}" id="profe4" class="marco-img" alt="">
                  </div>
                  <div class="ifrm4"></div>

                  <div class="col-md-2 ">
                        <img src="{{ asset('web/img/team/team-6.jpg') }}" id="profe5" class="marco-img" alt="">
                  </div>
                  

            </div>
            <div class="ifrm"></div>
      </div>


</section>

<script>
      const frame = document.querySelector(".ifrm");
      const frame1 = document.querySelector(".ifrm1");
      const frame2 = document.querySelector(".ifrm2");
      const frame3 = document.querySelector(".ifrm3");
      const frame4 = document.querySelector(".ifrm4");
      const media = window.matchMedia("(max-width:800px)");
      const profe1 = document.getElementById("profe1");
      const profe2 = document.getElementById("profe2");
      const profe3 = document.getElementById("profe3");
      const profe4 = document.getElementById("profe4");
      const profe5 = document.getElementById("profe5");

      if(!media.matches){
            profe1.addEventListener("click", () => {
                  profe1.classList.toggle('seleccionado');
                  profe2.classList.remove('seleccionado');
                  profe3.classList.remove('seleccionado');
                  profe4.classList.remove('seleccionado');
                  profe5.classList.remove('seleccionado');
                  frame.innerHTML = "";
                  var ifrm = document.createElement("iframe");
                  ifrm.setAttribute("src", "https://koalendar.com/e/fabiana?embed=true");
                  ifrm.style.width = "100%";
                  ifrm.style.height = "800px";
                  ifrm.frameBorder = 0;
                  frame.appendChild(ifrm);
            });

            profe2.addEventListener("click", () => {            
                  profe2.classList.toggle('seleccionado');
                  profe1.classList.remove('seleccionado');
                  profe3.classList.remove('seleccionado');
                  profe4.classList.remove('seleccionado');
                  profe5.classList.remove('seleccionado');
                  frame.innerHTML = "";
                  var ifrm = document.createElement("iframe");
                  ifrm.setAttribute("src", "https://koalendar.com/e/entrenamiento-personalizado?embed=true  ");
                  ifrm.style.width = "100%";
                  ifrm.style.height = "800px";
                  ifrm.frameBorder = 0;
                  frame.appendChild(ifrm);
            });

            profe3.addEventListener("click", () => {            
                  profe3.classList.toggle('seleccionado');
                  profe2.classList.remove('seleccionado');
                  profe1.classList.remove('seleccionado');
                  profe4.classList.remove('seleccionado');
                  profe5.classList.remove('seleccionado');
                  frame.innerHTML = "";
                  var ifrm = document.createElement("iframe");
                  ifrm.setAttribute("src", "https://koalendar.com/e/miriam?embed=true");
                  ifrm.style.width = "100%";
                  ifrm.style.height = "800px";
                  ifrm.frameBorder = 0;
                  frame.appendChild(ifrm);
            });

            profe4.addEventListener("click", () => {            
                  profe4.classList.toggle('seleccionado');
                  profe2.classList.remove('seleccionado');
                  profe3.classList.remove('seleccionado');
                  profe1.classList.remove('seleccionado');
                  profe5.classList.remove('seleccionado');
                  frame.innerHTML = "";
                  var ifrm = document.createElement("iframe");
                  ifrm.setAttribute("src", "https://koalendar.com/e/camila-castro?embed=true");
                  ifrm.style.width = "100%";
                  ifrm.style.height = "800px";
                  ifrm.frameBorder = 0;
                  frame.appendChild(ifrm);
            });

            profe5.addEventListener("click", () => {            
                  profe5.classList.toggle('seleccionado');
                  profe2.classList.remove('seleccionado');
                  profe3.classList.remove('seleccionado');
                  profe4.classList.remove('seleccionado');
                  profe1.classList.remove('seleccionado');
                  frame.innerHTML = "";   
                  var ifrm = document.createElement("iframe");
                  ifrm.setAttribute("src", "https://koalendar.com/e/maria-luz?embed=true");
                  ifrm.style.width = "100%";
                  ifrm.style.height = "800px";
                  ifrm.frameBorder = 0;
                  frame.appendChild(ifrm);
            });
      }else{
            profe1.addEventListener("click", () => {
                  profe1.classList.toggle('seleccionado');
                  profe2.classList.remove('seleccionado');
                  profe3.classList.remove('seleccionado');
                  profe4.classList.remove('seleccionado');
                  profe5.classList.remove('seleccionado');
                  frame.innerHTML = "";
                  var ifrm = document.createElement("iframe");
                  ifrm.setAttribute("src", "https://koalendar.com/e/fabiana?embed=true");
                  ifrm.style.width = "100%";
                  ifrm.style.height = "800px";
                  ifrm.frameBorder = 0;
                  
                  frame1.appendChild(ifrm);
            });

            profe2.addEventListener("click", () => {            
                  profe2.classList.toggle('seleccionado');
                  profe1.classList.remove('seleccionado');
                  profe3.classList.remove('seleccionado');
                  profe4.classList.remove('seleccionado');
                  profe5.classList.remove('seleccionado');
                  frame.innerHTML = "";
                  var ifrm = document.createElement("iframe");
                  ifrm.setAttribute("src", "https://koalendar.com/e/entrenamiento-personalizado?embed=true  ");
                  ifrm.style.width = "100%";
                  ifrm.style.height = "800px";
                  ifrm.frameBorder = 0;
                  
                  frame2.appendChild(ifrm);
            });

            profe3.addEventListener("click", () => {            
                  profe3.classList.toggle('seleccionado');
                  profe2.classList.remove('seleccionado');
                  profe1.classList.remove('seleccionado');
                  profe4.classList.remove('seleccionado');
                  profe5.classList.remove('seleccionado');
                  frame.innerHTML = "";
                  var ifrm = document.createElement("iframe");
                  ifrm.setAttribute("src", "https://koalendar.com/e/miriam?embed=true");
                  ifrm.style.width = "100%";
                  ifrm.style.height = "800px";
                  ifrm.frameBorder = 0;
                  
                  frame3.appendChild(ifrm);
            });

            profe4.addEventListener("click", () => {            
                  profe4.classList.toggle('seleccionado');
                  profe2.classList.remove('seleccionado');
                  profe3.classList.remove('seleccionado');
                  profe1.classList.remove('seleccionado');
                  profe5.classList.remove('seleccionado');
                  frame.innerHTML = "";
                  var ifrm = document.createElement("iframe");
                  ifrm.setAttribute("src", "https://koalendar.com/e/camila-castro?embed=true");
                  ifrm.style.width = "100%";
                  ifrm.style.height = "800px";
                  ifrm.frameBorder = 0;
                  
                  frame4.appendChild(ifrm);
            });

            profe5.addEventListener("click", () => {            
                  profe5.classList.toggle('seleccionado');
                  profe2.classList.remove('seleccionado');
                  profe3.classList.remove('seleccionado');
                  profe4.classList.remove('seleccionado');
                  profe1.classList.remove('seleccionado');
                  frame.innerHTML = "";   
                  var ifrm = document.createElement("iframe");
                  ifrm.setAttribute("src", "https://koalendar.com/e/maria-luz?embed=true");
                  ifrm.style.width = "100%";
                  ifrm.style.height = "800px";
                  ifrm.frameBorder = 0;
                  
                  frame.appendChild(ifrm);
            });
      }
</script>
@endsection