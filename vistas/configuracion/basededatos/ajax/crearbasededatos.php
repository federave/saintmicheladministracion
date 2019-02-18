<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/basededatos.php');
$xml = new XML();
$xml->startTag("Respuesta");

if(verificarPalabraClave($_SESSION["palabraclave"]) && verificarUsuario($_SESSION["usuario"],$_SESSION["password"]) )
  {
  $aux=true;
  $basededatos = new BaseDeDatos();
  $aux=$basededatos->crearBaseDeDatos();
  if($aux==false)
    $aux=0;
  $xml->addTag("Estado",$aux);
  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }

$xml->closeTag("Respuesta");

echo $xml->toString();



?>
