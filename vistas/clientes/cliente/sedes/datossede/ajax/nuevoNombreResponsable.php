<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();


$xml = new XML();
$xml->startTag("Respuesta");

if(isset($_GET["idsede"]) &&  isset($_GET["nombre"]))
  {
  $xml = new XML();
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();


    $id=$_GET["idsede"];
    $nombre=$_GET["nombre"];

    $sql = "UPDATE sedes SET nombreresponsable='$nombre' WHERE id='$id'";
    $aux = $conexion->query($sql);


    $conector->cerrarConexion();
    }

  $xml->addTag("Estado",$aux);

  echo $xml->toString();
  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }




?>
