<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();


$xml = new XML();
$xml->startTag("Respuesta");


if(isset($_GET["idsede"]) && isset($_GET["horainicio"]) && isset($_GET["horafin"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $idsede=$_GET["idsede"];
    $horainicio=$_GET["horainicio"];
    $horafin=$_GET["horafin"];

    $sql = "SELECT id FROM horarios_sedes WHERE idsede='$idsede' AND horainicio = '$horainicio' AND horafin = '$horafin'";
    $tabla = $conexion->query($sql);
    if(!($tabla->num_rows>0))
      {
      $sql = "INSERT INTO horarios_sedes (idsede,horainicio,horafin) VALUES ('$idsede','$horainicio','$horafin')";
      $aux = $conexion->query($sql);
      if($aux)
        {
        $sql = "SELECT id FROM horarios_sedes WHERE idsede = '$idsede' ORDER BY id DESC";
        $tabla = $conexion->query($sql);
        if($tabla->num_rows>0)
          {
          $row = $tabla->fetch_assoc();
          $idhorario = $row["id"];
          $xml->addTag("IdHorario",$idhorario);
          }
        }
      else
        {
        $aux=0;
        }
      }
    else
      {
      $aux=0;
      }


    $conector->cerrarConexion();
    }

  $xml->addTag("Estado",$aux);
  $xml->closeTag("Respuesta");

  echo $xml->toString();
  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }




?>
