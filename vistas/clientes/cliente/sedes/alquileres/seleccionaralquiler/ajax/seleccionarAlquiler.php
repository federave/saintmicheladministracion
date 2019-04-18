<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$xml = new XML();
$xml->startTag("Respuesta");

if(isset($_GET["idsede"])  && isset($_GET["idalquiler"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {

    $aux=true;

    $conexion = $conector->getConexion();

    $idsede=$_GET["idsede"];
    $idalquilernuevo=$_GET["idalquiler"];

    $sql = "SELECT * FROM sedes_alquileres_actual AS s WHERE s.idsede='$idsede'";
    $tabla = $conexion->query($sql);

    if($tabla!=null)
    {
    if($tabla->num_rows>0)
      {

      $row = $tabla->fetch_assoc();

      $idalquiler = $row["idalquiler"];
      $especial = $row["especial"];
      $precioespecial = $row["precioespecial"];
      $fechainicio = $row["fechainicio"];

      date_default_timezone_set("America/Argentina/Buenos_Aires");
      $date = new DateTime();
      $fechafin = $date->format('Y-m-d H:i:s');

      if($precioespecial==null)
        $sql = "INSERT INTO sedes_alquileres_historico (idsede,idalquiler,especial,fechainicio,fechafin) VALUES ('$idsede','$idalquiler','$especial','$fechainicio','$fechafin')";
      else
        $sql = "INSERT INTO sedes_alquileres_historico (idsede,idalquiler,especial,precioespecial,fechainicio,fechafin) VALUES ('$idsede','$idalquiler','$especial','$precioespecial','$fechainicio','$fechafin')";

      $aux &= $conexion->query($sql);

      $sql = "DELETE FROM sedes_alquileres_actual WHERE idsede = '$idsede'";
      $aux &= $conexion->query($sql);


      }

    }




      $especial = 0;
      date_default_timezone_set("America/Argentina/Buenos_Aires");
      $date = new DateTime();
      $fechainicio = $date->format('Y-m-d H:i:s');
      $sql = "INSERT INTO sedes_alquileres_actual (idsede,idalquiler,especial,fechainicio) VALUES ('$idsede','$idalquilernuevo','$especial','$fechainicio')";
      $aux &= $conexion->query($sql);






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
