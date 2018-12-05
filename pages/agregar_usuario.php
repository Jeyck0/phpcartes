<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Inicio</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/signin.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css">


  </head>

  <body class="text-center">
    <form class="form-signin"  method="post" action="../modulos/agregar_usuario.php.php">

      <h1 class="h3 mb-3 font-weight-normal">Crear Usuario</h1>
      <div class="form-group">
        <label for="inputEmail" class="sr-only">Usuario</label>
        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required autofocus> 
      </div>
      <div class="form-group">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" placeholder="Contraseña" name="password" required>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" placeholder="Contraseña" name="password2" required>
      </div>
      
      
      
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="1" name="chk_admin"> administrador
        </label>
        
      </div>
      <p style="color : red;" hidden>Usuario o password incorrectos!</p>
      <div><button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Iniciar Sesion</button></div>
     	<p class="mt-3"><a href="agregar_usuario.php">Crear Usuario</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>
