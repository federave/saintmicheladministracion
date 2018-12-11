<?php
session_start();

include_once('../../modelo/otros.php');
include_once('../../modelo/usuarios/usuario.php');


if(isset($_POST["usuario"]) && isset($_POST["password"]))
{
$usuario = new Usuario($_POST["usuario"],$_POST["password"]);
if($usuario->esValido())
  {
  $_SESSION["usuario"] = $_POST["usuario"];
  $_SESSION["password"] = $_POST["password"];
  redirect('../../index.php');
  }
else
  {
    echo "EL USUARIO NO EXISTE";
  }
}
else
  {
    echo "ERROR";
  }


?>
