<?php
include('includes/interfaz.php');
include('../configs/conexion_db.php');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Agregar Profesional</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ingreso de datos
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form id="limpiar" role="form" method="POST" action="../modulos/agregar_profesional.php">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input name="nombres" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Apellidos</label>
                                    <input name="apellidos" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Rut</label>
                                    <input name="rut" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Ciudad</label>
                                    <input name="ciudad" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Dirección</label>
                                    <input name="direccion" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Teléfono</label>
                                    <input name="telefono" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Asignatura y/o modulo</label>
                                    <select class="form-control hidden" name="asignatura" id="asignatura1">
                                        <option value="Artes Visuales">Artes Visuales</option>
                                        <option value="Ciencias Naturales">Ciencias Naturales</option>
                                        <option value="Educación Física y Salud">Educación Física y Salud</option>
                                        <option value="Historia, Geografía y Ciencias Sociales">Historia, Geografía y Ciencias Sociales</option>
                                        <option value="Matemática">Matemática</option>
                                        <option value="Música">Música</option>
                                        <option value="Orientación">Orientación</option>
                                        <option value="Tecnología">Tecnología</option>
                                    </select>
                                    <select class="form-control hidden" name="asignatura" id="asignatura2">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                    <select class="form-control " name="asignatura" id="asignatura3" disabled>
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Correo</label>
                                    <input name="correo" id="email" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha nacimiento</label>
                                    <input name="fecha_nac" type="date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tipo de profesional</label>
                                    <select class="form-control" name="titulo" id="titulo" required>
                                        <option value="">Seleccione</option>
                                        <option value="1">Educadora de parvulos</option>
                                        <option value="2">Psicologo(A)</option>
                                        <option value="3">Terapeuta ocupacional</option>
                                        <option value="4">Fonoaudiologo(A)</option>
                                        <option value="5">Profesor(A)</option>
                                        <option value="6">Educador(A) Diferencial</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <select class="form-control" name="sexo" required>
                                        <option value="" selected disabled hidden>Seleccione</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Femenino</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jefe de curso</label>
                                    <select class="form-control" name="jefatura" required>
                                        <option value="" selected disabled hidden>Seleccione</option>
                                        <option value="1">Si</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Coordinador</label>
                                    <select class="form-control" name="coordinador" required>
                                        <option value="" selected disabled hidden>Seleccione</option>
                                        <option value="1">Si</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="btn btn-primary btn-lg btn-block " id="send" name="submit" type="submit">Registrar
                                        Profesional
                                    </button></div>
                                <div class="col-lg-6"></div>
                                <div class="col-lg-6">
                                    <input type="button" class="btn btn-lg btn-block btn-danger" value="Limpiar campos"
                                        onclick="Limpiar();" />
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/cierre-interfaz.php'); ?>
<script type="text/javascript">
    function Limpiar() {
    var t = document.getElementById("limpiar").getElementsByTagName("input");
    for (var i=0; i<t.length; i++) {
        t[i].value = "";
        }
    }
</script>

<script>





$(document).ready(function() {
    $('#send').click(function(){
        if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
            alert('El correo electrónico introducido no es correcto.');
            return false;
        }

        
    });
});

$('#titulo').change(function() {
    if($('#titulo').val()=='5'){
        $('#asignatura1').removeClass('hidden');
        $('#asignatura1').attr('name','asignatura');

        $('#asignatura3').addClass('hidden');
        $('#asignatura2').addClass('hidden');
        $('#asignatura2').attr('name','noname');
    }
    else{
        $('#asignatura2').removeClass('hidden');
        $('#asignatura2').attr('name','asignatura');

        $('#asignatura3').addClass('hidden');
        $('#asignatura1').addClass('hidden');
        $('#asignatura1').attr('name','noname');
    }

    if($('#titulo').val()==''){
        $('#asignatura1').addClass('hidden');
        $('#asignatura3').removeClass('hidden');
        $('#asignatura2').addClass('hidden');
    }
});
</script>