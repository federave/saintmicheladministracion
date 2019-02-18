<?php
session_start();
if(isset($_SESSION["raiz"]))
  {
  include_once($_SESSION["raiz"] . '/modelo/acceso.php');
  if(isset($_SESSION["palabraclave"]))
    {
    if(!verificarPalabraClave($_SESSION["palabraclave"]))
      redirect('../../vistas/errores/errordeacceso.php');
    }
  else
    {
    redirect('../../vistas/errores/errordeacceso.php');
    }
  }
else
  {
  include_once('../../modelo/otros.php');
  redirect('../../vistas/errores/errordeacceso.php');
  }

$errorlogin="";
if(isset($_SESSION["errorlogin"]))
  $errorlogin=$_SESSION["errorlogin"];

?>


<html lang="es">


    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../estilos/general.css">
        <link rel="stylesheet" href="login.css">

        <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
        <script src="login.js"></script>
        <script src="../javascript/javascript.js"></script>
        <!-- Para las alertas  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!--        -->

    </head>

    <body>
      <br>
      <br>
      <div style="padding:40px;margin-bottom:25px" class="text-center ">
        <h1 class="titulo" style="font-family:Helvetica;color: white;"> Saint Michel </h1>
      </div>


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
            <div id="alertaerrorlogin">
            <?php if($errorlogin!="") echo "<script>insertarAlerta('alertaerrorlogin','$errorlogin','danger');</script>"; ?>
            </div>
            <input type="submit" value="Ingresar" class="login-button "/>
            <br>

          </form>
        </div>
      </div>



    </body>

</html>
