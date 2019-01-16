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
