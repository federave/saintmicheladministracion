<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$xml = new XML();
$xml->startTag("Respuesta");

if(isset($_GET["id"]) && isset($_GET["idCondicion"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $idComodato=$_GET["id"];
    $idCondicion=$_GET["idCondicion"];
    $aux = true;


    $sql = "SELECT * FROM comodatos_condicionescomodatos_actual WHERE idcomodato = '$idComodato' AND idcondicion = '$idCondicion'";
    $tabla = $conexion->query($sql);
    if($tabla->num_rows>0)
      {
      $row = $tabla->fetch_assoc();

      $fechainicio = $row["fechainicio"];

      date_default_timezone_set("America/Argentina/Buenos_Aires");
      $date = new DateTime();
      $fechafin = $date->format('Y-m-d H:i:s');

      $sql = "INSERT INTO comodatos_condicionescomodatos_historico (idcomodato,idcondicion,fechainicio,fechafin) VALUES ('$idComodato','$idCondicion','$fechainicio','$fechafin')";
      $aux &= $conexion->query($sql);

      $sql = "DELETE FROM comodatos_condicionescomodatos_actual WHERE idcomodato = '$idComodato' AND idcondicion = '$idCondicion' ";
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
