<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$xml = new XML();
$xml->startTag("Respuesta");

if(isset($_GET["id"]) &&  isset($_GET["precio"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $idAlquiler=$_GET["id"];
    $precio=$_GET["precio"];


    $sql = "SELECT * FROM alquileres_precios_actual WHERE idalquiler = '$idAlquiler'";
    $tabla = $conexion->query($sql);
    if($tabla->num_rows>0)
      {
      $aux = true;

      $row = $tabla->fetch_assoc();

      $fechainicio = $row["fechainicio"];
      $precioviejo = $row["precio"];

      date_default_timezone_set("America/Argentina/Buenos_Aires");
      $date = new DateTime();
      $fechafin = $date->format('Y-m-d H:i:s');

      $sql = "INSERT INTO alquileres_precios_historico (idalquiler,precio,fechainicio,fechafin) VALUES ('$idAlquiler','$precioviejo','$fechainicio','$fechafin')";
      $aux &= $conexion->query($sql);

      $sql = "DELETE FROM alquileres_precios_actual WHERE idalquiler = '$idAlquiler'";
      $aux &= $conexion->query($sql);

      $sql = "INSERT INTO alquileres_precios_actual (idalquiler,precio,fechainicio) VALUES ('$idAlquiler','$precio','$fechafin')";
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
