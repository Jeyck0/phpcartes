<?php
require_once ("../configs/conexion_db.php");

if(isset($_POST['btn-crear'])):
    $matricula = mysqli_escape_string($enlace, $_POST['matricula']);
    $rut = mysqli_escape_string($enlace, $_POST['rut']);
    $nombres = mysqli_escape_string($enlace, $_POST['nombres']);
    $apellidos = mysqli_escape_string($enlace, $_POST['apellidos']);
    $nacimiento = mysqli_escape_string($enlace, $_POST['nacimiento']);
    $ciudad = mysqli_escape_string($enlace, $_POST['ciudad']);
    $direccion = mysqli_escape_string($enlace, $_POST['direccion']);
    $telefono = mysqli_escape_string($enlace, $_POST['telefono']);
    $sexo = mysqli_escape_string($enlace, $_POST['sexo']);
    $curso = mysqli_escape_string($enlace, $_POST['curso']);

endif;

    $sql = "INSERT INTO alumnos (nombres, apellidos, rut, ciudad, direccion, fecha_nacimiento, telefono, sexo, num_matricula, curso) 
    VALUES ('".$nombres."', '".$apellidos."', '".$rut."', '".$ciudad."', '".$direccion."', '".$nacimiento."', '".$telefono."', '".$sexo."', '".$matricula."', '".$curso."' )";



    if(mysqli_query($enlace, $sql)):
        header('Location: ../pages/agregar_alumno.php?successo');
        
    else:
        header('Location: ../pages/agregar_alumno.php?error');
    endif;

