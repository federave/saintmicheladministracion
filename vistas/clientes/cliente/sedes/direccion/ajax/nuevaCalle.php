<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();


if(isset($_GET["idsede"]) && isset($_GET["calle"]) && isset($_GET["estadoLocalizacion"]) && isset($_GET["latitud"]) && isset($_GET["longitud"]))
  {
  $xml = new XML();
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $idsede=$_GET["idsede"];
    $calle=$_GET["calle"];
    $estadolocalizacion=$_GET["estadoLocalizacion"];
    $latitud=$_GET["latitud"];
    $longitud=$_GET["longitud"];

    $sql = "UPDATE direcciones_sedes SET calle='$calle',estadolocalizacion='$estadolocalizacion',latitud='$latitud',longitud='$longitud' WHERE idsede='$idsede'";
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
