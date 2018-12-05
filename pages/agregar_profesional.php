<?php
include('includes/interfaz.php');
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
                                    <input name="asignatura" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Correo</label>
                                    <input name="correo" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha nacimiento</label>
                                    <input name="fecha_nac" type="date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tipo de profesional</label>
                                    <select class="form-control" name="titulo" required>
                                        <option value="" selected disabled hidden>Seleccione</option>
                                        <option value="1">Educadora de parbulo</option>
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
                                    <button class="btn btn-primary btn-lg btn-block " name="submit" type="submit">Registrar
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

<script type="text/javascript">
    function Limpiar() {
    var t = document.getElementById("limpiar").getElementsByTagName("input");
    for (var i=0; i<t.length; i++) {
        t[i].value = "";
        }
    }
</script>

<?php include('includes/cierre-interfaz.php'); ?>