<?php include ("../configs/conexion_db.php"); ?>

<?php
include('includes/interfaz.php');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista de establecimientos</h1>
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
                                <th scope="col">RBD</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Entidad</th>
                                <th scope="col">Nivel educacional</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                    $sql = "SELECT * FROM establecimientos";
                                    $resultado = mysqli_query($enlace, $sql);
                                    while ($dado = mysqli_fetch_array($resultado)):
                                    ?>
                            <tr>
                                <td>
                                    <?php echo $dado['rbd'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['nombre'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['ciudad'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['direccion'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['telefono'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['entidad'] ?>
                                </td>
                                <td>
                                    <?php echo $dado['nivel_educacional'] ?>
                                </td>
                                <td>
                                    <a href="" type="submit" name="btn-ver" class="btn btn-xs btn-info">Ver</a>
                                    <a href="editar_establecimiento.php?id=<?php echo $dado['id'] ?>" class="btn btn-xs btn-warning">Editar</a>
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