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
    $xml->addTag("Nombre","Supermercados Chinos");


    $xml->addTag("NumeroBonificaciones",2);

    $xml->startTag("Bonificacion");
      $xml->addTag("IdBonificacion",1);
      $xml->addTag("NombreBonificacion","Bidones 10%");
    $xml->closeTag("Bonificacion");

    $xml->startTag("Bonificacion");
      $xml->addTag("IdBonificacion",2);
      $xml->addTag("NombreBonificacion","Bidones 15%");
    $xml->closeTag("Bonificacion");



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
