<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();


if(isset($_GET["idsede"]) && isset($_GET["departamento"]))
  {
  $xml = new XML();
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $departamento=$_GET["departamento"];
    $idsede=$_GET["idsede"];

    $sql = "UPDATE direcciones_sedes SET departamento='$departamento' WHERE idsede='$idsede'";
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
