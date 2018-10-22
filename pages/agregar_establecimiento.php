<?php
include('includes/interfaz.php');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Agregar Establecimiento</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ingreso de datos
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form id="limpiar" role="form" method="POST" action="../modulos/agregar_establecimiento.php">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">RBD</label>
                                    <input name="rbd" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input name="nombre" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Ciudad</label>
                                    <input name="ciudad" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Dirección</label>
                                    <input name="direccion" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Teléfono</label>
                                    <input name="telefono" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Entidad</label>
                                    <input name="entidad" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nivel educacional</label>
                                    <select class="form-control" required name="nivel">
                                        <option value="1">Básica</option>
                                        <option value="2">Media</option>
                                        <option value="3">Básica y media</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="btn btn-primary btn-lg btn-block " name="submit" type="submit">Registrar
                                        Establecimiento</button>
                                </div>
                                <div class="col-lg-6">
                                    <input type="button" class="btn btn-lg btn-block btn-danger" value="Limpiar campos"
                                        onclick="Limpiar();" />
                                </div>
                            </div>
                            <div class="col-lg-6"></div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function Limpiar() {
        var t = document.getElementById("limpiar").getElementsByTagName("input");
        for (var i = 0; i < t.length; i++) {
            t[i].value = "";
        }
    }
</script>

<?php include('includes/cierre-interfaz.php'); ?>