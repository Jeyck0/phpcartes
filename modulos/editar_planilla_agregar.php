<?php
require_once ("../configs/conexion_db.php");

if(isset($_POST['agregar'])):


    //select profesores
    $docente = mysqli_escape_string($enlace, $_POST['nuevoDocente']);

    $numero = mysqli_escape_string($enlace, $_POST['numero']);

endif;

// echo $docente;
// echo $numero;

    $sql = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$docente."')";



    if(mysqli_query($enlace, $sql)):
        header('Location: ../pages/prueba.php?id='.$numero);
        echo 'ok';
    else:
        // header('Location: ../pages/lista_plantillas_pie.php?error');
        echo 'error';
    endif;

