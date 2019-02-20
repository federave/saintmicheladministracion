<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$xml = new XML();
$xml->startTag("Respuesta");

if(isset($_GET["id"]) && isset($_GET["idinsumo"]) && isset($_GET["estado"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();
    $id=$_GET["id"];
    $idinsumo=$_GET["idinsumo"];
    $estado=$_GET["estado"];

    if($estado)
      {
      $sql = "INSERT INTO productos_insumos (idproducto,idinsumo) VALUES('$id','$idinsumo')";
      $aux = $conexion->query($sql);
      }
    else
      {
      $sql = "DELETE FROM productos_insumos WHERE idproducto = '$id' AND idinsumo = '$idinsumo'";
      $aux = $conexion->query($sql);
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
