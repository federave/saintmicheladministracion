<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$xml = new XML();
$xml->startTag("Respuesta");

if(isset($_GET["id"]) && isset($_GET["idMaquina"]) && isset($_GET["cantidad"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $idComodato=$_GET["id"];
    $idMaquina=$_GET["idMaquina"];
    $cantidad=$_GET["cantidad"];

    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $date = new DateTime();
    $fechainicio = $date->format('Y-m-d H:i:s');

    $sql = "INSERT INTO comodatos_maquinas_actual (idcomodato,idmaquina,cantidad,fechainicio) VALUES ('$idComodato','$idMaquina','$cantidad','$fechainicio')";
    $aux = $conexion->query($sql);

    $conector->cerrarConexion();
    }

  $xml->addTag("Estado",$aux);

  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }

$xml->closeTag("Respuesta");
echo $xml->toString();



?>
