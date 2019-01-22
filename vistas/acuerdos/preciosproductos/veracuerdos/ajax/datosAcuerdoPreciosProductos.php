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
    $xml->addTag("Nombre","Domicilios");


    $xml->addTag("NumeroProductos",2);

    $xml->startTag("Producto");
      $xml->addTag("IdProducto",1);
      $xml->addTag("NombreProducto","Bidon 20L");
      $xml->addTag("PrecioProducto",140);
    $xml->closeTag("Producto");
    $xml->startTag("Producto");
      $xml->addTag("IdProducto",2);
      $xml->addTag("NombreProducto","Bidon 12L");
      $xml->addTag("PrecioProducto",110);
    $xml->closeTag("Producto");

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
