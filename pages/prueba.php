<?php
include ("../configs/conexion_db.php");
include ('includes/interfaz.php');


if(isset($_GET['id'])): 
    $id_planilla = mysqli_escape_string($enlace, $_GET['id']);
    $sql = "SELECT * FROM usuarios_planilla WHERE id_planilla = '$id_planilla'";
    $resultado = mysqli_query($enlace, $sql);
    $dado = mysqli_fetch_array($resultado);
endif; 

?>

<div id="page-wrapper">
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
                        <form id="formularioDocentes" role="form" action="../modulos/editar_planilla_eliminar.php"
                            method="POST">
                            <div class="form-group">
                                <input name="numero" type="text" style="width: 80px" class="form-control hidden" value=" <?php print_r($id_planilla) ?> ">
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="cantidadDocentes" id="cantidadDocentes" class="hidden">
                                    <label for="">a) Docente(s) de educación regular del curso:</label>

                                    <br>
                                    <?php
                                        $num = 0;
                                        $sql = "SELECT nombres, titulo_profesional, id_profesional FROM usuarios_planilla u, planilla pl, profesionals p WHERE u.id_planilla=pl.id AND u.id_profesional=p.id AND titulo_profesional='PROFESOR(A)' AND id_planilla = $id_planilla";
                                        $resultado = mysqli_query($enlace, $sql);
                                        while ($dado = mysqli_fetch_array($resultado)):
                                            $nombre = $dado['nombres'];
                                            $num ++;
                                    ?>
                                    <div id="row<?php echo $num?>" class="row">
                                        <div id="inputTres<?php echo $num?>" class="col-md-12 cantidadDocentes">
                                            <select name="nombre<?php echo $num ?>" id="nombre<?php echo $num ?>" class="form-control">

                                                <option value="<?php echo $dado['id_profesional'] ?>">
                                                    <?php echo $nombre; ?>
                                                </option>
                                                <?php

                                                $sql2 = "SELECT * FROM profesionals where titulo_profesional='PROFESOR(A)' ORDER BY id";
                                                $resultado2 = mysqli_query($enlace, $sql2);
                                                while ($dado2 = mysqli_fetch_array($resultado2)):
                                                    $id2 = $dado2['id'];
                                                    $nombre2 = $dado2['nombres'];
                                                ?>
                                                <option value="<?php echo $id2;?>">
                                                    <?php echo $nombre2; ?>
                                                </option>
                                                <?php
                                                endwhile;
                                            ?>

                                            </select>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input class="hidden" type="" name="numeroUno<?php echo $num;?>"
                                                        value="<?php print_r($id_planilla) ?>">
                                                    <input class="hidden" type="" name="idUno<?php echo $num;?>" value="<?php echo $dado['id_profesional'] ?>">
                                                    <button type="submit" name="btn-delete<?php echo $num;?>" class="btn btn-danger">Eliminar</button>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <?php
                                        endwhile;
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="hidden" type="" name="numero<?php echo $num;?>" value="<?php print_r($id_planilla) ?>">
                                            <button type="submit" id="btn-update" name="btn-update" class="btn btn-lg btn-success btn-block">Actualizar
                                                Docentes existentes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="" id="" class="hidden">
                                    <p><strong>*Agregar nuevo docente</strong></p>
                                    <div id="" class="row">
                                        <div id="" class="col-md-12">
                                            <select  name="nuevoDocente" id="nuevoDocente" class="form-control" required>
                                                <option>Seleccionar</option>
                                                <?php

                                            $sql2 = "SELECT * FROM profesionals where titulo_profesional='PROFESOR(A)' ORDER BY id";
                                            $resultado2 = mysqli_query($enlace, $sql2);
                                            while ($dado2 = mysqli_fetch_array($resultado2)):
                                                $id2 = $dado2['id'];
                                                $nombre2 = $dado2['nombres'];
                                            ?>
                                                <option value="<?php echo $id2;?>">
                                                    <?php echo $nombre2; ?>
                                                </option>
                                                <?php
                                            endwhile;
                                        ?>

                                            </select>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input class="hidden" type="" name="" value="<?php print_r($id_planilla) ?>">
                                                    <input class="hidden" type="" name="" value="<?php echo $dado['id_profesional'] ?>">
                                                    <button type="submit" name="agregar" id="agregar" class="btn btn-primary">Agregar</button>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/cierre-interfaz.php'); ?>

<script>
    $(document).ready(function () {
        var valor_sexo = $("#valor-sexo").text();
        var select_sexo = $("#select-sexo");
        if (valor_sexo == "MASCULINO") {
            select_sexo.val("1").attr("selected");
        } else {
            select_sexo.val("2").attr("selected");
        }

    });
</script>
<script>
    $('#btn-update').click(function () {
        $('#formularioDocentes').attr('action', '../modulos/editar_planilla_actualizar.php');
    });
</script>
<script>
    $('#agregar').click(function () {
        $('#formularioDocentes').attr('action', '../modulos/editar_planilla_agregar.php');
    });
</script>