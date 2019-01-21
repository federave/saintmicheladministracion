<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
$xml = new XML();
$xml->startTag("Respuesta");

if(verificarUsuario($_SESSION["usuario"],$_SESSION["password"]) && isset($_GET["id"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $id=$_GET["id"];

    /*
    $sql = "UPDATE Direcciones SET calle='$nombre' WHERE id='$id'";
    $aux = $conexion->query($sql);
    */

    $xml->addTag("Id",$id);
    $xml->addTag("Nombre","Bidon 20L");
    $xml->addTag("Litros",20);
    $xml->addTag("IdTipoProducto",0);
    $xml->addTag("NombreTipoProducto","Retornable");

    $xml->addTag("NumeroInsumos",2);

    $xml->startTag("Insumo");
      $xml->addTag("IdInsumo",1);
      $xml->addTag("NombreInsumo","Etiqueta");
    $xml->closeTag("Insumo");

    $xml->startTag("Insumo");
      $xml->addTag("IdInsumo",3);
      $xml->addTag("NombreInsumo","Manija");
    $xml->closeTag("Insumo");



    $aux = true;

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
