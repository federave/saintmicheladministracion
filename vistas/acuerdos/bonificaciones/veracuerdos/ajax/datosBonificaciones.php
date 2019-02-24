<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$xml = new XML();
$xml->startTag("Respuesta");

$aux=false;
$conector = new Conector();
if($conector->abrirConexion())
  {
  $conexion = $conector->getConexion();
  $sql = "SELECT id FROM bonificaciones";
  $tabla = $conexion->query($sql);
  $k=0;
  if($tabla->num_rows>0)
    {
    while($row = $tabla->fetch_assoc())
      {
      $xml->startTag("Bonificacion");
        $xml->addTag("IdBonificacion",$row["id"]);
      $xml->closeTag("Bonificacion");
      $k++;
      }
    }
  $xml->addTag("NumeroBonificaciones",$k);
  $aux = true;
  $conector->cerrarConexion();
  }

$xml->addTag("Estado",$aux);
$xml->closeTag("Respuesta");

echo $xml->toString();



?>
