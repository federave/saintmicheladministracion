
<html lang="es">


    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../general.css">
        <link rel="stylesheet" href="palabraclave.css">

        <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
        <script src="palabraclave.js"></script>

    </head>

    <body>
      <br>
      <br>
      <div style="padding:40px;margin-bottom:25px" class="text-center ">
        <h1 class="titulo" style="font-family:Helvetica;color: white;"> Saint Michel </h1>
      </div>

      <div class="login">
        <div class="login-header">
          <h1>Ingresar Palabra Clave</h1>
        </div>
        <div class="login-form">
          <form class="" action="../../controladores/palabraclave/ingresar.php" method="post">
            <h3>Palabra Clave:</h3>
            <input id="palabraclave" name="palabraclave" type="text" placeholder="Palabra Clave"/><br>
            <br>
            <input type="submit" value="Ingresar" class="login-button "/>
            <br>
          </form>
        </div>
      </div>



    </body>

</html>
