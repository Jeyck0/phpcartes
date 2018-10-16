<?php
require ('../configs/conexion_db.php');
if(isset($_POST["submit"])){

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
	
	}

	$sql = ("insert into profesionals 
	(nombres,apellidos,rut,ciudad,direccion,telefono,correo,fecha_nacimiento,titulo_profesional,sexo,jefatura_curso)
	VALUES('".$nombres."','".$apellidos."','".$rut."','".$ciudad."','".$direccion."','".$telefono."','".$correo."','".$fecha_nac."','".$titulo."','".$sexo."','".$jefatura."')");

	if(mysqli_query($enlace, $sql)){
		header('Location: ../pages/listaProfesionals.php?success'); 
		echo 'correcto =)';
		echo $sql;
	}
        

    else{
		/**header('Location: ../tablaAlumno.php?error'); */
		echo 'caca';
		echo $sql;
	}
        
   

 ?>   