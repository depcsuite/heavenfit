@extends('web.plantilla')
@section('contenido')


<section class="contact-section spad">
        <div class="container">
            <div class="row">
            <div class="col-lg-12 pt-5 mt-5">
                <div class="leave-comment">
                    <div class="section-title h2">
                      <h2>Complete su ficha de alumno</h2>
                    </div>                
                    <form method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input> 
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="txtEdad" name="txtEdad" placeholder="*Edad" required>
                            </div>
                            <div class="col-6">
                                <input type="txt" id="txtPeso" name="txtPeso" placeholder="*Peso(kg)" required>
                            </div>                               
                        </div>    
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="txtAltura" name="txtAltura" placeholder="*Altura(cm)" required>
                            </div>
                            <div class="col-6">
                                <input type="text" id="txtDeportes" name="txtDeportes" placeholder="*Deportes que haya realizado. Si no realizo poner ninguno" required>
                            </div>                               
                        </div>    
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="txtLesiones" name="txtLesiones" placeholder="*Lesiones que tenga o haya tenido. Si no tiene poner ninguno" required>
                            </div>                              
                            <div class="col-6">
                                <input type="text" id="txtEnfermedades" name="txtEnfermedades" placeholder="*Enfermedades que tenga o haya tenido . Si no tiene poner ninguno" required>
                            </div>                              
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="txtMedicamentos" name="txtMedicamento" placeholder="Medicamentos que tome">
                            </div>                              
                            <div class="col-6">
                                <input type="text" id="txtMateriales" name="txtMateriales" placeholder="*Materiales de entrenamiento Ej. mancuernas, soga, colchoneta. etc . Si no tiene poner ninguno" required>
                            </div>                              
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="txtObjetivo" name="txtObjetivo" placeholder="Objetivo a lograr con las clases">
                            </div>                              
                            <div class="col-6">
                                <select name="txtNutricion" id="txtNutricion" class="select">
                                    <option value="" selected disabled>Tiene un plan nutricional? le interesa uno?</option>
                                    <option value="Si tengo">Si, tengo</option>
                                    <option value="no me interesa">No tengo y no me interesa</option>
                                    <option value="me interesa">No tengo y me interesa</option>
                                </select>
                            </div>                              
                        </div>
                        <div class="row">
                        <div class="col-6">
                                <select name="lstNacionalidad" id="lstNacionalidad" class="select">
                                    <option value="" selected disabled>Nacionalidad</option>
                                    @for ($i = 0; $i < count($array_nacionalidad); $i++)
                                        <option value="{{ $array_nacionalidad[$i]->idpais }}">{{ $array_nacionalidad[$i]->nombre }}</option>
                                    @endfor
                                </select>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="txtFechaNac" class="white">*Fecha de nacimiento</label>
                                <input type="date" id="txtFechaNac" name="txtFechaNac" placeholder="Fecha de nacimiento" required>
                            </div>                              
                            <div class="col-6">
                                <label for="txtFoto">Foto perfil</label>
                                <input type="file" id="txtFoto" name="txtFoto" placeholder="adjuntar foto">
                            </div>                              
                        </div>
                        <div class="col-6 pl-0">
                        <button type="submit" class="btn">Guardar</button>
                        </div>                        
                    </form>
                </div>
            </div>            
        </div>
    </section>

@endsection