
<html lang="es">


    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../general.css">
        <link rel="stylesheet" href="login.css">

        <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
        <script src="login.js"></script>

    </head>

    <body>


      <?php require '../header/header.php' ?>


      <div class="login">
        <div class="login-header">
          <h1>Ingresar Usuario</h1>
        </div>
        <div class="login-form">
          <form class="" action="../../controladores/login/ingresar.php" method="post">
            <h3>Usuario:</h3>
            <input id="usuario" name="usuario" type="text" placeholder="Usuario"/><br>
            <h3>Contraseña:</h3>
            <input id="password" name="password" type="password" placeholder="Contraseña"/>
            <br>
            <input type="submit" value="Ingresar" class="login-button "/>
            <br>
          </form>
        </div>
      </div>



    </body>

</html>
