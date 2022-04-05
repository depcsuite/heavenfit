@extends("web.plantilla")
@section('contenido')



<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-3 spad pt-5 mt-5">
                <div class="leave-comment">
                    <form method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                        <div class="row">

                            <input type="text" id="txtNombre" name="txtNombre" placeholder="Nombre y apellido">

                            <input type="mail" id="txtCorreo" name="txtCorreo" placeholder="Correo">

                            <input type="text" id="txtTelefono" name="txtTelefono" placeholder="Telefono">

                            <input type="password" id="txtClave" name="txtClave" placeholder="Clave">

                            <input type="password" id="txtClave2" name="txtClave2" placeholder="Re-ingresar clave">

                            <button type="submit" class="btn">Registrarse</button>
                            <a href="/login">Volver a login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>

@endsection