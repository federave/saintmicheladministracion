<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$xml = new XML();
$xml->startTag("Respuesta");

if(isset($_GET["idAcuerdo"]) && isset($_GET["idBonificacion"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $idacuerdo = $_GET["idAcuerdo"];
    $idbonificacion = $_GET["idBonificacion"];

    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $date = new DateTime();
    $fechainicio = $date->format('Y-m-d H:i:s');

    $sql = "INSERT INTO acuerdosbonificaciones_bonificaciones_actual (idacuerdo,idbonificacion,fechainicio) VALUES ('$idacuerdo','$idbonificacion','$fechainicio')";
    $aux = $conexion->query($sql);


    $conector->cerrarConexion();
    }

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
