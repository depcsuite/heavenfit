@extends("web.plantilla")
@section('contenido')


<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-md-3 mt-4 pb-4 pt-5 spad">
                <div class="leave-comment">
                    @if(isset($mensaje))
                    <div class="alert alert-primary" role="alert">
                        <?php echo $mensaje?>
                    </div>
                    @endif
                    <form method="POST" action="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                        <input type="text" placeholder="Correo" name="txtCorreo" id="txtCorreo">
                        <input type="password" placeholder="Contraseña" name="txtClave" id="txtClave">
                        <button type="submit">Ingresar</button>
                    </form>
                    <a href="/recuperar-clave">Recuperar clave</a><br>
                    <a href="/registrarse">¿Aún no estas registrado? Registrate</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection