<?php
require_once ("../configs/conexion_db.php");

if(isset($_POST['submit'])):
    $nombres = $_POST["nombres"];
	$apellidos =$_POST["apellidos"];
	$rut = $_POST["rut"];
	$ciudad =$_POST["ciudad"];
	$direccion = $_POST["direccion"];
	$telefono =$_POST["telefono"];
	$correo = $_POST["correo"];
	$fecha_nac =$_POST["fecha_nac"];
	$titulo = $_POST["titulo"];
	$sexo =$_POST["sexo"];
    $jefatura =$_POST["jefatura"];
    $id =$_POST["id"];
    

endif;

    $sql = "UPDATE profesionals SET nombres = '$nombres', apellidos = '$apellidos', rut = '$rut', 
    ciudad = '$ciudad', direccion = '$direccion', fecha_nacimiento = '$fecha_nac', telefono = '$telefono', 
    sexo = '$sexo', titulo_profesional = '$titulo', correo = '$correo', jefatura_curso = '$jefatura' WHERE id = '$id'";



    if(mysqli_query($enlace, $sql)):
        header('Location: ../pages/listaProfesionals.php?successo');
        
    else:
        header('Location: ../pages/listaProfesionals.php?error');
    endif;

