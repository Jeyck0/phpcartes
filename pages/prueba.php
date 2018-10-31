<?php require '../configs/conexion_db.php' ;

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
                    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title></title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

    <script src="../js/agregar_eliminar.js"></script>
    <script type="text/javascript" src="../js/seleccionar.js"></script>


</head>
 
<body>
 
<div class="form-group">
    <label for="">Nombre</label>
    <select name="select_profesional" id="select_profesional" class="form-control" onchange="select_profesional();">
    <option value=""> Seleccione </option>
    <?php

        $sql = "SELECT * FROM profesionals ORDER BY id";
        $resultado = mysqli_query($enlace, $sql);
        while ($dado = mysqli_fetch_array($resultado)):
            $id = $dado['id'];
            $nombre = $dado['nombres'];
        ?>
            <option value="<?php echo $id; ?>"><?php echo $nombre; ?></option>
        <?php
        endwhile;
    ?>
    </select>
</div>

<div id="panel_profesional">
        <input type="text" name="" id="" value="<?php echo $rut; ?>">
        <input type="text" name="" id="" value="<?php echo $telefono; ?>">

</div>
 
</body>
</html>