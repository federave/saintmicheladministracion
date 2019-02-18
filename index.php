<?php
session_start();

if(!isset($_SESSION["raiz"]))
  {
  $_SESSION["carpeta"] = '';
  $_SESSION["carpeta"] = '/saintmicheladministracion';
  $_SESSION["raiz"] = $_SERVER["DOCUMENT_ROOT"] . $_SESSION["carpeta"];
  }

include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/basededatos.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');

$bd = new BaseDeDatos();
if(!$bd->hayUsuarios())
  {
  $bd->crearTablasIniciales();
  }


if(isset($_SESSION["usuario"]) && isset($_SESSION["password"]) && isset($_SESSION["palabraclave"]))
  {
  if(verificarPalabraClave($_SESSION["palabraclave"]))
    {
    if(verificarUsuario($_SESSION["usuario"],$_SESSION["password"]))
      redirect('vistas/menuinicial/menuinicial.php');
    else
      redirect('vistas/login/login.php');
    }
  else
    {
    redirect('vistas/palabraclave/palabraclave.php');
    }
  }
else
  {
  redirect('vistas/palabraclave/palabraclave.php');
  }

?>
