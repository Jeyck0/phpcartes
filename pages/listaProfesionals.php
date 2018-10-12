<?php include('includes/interfaz.php');?>
<?php include("../configs/conexion_db.php"); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista de profesionales</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Vista de datos
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Tipo de profesional</th>
                                <th scope="col">Jefe de curso</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                    $sql = "SELECT * FROM profesionals";
                                    $resultado = mysqli_query($enlace, $sql);
                                    while ($dado = mysqli_fetch_array($resultado)):
                                    ?>
                            <tr>
                                <td>
                                    <?php echo $dado['nombres'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['apellidos'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['telefono'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['correo'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['titulo_profesional'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['jefatura_curso'] ?>
                                </td>
                                <td>
                                    <a href="" type="submit" name="btn-ver" class="btn btn-xs btn-info">Ver</a>
                                    <a href="" class="btn btn-xs btn-warning">Editar</a>
                                    <a href="" class="btn btn-xs btn-danger">Eliminar</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






<?php include('includes/cierre-interfaz.php');?>