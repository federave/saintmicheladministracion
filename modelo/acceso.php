<?php

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');

function verificarAcceso()
{
if(isset($_SESSION["usuario"]) && isset($_SESSION["password"]) && isset($_SESSION["palabraclave"]))
  {
  if(!(verificarPalabraClave($_SESSION["palabraclave"]) && verificarUsuario($_SESSION["usuario"],$_SESSION["password"])))
    {
    redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
    }
  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }
}












 ?>
