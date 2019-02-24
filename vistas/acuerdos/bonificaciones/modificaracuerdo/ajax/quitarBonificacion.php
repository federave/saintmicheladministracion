<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$xml = new XML();
$xml->startTag("Respuesta");

if(isset($_GET["id"]) && isset($_GET["idbonificacion"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $idacuerdo = $_GET["id"];
    $idbonificacion = $_GET["idbonificacion"];

    $sql = "SELECT * FROM acuerdosbonificaciones_bonificaciones_actual WHERE idacuerdo = '$idacuerdo' AND idbonificacion = '$idbonificacion'";
    $tabla = $conexion->query($sql);
    if($tabla->num_rows>0)
      {
      $row = $tabla->fetch_assoc();

      $aux = true;
      $fechainicio = $row["fechainicio"];

      date_default_timezone_set("America/Argentina/Buenos_Aires");
      $date = new DateTime();
      $fechafin = $date->format('Y-m-d H:i:s');

      $sql = "INSERT INTO acuerdosbonificaciones_bonificaciones_historico (idacuerdo,idbonificacion,fechainicio,fechafin) VALUES ('$idacuerdo','$idbonificacion','$fechainicio','$fechafin')";
      $aux &= $conexion->query($sql);

      $sql = "DELETE FROM acuerdosbonificaciones_bonificaciones_actual WHERE idacuerdo = '$idacuerdo' AND idbonificacion = '$idbonificacion' ";
      $aux &= $conexion->query($sql);


      }

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
