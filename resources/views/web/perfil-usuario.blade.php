@extends('web.plantilla')
@section('contenido')


<section class="contact-section spad">
        <div class="container">
            <div class="row">
            <div class="col-lg-12 pt-5 mt-5">
                <div class="leave-comment">
                      <h1>Complete su ficha de alumno</h1>              
                    <form method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input> 
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="txtEdad" name="txtEdad" placeholder="Edad">
                            </div>
                            <div class="col-6">
                                <input type="txt" id="txtPeso" name="txtPeso" placeholder="Peso(kg)">
                            </div>                               
                        </div>    
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="txtAltura" name="txtAltura" placeholder="Altura(cm)">
                            </div>
                            <div class="col-6">
                                <input type="text" id="txtDeportes" name="txtDeportes" placeholder="Deportes que haya realizado">
                            </div>                               
                        </div>    
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="txtLesiones" name="txtLesiones" placeholder="Lesiones que tenga o haya tenido">
                            </div>                              
                            <div class="col-6">
                                <input type="text" id="txtEnfermedades" name="txtEnfermedades" placeholder="Enfermedades que tenga o haya tenido">
                            </div>                              
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="txtMedicamentos" name="txtMedicamentos" placeholder="Medicamentos que tome">
                            </div>                              
                            <div class="col-6">
                                <input type="text" id="txtMateriales" name="txtMateriales" placeholder="Materiales de entrenamiento Ej. mancuernas, soga, colchoneta. etc">
                            </div>                              
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="txtObjetivo" name="txtObjetivo" placeholder="Objetivo a lograr con las clases">
                            </div>                              
                            <div class="col-6">
                                <input type="date" id="txtFechaNac" name="txtFechaNac" placeholder="Fecha de nacimiento">
                            </div>                              
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="txtNutricion" name="txtNutricion" placeholder="Tiene un plan nutricional? le interesa uno?">
                            </div>                              
                            <div class="col-6">
                                <input type="file" id="txtFoto" name="txtFoto" placeholder="adjuntar foto">
                            </div>                              
                        </div>
                        <div class="col-6">
                        <button type="submit" class="btn">Guardar</button>
                        </div>                        
                    </form>
                </div>
            </div>            
        </div>
    </section>

@endsection