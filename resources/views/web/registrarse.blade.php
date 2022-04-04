@extends("web.plantilla")
@section('contenido')



<section class="contact-section spad">
        <div class="container">
            <div class="row">
            <div class="col-lg-12 pt-5 mt-5">
                <div class="leave-comment">              
                    <form method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input> 
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="txtNombre" name="txtNombre" placeholder="Nombre y apellido">
                            </div>
                            <div class="col-6">
                                <input type="mail" id="txtCorreo" name="txtCorreo" placeholder="Correo">
                            </div>                               
                        </div>    
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="txtTelefono" name="txtTelefono" placeholder="Telefono">
                            </div>
                            <div class="col-6">
                                <input type="password" id="txtClave" name="txtClave" placeholder="Clave">
                            </div>                               
                        </div>    
                        <div class="row">
                            <div class="col-6">
                                <input type="password" id="txtClave2" name="txtClave2" placeholder="Re-ingresar clave">
                            </div>                              
                        </div>
                        <div class="col-6">
                        <button type="submit" class="btn">Registrarse</button>
                        <a href="/login">Volver a login</a>
                        </div>                        
                    </form>
                </div>
            </div>            
        </div>
    </section>

@endsection