<?php 

require_once ("../configs/conexion_db.php");

if(isset($_POST['insertar'])){

    //select profesores
    $selectUno = mysqli_escape_string($enlace, $_POST['nombre1']);
    $selectDos = mysqli_escape_string($enlace, $_POST['nombre2']);
    $selectTres = mysqli_escape_string($enlace, $_POST['nombre3']);
    $selectCuatro = mysqli_escape_string($enlace, $_POST['nombre4']);
    $selectCinco = mysqli_escape_string($enlace, $_POST['nombre5']);
    $bucle_profe = mysqli_escape_string($enlace, $_POST['bucle_profe']);

    //select profesores especializados
    $bucle_profe_especializado = mysqli_escape_string($enlace, $_POST['bucle_profe_especializado']);
    $selectEspecializadoUno = mysqli_escape_string($enlace, $_POST['profe1']);
    $selectEspecializadoDos = mysqli_escape_string($enlace, $_POST['profe2']);
    $selectEspecializadoTres = mysqli_escape_string($enlace, $_POST['profe3']);
    $selectEspecializadoCuatro = mysqli_escape_string($enlace, $_POST['profe4']);
    $selectEspecializadoCinco = mysqli_escape_string($enlace, $_POST['profe5']);


    $numero = mysqli_escape_string($enlace, $_POST['numero']);


}

//insert 
if($bucle_profe==1){

    $sql_1 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."')";

}if($bucle_profe==2){

    $sql_1 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."')";

}if($bucle_profe==3){

    $sql_1 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."'), ('".$numero."','".$selectTres."')";

}if($bucle_profe==4){

    $sql_1 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."'), ('".$numero."','".$selectTres."'), ('".$numero."','".$selectCuatro."')";

}if($bucle_profe==5){

    $sql_1 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."'), ('".$numero."','".$selectTres."'), ('".$numero."','".$selectCuatro."'), ('".$numero."','".$selectCinco."')";

}

if($bucle_profe_especializado==1){
    $sql2=$sql_1.", ('".$numero."','".$selectEspecializadoUno."')";

}
if($bucle_profe_especializado==2){
    $sql2=$sql_1.", ('".$numero."','".$selectEspecializadoUno."'), ('".$numero."','".$selectEspecializadoDos."')";

}
if($bucle_profe_especializado==3){
    $sql2=$sql_1.", ('".$numero."','".$selectEspecializadoUno."'), ('".$numero."','".$selectEspecializadoDos."'), ('".$numero."','".$selectEspecializadoTres."')";

}
if($bucle_profe_especializado==4){
    $sql2=$sql_1.", ('".$numero."','".$selectEspecializadoUno."'), ('".$numero."','".$selectEspecializadoDos."'), ('".$numero."','".$selectEspecializadoTres."'), ('".$numero."','".$selectEspecializadoCuatro."')";

}
if($bucle_profe_especializado==5){
    $sql2=$sql_1.", ('".$numero."','".$selectEspecializadoUno."'), ('".$numero."','".$selectEspecializadoDos."'), ('".$numero."','".$selectEspecializadoTres."'), ('".$numero."','".$selectEspecializadoCuatro."'), ('".$numero."','".$selectEspecializadoCinco."')";


}

if(mysqli_query($enlace, $sql2)):
    // $_SESSION['mensaje'] = '<div class="alert alert-success alert-dismissible" role="alert">
    // <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    // Alumno agregado con exito!</div>';
    header('Location: ../pages/llenar_plantilla_pie.php');
    echo "agregado OK";
    
else:
    echo "Error";
    echo $sql2;
endif;


    
    














