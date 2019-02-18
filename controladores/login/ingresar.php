<?php
session_start();


include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');




if(isset($_POST["usuario"]) && isset($_POST["password"]))
{
$usuario = new Usuario($_POST["usuario"],$_POST["password"]);
if($usuario->esValido())
  {
  $_SESSION["usuario"] = $_POST["usuario"];
  $_SESSION["password"] = $_POST["password"];
  $_SESSION["idtipousuario"] = $usuario->getIdTipoUsuario();
  redirect('../../index.php');
  }
else
  {
  $_SESSION["errorlogin"]="Usuario Incorrecto";
  redirect('../../vistas/login/login.php');
  }
}
else
  {
    echo "ERROR";
  }


?>
