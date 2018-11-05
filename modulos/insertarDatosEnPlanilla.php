<?php 

require_once ("../configs/conexion_db.php");

if(isset($_POST['nombre5']) || !empty($_POST['nombre5'])){

    $selectUno = mysqli_escape_string($enlace, $_POST['nombre1']);
    $selectDos = mysqli_escape_string($enlace, $_POST['nombre2']);
    $selectTres = mysqli_escape_string($enlace, $_POST['nombre3']);
    $selectCuatro = mysqli_escape_string($enlace, $_POST['nombre4']);
    $selectCinco = mysqli_escape_string($enlace, $_POST['nombre5']);
}
else {
    echo "hola";
}




$sql = "INSERT INTO datos_plantilla (profesionals_id, profesionals_id_2, profesionals_id_3, profesionals_id_4, profesionals_id_5) VALUES ('".$selectUno."', '".$selectDos."', '".$selectTres."','".$selectCuatro."', '".$selectCinco."')";


if(mysqli_query($enlace, $sql)):
    // $_SESSION['mensaje'] = '<div class="alert alert-success alert-dismissible" role="alert">
    // <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    // Alumno agregado con exito!</div>';
    echo "agregado OK";
    
else:
    echo "Error";
    echo $sql;
endif;



