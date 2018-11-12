<?php 

require_once ("../configs/conexion_db.php");

if(isset($_POST['insertar'])){

    $numero = mysqli_escape_string($enlace, $_POST['numero']);

    $selectUno = mysqli_escape_string($enlace, $_POST['nombre1']);
    $selectDos = mysqli_escape_string($enlace, $_POST['nombre2']);
    $selectTres = mysqli_escape_string($enlace, $_POST['nombre3']);
    $selectCuatro = mysqli_escape_string($enlace, $_POST['nombre4']);
    $selectCinco = mysqli_escape_string($enlace, $_POST['nombre5']);
    $bucle_profe = mysqli_escape_string($enlace, $_POST['bucle_profe']);

    $especializadoUno = mysqli_escape_string($enlace, $_POST['profe1']);
    $especializadoDos = mysqli_escape_string($enlace, $_POST['profe2']);
    $especializadoTres = mysqli_escape_string($enlace, $_POST['profe3']);
    $especializadoCuatro = mysqli_escape_string($enlace, $_POST['profe4']);
    $especializadoCinco = mysqli_escape_string($enlace, $_POST['profe5']);
    $bucle_especializado = mysqli_escape_string($enlace, $_POST['bucle_especializado']);



}

// echo ("el valor del select es ".$bucle_profe);
// echo $bucle_especializado;
// echo $bucle_profe;

if($bucle_profe==1 || $bucle_especializado==1){

    $sql = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$especializadoUno."')";

}if($bucle_profe==2 || $bucle_especializado==2){

    $sql = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."'), ('".$numero."','".$especializadoUno."'), ('".$numero."','".$especializadoDos."')";

}if($bucle_profe==3){

    $sql = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."'), ('".$numero."','".$selectTres."')";

}if($bucle_profe==4){

    $sql = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."'), ('".$numero."','".$selectTres."'), ('".$numero."','".$selectCuatro."')";

}if($bucle_profe==5){

    $sql = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."'), ('".$numero."','".$selectTres."'), ('".$numero."','".$selectCuatro."'), ('".$numero."','".$selectCinco."')";

}


if(mysqli_query($enlace, $sql)):
    $_SESSION['mensaje'] = '<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Alumno agregado con exito!</div>';
    header('Location: ../pages/llenar_plantilla_pie.php');
    echo "agregado OK";
    
else:
    echo "Error";
    echo $sql;
endif;



