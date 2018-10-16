<?php
include('includes/interfaz.php');
?>

<div id="page-wrapper" >
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
                        <form role="form" method="POST" action="../modulos/agregar_profesional.php">
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
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Teléfono</label>
                                    <input name="telefono" type="text" class="form-control">
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Correo</label>
                                    <input name="correo" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha de nacimiento</label>
                                    <div class="input-group date" data-date-format="dd.mm.yyyy">
                                            <input name="fecha"  type="text" class="form-control" placeholder="dd.mm.yyyy">
                                        <div class="input-group-addon" >
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tipo de profesional</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jefe de curso</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>                                                                    
                            </div>                                              
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><button class="btn btn-primary btn-lg btn-block " name="submit" type ="submit" >Registrar Alumno</button></div>
                            <div class="col-lg-6"></div>
                        </div>
                </form> 
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/cierre-interfaz.php'); ?>