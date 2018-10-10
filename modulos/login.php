<?php
require '../configs/conexion_db.php';


$usuario = $_POST["usuario"];
$password =$_POST["password"];

//SE GUARDA CONSULTA SELECT EN UNA VARIABLE
$sql_sel = "SELECT * FROM usuarios WHERE usu_nombre='".$usuario."' and usu_password= '".$password."'        "; 
// SE EJECUTA LA CONSULTA Y SE GUARDA EN UNA VARIABLE EL RESULTADO
$respuesta=mysqli_query($success,$sql_sel);
//CUENTA EL NUMERO DE FILAS QUE RETORNO LA CONSULTA
$num = mysqli_num_rows($respuesta);

if($num > 0){
	//SE CREA LA SESION CON LA ID DEL USUARIO
	$row=mysql_fetch_array($respuesta);
	$_SESSION['s_id']=$row['id'];
	//SE REDIRECCIONA AL SISTEMA
	header("Location:../main.php");
}
else{
	echo "login incorrecto";
}


?>