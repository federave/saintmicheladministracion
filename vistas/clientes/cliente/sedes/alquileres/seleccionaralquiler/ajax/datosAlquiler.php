<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

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
    $xml->addTag("Nombre","6 Bidones de 20L");
    $xml->addTag("Precio",100);


    $xml->addTag("NumeroProductos",2);

    $xml->startTag("Producto");
      $xml->addTag("IdProducto",1);
      $xml->addTag("NombreProducto","Bidon 10L");
      $xml->addTag("CantidadProducto",10);
    $xml->closeTag("Producto");

    $xml->startTag("Producto");
      $xml->addTag("IdProducto",2);
      $xml->addTag("NombreProducto","Bidon 12L");
      $xml->addTag("CantidadProducto",12);
    $xml->closeTag("Producto");

    $xml->addTag("NumeroMaquinas",2);

    $xml->startTag("Maquina");
      $xml->addTag("IdMaquina",1);
      $xml->addTag("NombreMaquina","Dispenser Ushuaia");
      $xml->addTag("CantidadMaquina",1);
    $xml->closeTag("Maquina");


    $xml->startTag("Maquina");
      $xml->addTag("IdMaquina",2);
      $xml->addTag("NombreMaquina","Heladera Briket");
      $xml->addTag("CantidadMaquina",2);
    $xml->closeTag("Maquina");




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
