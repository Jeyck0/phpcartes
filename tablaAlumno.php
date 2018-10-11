<?php include ("configs/conexion_db.php"); ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <h1>Lista de Alumnos</h1>
        <a href="agregaAlumno.php" class="btn btn-sm btn-success mb-2">Nuevo Almuno</a>
        <table class="table">
            <thead>
                <tr class="text-center">
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
                <tr class="text-center">
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
                        <a href="" class="btn btn-xs btn-info">Ver</a>
                        <a href="" class="btn btn-xs btn-warning">Editar</a>
                        <a href="" class="btn btn-xs btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>