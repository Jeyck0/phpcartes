<?php
require '../configs/conexion_db.php';

if(isset($_POST["submit"])){

	$usuario = $_POST["usuario"];
    $password =$_POST["password"];
    $password2 =$_POST["password2"];
    $admin =$_POST["chk_admin"];
	
    }
    
    $sql='INSERT INTO users';
    
    if($password == $password2){

    }
	
	if($num > 0){
		//SE CREA LA SESION CON LA ID DEL USUARIO
		$row=mysqli_fetch_array($respuesta);
		$_SESSION['s_id'] = $usuario;
		$_SESSION['tipo'] = $dado['privilegio'];
		//SE REDIRECCIONA AL SISTEMA
		// header("Location:../pages/index.php");
		echo "login correcto";
	}
	else{
		// header("Location:../login.php");
		echo "login incorrecto";
	}
	