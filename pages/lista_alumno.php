<?php include ("../configs/conexion_db.php"); ?>

<?php
include('includes/interfaz.php');
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Numero Matricula</th>
                                <th scope="col">Rut</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Opciones</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                    $sql = "SELECT * FROM alumnos";
                                    $resultado = mysqli_query($enlace, $sql);
                                    while ($dado = mysqli_fetch_array($resultado)):
                                    ?>
                            <tr>
                                <td>
                                    <?php echo $dado['id'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['num_matricula'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['rut'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['nombres'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['apellidos'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['curso'] ?>
                                </td>
                                <td>
                                    <a href="ver_alumno.php?id=<?php echo $dado['id'] ?>" class="btn btn-xs btn-info">Ver</a>
                                    <a href="editar_alumno.php?id=<?php echo $dado['id'] ?>" class="btn btn-xs btn-warning">Editar</a>
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

<?php include('includes/cierre-interfaz.php'); ?>