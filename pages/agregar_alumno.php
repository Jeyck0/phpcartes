<?php
include('includes/interfaz.php');
?>
<script src="../js/validar_alumno.js"></script>
<script src="../js/validarut.js"></script>

<div id="page-wrapper" >
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Agregar Alumno</h1>
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
                        <form role="form" method="POST" action="../modulos/agregar_alumno.php" onsubmit="return validar();">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Numero de Matricula</label>
                                    <input id="matricula" name="matricula" type="number" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="">Rut</label>
                                    <input id="rut" name="rut" type="text" class="form-control" oninput="checkRut(this)">
                                </div>
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input id="nombres" name="nombres" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Apellidos</label>
                                    <input id="apellidos" name="apellidos" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha nacimiento</label>
                                    <input id="nacimiento" name="nacimiento" type="date" class="form-control">
                                </div>
                                
                                
                                                               
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Ciudad</label>
                                    <input id="ciudad" name="ciudad" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Dirección</label>
                                    <input id="direccion" name="direccion" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Teléfono</label>
                                    <input id="telefono" name="telefono" type="text" class="form-control">
                                </div> 
                                <div class="form-group">
                                    <label>Genero</label>
                                    <select id="sexo" name="sexo" class="form-control">
                                        <option selected>Seleccionar...</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Femenino</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Curso</label>
                                    <input id="curso" name="curso" type="text" class="form-control">
                                </div>                                                 
                            </div>                                              
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><button class="btn btn-primary btn-lg btn-block " name="btn-crear" type ="submit" >Registrar Alumno</button></div>
                            <div class="col-lg-6"></div>
                        </div>
                </form> 
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/cierre-interfaz.php'); ?>