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
                            <h4>1.- Identificación del Equipo de Aula</h4>
                        </div>
                        <div class="container-fluid">
                            <div class="container">
                                <h5><strong>a) Docente(s) de educación regular del curso:</strong></h5>
                                <br>
                            </div>

                            <form id="" role="form" method="POST" action="../modulos/insertarDatosEnPlanilla.php">
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
                                    <input type="button" id="btnAdd" value="+" class="btn btn-lg btn-primary" />
                                    <input type="button" id="btnDel" value="-" class="btn btn-lg btn-danger" />
                                </div>

                                <input type="submit" id="insertar" name="insertar" value="Insertar en planilla" class="btn btn-lg btn-danger" />

                            </form>
                        </div>
                        <hr>
                        <div class="container-fluid">
                            <div class="container">
                                <h5><strong>b) Profesores especializados:</strong></h5>
                                <br>
                            </div>
                            <form id="" role="form" method="POST" action="../modulos/agregar_establecimiento.php">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <div id="divs1" class="clon">
                                            <select name="profe1" id="profe1" class="form-control">
                                                <option value=""> Seleccione </option>
                                                <?php

                                                $sql = "SELECT * FROM profesionals WHERE titulo_profesional='EDUCADORA DE PARVULO' OR titulo_profesional='EDUCADORA DIFERENCIAL' ORDER BY id";
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
                            </form>
                        </div>
                        <hr>
                        <div class="container-fluid">
                            <div class="container">
                                <h5><strong>c) Profesionales especializados asistentes de la educación:</strong></h5>
                                <br>
                            </div>

                            <form id="" role="form" method="POST" action="../modulos/agregar_establecimiento.php">
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
                                    <input name="nombre" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Teléfono</label>
                                    <input name="teléfono" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Correo</label>
                                    <input name="correo" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Firma</label>
                                    <input name="firma" type="text" class="form-control" required>
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

                <hr style="border-width: 5px;">

                <!-- Plantilla 2 -->
                <div class="panel-body">
                    <div class="row">
                        <div class="container">
                            <h4>2.- Reuniones de Coordinación del Equipo de Aula 2</h4>
                        </div>
                        <div class="container-fluid">
                            <div class="container">
                                <h5>Calendarización de Reuniones de coordinación:</h5>
                                <h5><strong>Primer Semestre</strong></h5>
                                <br>
                            </div>
                            <form id="" role="form" method="POST" action="../modulos/agregar_establecimiento.php">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <tbody>
                                                    <tr>
                                                        <th class="text-center" colspan="1"></th>
                                                        <th class="text-center" colspan="2">Marzo</th>
                                                        <th class="text-center" colspan="2">Abril</th>
                                                        <th class="text-center" colspan="2">Mayo</th>
                                                        <th class="text-center">Opciones</th>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Fecha</td>
                                                        <td>Hora</td>
                                                        <td>Fecha</td>
                                                        <td>Hora</td>
                                                        <td>Fecha</td>
                                                        <td>Hora</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lunes</td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <a href="" name="btn-guardar" class="btn btn-xs btn-success">Guardar</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Martes</td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <a href="" name="btn-guardar" class="btn btn-xs btn-success">Guardar</a>
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td>Miercoles</td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <a href="" name="btn-guardar" class="btn btn-xs btn-success">Guardar</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jueves</td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <a href="" name="btn-guardar" class="btn btn-xs btn-success">Guardar</a>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Viernes</td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>

                                                        <td>
                                                            <a href="" name="btn-guardar" class="btn btn-xs btn-success">Guardar</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <tbody>
                                                    <tr>
                                                        <th class="text-center" colspan="1"></th>
                                                        <th class="text-center" colspan="2">Junio</th>
                                                        <th class="text-center" colspan="2">Julio</th>
                                                        <th class="text-center">Opciones</th>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Fecha</td>
                                                        <td>Hora</td>
                                                        <td>Fecha</td>
                                                        <td>Hora</td>
                                                        <td></td>

                                                    </tr>
                                                    <tr>
                                                        <td>Lunes</td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <a href="" name="btn-guardar" class="btn btn-xs btn-success">Guardar</a>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Martes</td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <a href="" name="btn-guardar" class="btn btn-xs btn-success">Guardar</a>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Miercoles</td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <a href="" name="btn-guardar" class="btn btn-xs btn-success">Guardar</a>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Jueves</td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <a href="" name="btn-guardar" class="btn btn-xs btn-success">Guardar</a>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Viernes</td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="date" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="time" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <a href="" name="btn-guardar" class="btn btn-xs btn-success">Guardar</a>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <tbody>
                                                    <tr>
                                                        <th class="text-center" colspan="1">Reunión/Fecha</th>
                                                        <th class="text-center" colspan="1">Asistentes</th>
                                                        <th class="text-center" colspan="1">Acuerdos</th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <select id="select-nivel" class="form-control" name="nivel">
                                                                        <option value="1">Básica</option>
                                                                        <option value="2">Media</option>
                                                                        <option value="3">Básica y Media</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <select id="select-nivel" class="form-control" name="nivel">
                                                                        <option value="1">Básica</option>
                                                                        <option value="2">Media</option>
                                                                        <option value="3">Básica y Media</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>

                                <div class="container-fluid">
                                    <input type="button" id="btnAdd" value="+" class="btn btn-lg btn-primary" />
                                    <input type="button" id="btnDel" value="-" class="btn btn-lg btn-danger" />
                                </div>
                            </form>
                        </div>
                        <hr>
                        <div class="container-fluid">
                            <div class="container">
                                <h5><strong>b) Profesores especializados:</strong></h5>
                                <br>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input name="nombre2" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Especialidad</label>
                                    <input name="especialidad2" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Teléfono</label>
                                    <input name="telefono2" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Correo</label>
                                    <input name="correo2" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Firma</label>
                                    <input name="firma2" type="text" class="form-control" required>
                                </div>
                            </div>

                            </form>
                        </div>
                        <hr>
                        <div class="container-fluid">
                            <div class="container">
                                <h5><strong>c) Profesionales especializados asistentes de la educación:</strong></h5>
                                <br>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input name="nombre" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Especialidad</label>
                                    <input name="especialidad" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Teléfono</label>
                                    <input name="telefono" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Correo</label>
                                    <input name="correo" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Firma</label>
                                    <input name="firma" type="text" class="form-control" required>
                                </div>
                            </div>
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
                                    <input name="nombre" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Teléfono</label>
                                    <input name="teléfono" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Correo</label>
                                    <input name="correo" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Firma</label>
                                    <input name="firma" type="text" class="form-control" required>
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


<script src="../js/agregar_eliminar.js" type="text/javascript"></script>


<?php include('includes/cierre-interfaz.php'); ?>