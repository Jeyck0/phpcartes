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
            <h1 class="page-header">Editar Planilla</h1>
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
                        <div class="container">
                            <h2>N° Planilla</h2>
                            <input name="numero" disabled class="form-control" style="width: 80px" type="text" id="numero"
                                value=" <?php print_r($id_planilla)?>">
                        </div>
                        <div class="container">
                            <h4>1.- Identificación del Equipo de Aula</h4>
                        </div>

                        <div class="container">
                            <h5><strong>a) Docente(s) de educación regular del curso:</strong></h5>
                            <br>
                        </div>

                        <form id="" role="form" method="POST" action="../modulos/insertarDatosEnPlanilla.php">

                            <select name="bucle_profe" id="bucle_profe" class="hidden">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <!-- <option value=""> Seleccione </option> -->
                                    <?php

                                        $sql = "SELECT nombres, titulo_profesional, id_profesional FROM usuarios_planilla u, planilla pl, profesionals p WHERE u.id_planilla=pl.id AND u.id_profesional=p.id AND titulo_profesional='PROFESOR(A)' AND id_planilla = $id_planilla";
                                        $resultado = mysqli_query($enlace, $sql);
                                        while ($dado = mysqli_fetch_array($resultado)):
                                            $nombre = $dado['nombres'];
                                    ?>
                                    <div id="input1" class="clonedInput">

                                        <select name="nombre1" id="nombre1" class="form-control">

                                            <option value="<?php echo $id_planilla; ?>">
                                                <?php echo $nombre; ?>
                                            </option>
                                            
                                        </select>
                                    </div>
                                    <br>


                                    <?php
                                        endwhile;
                                    ?>

                                    <br>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <input type="button" id="btnAdd" name="btnAdd" value="+" class="btn btn-lg btn-primary" />
                                <input type="button" id="btnDel" value="-" class="btn btn-lg btn-danger" />
                            </div>

                            <hr>
                            <div class="container-fluid">
                                <div class="container">
                                    <h5><strong>b) Profesores especializados:</strong></h5>
                                    <br>
                                </div>
                                <select name="bucle_profe_especializado" id="bucle_profe_especializado" class="hidden">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <div id="divs1" class="clon">
                                            <select name="profe1" id="profe1" class="form-control">
                                                <option value=""> Seleccione </option>
                                                <?php

                                                $sql = "SELECT * FROM profesionals WHERE titulo_profesional='EDUCADORA DE PARBULO' OR titulo_profesional='EDUCADOR(A) DIFERENCIAL' ORDER BY id";
                                                $resultado = mysqli_query($enlace, $sql);
                                                while ($dado = mysqli_fetch_array($resultado)):
                                                    $id = $dado['id'];
                                                    $nombre = $dado['nombres'];
                                                ?>
                                                <option value="<?php echo $id; ?>">
                                                    <?php echo $nombre; ?>
                                                </option>
                                                <?php
                                                endwhile;
                                            ?>
                                            </select>
                                            <br>
                                        </div>
                                    </div>
                                </div>

                                <div class="container-fluid">
                                    <input type="button" id="boton" value="+" class="btn btn-lg btn-primary" />
                                    <input type="button" id="borrar" value="-" class="btn btn-lg btn-danger" />
                                </div>
                            </div>
                            <hr>
                            <div class="container-fluid">
                                <div class="container">
                                    <h5><strong>c) Profesionales especializados asistentes de la educación:</strong></h5>
                                    <br>
                                </div>
                                <select name="bucle_profe_asistente" id="bucle_profe_asistente" class="hidden">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <div id="div1" class="clonar">
                                            <select name="docente1" id="docente1" class="form-control">
                                                <option value=""> Seleccione </option>
                                                <?php

                                                $sql = "SELECT * FROM profesionals WHERE titulo_profesional='TERAPEUTA OCUPACIONAL' OR titulo_profesional='PSICOLOGO(A)' OR titulo_profesional='FONOAUDIOLOGO(A)' ORDER BY id";
                                                $resultado = mysqli_query($enlace, $sql);
                                                while ($dado = mysqli_fetch_array($resultado)):
                                                    $id = $dado['id'];
                                                    $nombre = $dado['nombres'];
                                                ?>
                                                <option value="<?php echo $id; ?>">
                                                    <?php echo $nombre; ?>
                                                </option>
                                                <?php
                                                endwhile;
                                            ?>
                                            </select>
                                            <br>
                                        </div>
                                    </div>
                                </div>

                                <div class="container-fluid">
                                    <input type="button" id="agregar" value="+" class="btn btn-lg btn-primary" />
                                    <input type="button" id="eliminar" value="-" class="btn btn-lg btn-danger" />
                                </div>
                                <input type="submit" name="insertar" id="insertar" value="Insertar a planilla" class="btn btn-lg btn-danger" />
                        </form>

                    </div>
                    <hr>
                    <div class="container-fluid">
                        <div class="container">
                            <h5><strong>d) Coordinación del Programa:</strong></h5>
                            <br>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Seleccione el lugar</label>
                                <select class="form-control" required name="lugar">
                                    <option value="1">En el establecimiento</option>
                                    <option value="2">En el DAEM (si el PIE es comunal)</option>
                                    <option value="3">Con redes de apoyo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <select name="nombre1" id="nombre1" class="form-control">
                                    <option value=""> Seleccione </option>
                                    <?php

                                                $sql = "SELECT * FROM profesionals where coordinador='si' ORDER BY id";
                                                $resultado = mysqli_query($enlace, $sql);
                                                while ($dado = mysqli_fetch_array($resultado)):
                                                    $id = $dado['id'];
                                                    $nombre = $dado['nombres'];
                                                ?>
                                    <option value="<?php echo $id; ?>">
                                        <?php echo $nombre; ?>
                                    </option>
                                    <?php
                                                endwhile;
                                            ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <button class="btn btn-primary btn-lg btn-block " name="submit" type="submit">Registrar
                                    Establecimiento</button>
                            </div>
                            <div class="col-lg-6">
                                <input type="button" class="btn btn-lg btn-block btn-danger" value="Limpiar campos"
                                    onclick="Limpiar();" />
                            </div>
                        </div>
                        <div class="col-lg-6"></div>
                    </div>
                </div>

                </form>
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