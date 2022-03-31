@extends("web.plantilla")
@section('contenido')


<section class="contact-section spad">
        <div class="container">
            <div class="row">                
                <div class="col-lg-6 offset-3 pt-5">
                    <div class="leave-comment">
                        <form action="#">
                            <input type="text" placeholder="Correo">
                            <input type="password" placeholder="Contraseña">
                            <button type="submit">Ingresar</button>
                        </form>
                    </div>
                </div>
            </div>            
        </div>
    </section>

@endsection