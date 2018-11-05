<?php 

require_once ("../configs/conexion_db.php");

if(isset($_POST['insertar'])):

    $selectUno = mysqli_escape_string($enlace, $_POST['nombre1']);
    $selectDos = mysqli_escape_string($enlace, $_POST['nombre2']);
    // $selectTres = mysqli_escape_string($enlace, $_POST['nombre3']);
    // $selectCuatro = mysqli_escape_string($enlace, $_POST['nombre4']);
    // $selectCinco = mysqli_escape_string($enlace, $_POST['nombre5']);

    $id = 3;


// echo $selectUno;
// echo $selectDos;
// echo $selectTres;
// echo $selectCuatro;
// echo $selectCinco;
endif;

$sql = "INSERT INTO datos_planilla (nombre1, nombre2) VALUES ('".$selectUno."', '".$selectDos."') WHERE id = '$id'";

echo $select;


