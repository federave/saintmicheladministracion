<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();


if(isset($_GET["idsede"]) && isset($_GET["idpartido"]))
  {
  $xml = new XML();
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $idpartido=$_GET["idpartido"];
    $idsede=$_GET["idsede"];

    $sql = "UPDATE direcciones_sedes SET idpartido='$idpartido' WHERE idsede='$idsede'";
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
