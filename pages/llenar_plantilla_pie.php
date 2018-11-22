<?php  
include('includes/interfaz.php');
include ('../configs/conexion_db.php');
?>

    <script type="text/javascript" src="../js/seleccionar.js"></script>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Plantilla PIE</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        I EQUIPO DE AULA 1
                    </div>
                    <!-- Plantilla 1 -->

                    <div class="panel-body">
                        <div class="row">
                            <div class="container">
                                <h2>N° Planilla</h2>
                                <input name="numero" disabled class="form-control" style="width: 80px" type="text" id="numero" value=" <?php 
                                    $sql = " SELECT MAX(id) FROM planilla "; $resultado=mysqli_query($enlace, $sql); $dado=mysqli_fetch_array($resultado);
                                print_r($dado['0']); ?> ">
                            </div>
                            <div class="container">
                                <h4>1.- Identificación del Equipo de Aula</h4>
                            </div>

                            <div class="container">
                                <h5><strong>a) Docente(s) de educación regular del curso:</strong></h5>
                                <br>
                            </div>

                            <form id="" role="form" method="POST" action="../modulos/insertarDatosEnPlanilla.php">
                                <div class="form-group">
                                    <input name="numero" type="text" style="width: 80px" class="form-control hidden" value=" <?php 
                                    $sql = " SELECT MAX(id) FROM planilla ";
                                    $resultado = mysqli_query($enlace, $sql);
                                    $dado = mysqli_fetch_array($resultado);

                                    print_r($dado['0']);

                                    ?> ">
                                </div>
                                <select name="bucle_profe" id="bucle_profe" class="hidden">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <div id="input1" class="clonedInput">
                                            <select name="nombre1" id="nombre1" class="form-control">
                                                <option value=""> Seleccione </option>
                                                <?php

                                                $sql = "SELECT * FROM profesionals where titulo_profesional='PROFESOR(A)' ORDER BY id";
                                                $resultado = mysqli_query($enlace, $sql);
                                                while ($dado = mysqli_fetch_array($resultado)):
                                                    $id = $dado['id'];
                                                    $nombre = $dado['nombres'];
                                                    $titulo = $dado['titulo_profesional'];

                                                ?>
                                                <option value="<?php echo $id; ?>">
                                                    <?php echo $nombre." - ".$titulo; ?>
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
                                                    $titulo = $dado['titulo_profesional'];
                                                ?>
                                                <option value="<?php echo $id; ?>">
                                                    <?php echo $nombre." - ".$titulo; ?>
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
                                                    $titulo = $dado['titulo_profesional'];

                                                ?>
                                                <option value="<?php echo $id; ?>">
                                                    <?php echo $nombre." - ".$titulo; ?>
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

                                </div>
                                <hr>
                                <div class="container-fluid">
                                    <div class="container">
                                        <h5><strong>d) Alumnos :</strong></h5>
                                        <br>
                                    </div>
                                    <select name="bucle_alumno" id="bucle_alumno" class="hidden">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="">Nombre</label>
                                            <div class="clonar2" id="divAl1">
                                                <select name="alumno1" id="alumno1" class="form-control">
                                                    <option value=""> Seleccione </option>
                                                        <?php

                                                            $sql = "SELECT * FROM alumnos  ORDER BY id";
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
                                    <input type="button" id="addear" name="addear" value="+" class="btn btn-lg btn-primary" />
                                    <input type="button" id="emptyar" value="-" class="btn btn-lg btn-danger" />
                                    </div>

                                </div>
                                <div class="container-fluid">
                                    <div class="container">
                                        <h5><strong>e) Coordinación del Programa:</strong></h5>
                                        <br>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>En el establecimiento</label>
                                        </div>
                                        <div class="form-group">
                                            <label>En el Daem (Si el PIE es comunal)</label>
                                        </div>
                                        <div class="form-group">
                                            <label>Con Redes de Apoyo</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="insertar" id="insertar" value="Insertar a planilla" class="btn btn-lg btn-danger" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <select name="cordinador1" id="nombre1" class="form-control">
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
                                        <div class="form-group">
                                            <select name="cordinador2" id="nombre1" class="form-control">
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
                                        <div class="form-group">
                                            <select name="cordinador3" id="nombre1" class="form-control">
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
                           
                            

                            <?php include('includes/cierre-interfaz.php'); ?>

                                