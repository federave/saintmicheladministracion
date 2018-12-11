<?php

include_once('modelo/basededatos.php');
$bd = new BaseDeDatos();
if(!$bd->existe())
  {
  $bd->crear();
  }



session_start();
$_SESSION["carpeta"] = '/saintmicheladministracion';
$_SESSION["raiz"] = $_SERVER["DOCUMENT_ROOT"] . $_SESSION["carpeta"];

include_once('modelo/otros.php');
include_once('modelo/conector.php');
include_once('modelo/usuarios/usuario.php');

if(isset($_SESSION["usuario"]) && isset($_SESSION["password"]))
{
$usuario = new Usuario($_SESSION["usuario"],$_SESSION["password"]);
if($usuario->esValido())
  {

  if($usuario->deOficina())
    {

    }
  else if($usuario->esVendedor())
    {

    }
  else
    {

    }
  redirect('vistas/menuinicial/menuinicial.php');
  }
else
  {
  redirect('vistas/login/login.php');
  }
}
else
  {
  redirect('vistas/login/login.php');
  }

?>
