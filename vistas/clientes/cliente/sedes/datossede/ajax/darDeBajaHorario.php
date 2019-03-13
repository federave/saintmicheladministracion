<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();


$xml = new XML();
$xml->startTag("Respuesta");


if(isset($_GET["idhorario"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();
    $id=$_GET["idhorario"];

    $sql = "DELETE FROM horarios_sedes WHERE id='$id'";
    $aux = $conexion->query($sql);

    $idHorario = $id;
    $xml->addTag("IdHorario",$idHorario);

    if($aux==false)
      $aux=0;

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
