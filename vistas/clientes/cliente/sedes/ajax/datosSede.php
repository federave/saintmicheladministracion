<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
$xml = new XML();
$xml->startTag("Respuesta");

if(verificarUsuario($_SESSION["usuario"],$_SESSION["password"]) && isset($_GET["idCliente"]) && isset($_GET["idSede"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $idCliente=$_GET["idCliente"];
    $idSede=$_GET["idSede"];

    /*
    $sql = "UPDATE Direcciones SET calle='$nombre' WHERE id='$id'";
    $aux = $conexion->query($sql);
    */
    $xml->startTag("Sede");
      $xml->addTag("IdCliente",$idCliente);
      $xml->addTag("IdSede",$idSede);
      $xml->addTag("Nombre","Casa");
      $xml->addTag("Telefono","2214566585");
      $xml->addTag("Email","casa@hotmail.com");
      $xml->addTag("Observacion","...");
      $xml->addTag("NombreResponsable","Cesar");
      $xml->addTag("ApellidoResponsable","Castillo");
      $xml->addTag("Calle","35");
      $xml->addTag("Numero","754");
      $xml->addTag("Entre1","10");
      $xml->addTag("Entre2","11");
      $xml->addTag("Departamento","2");
      $xml->addTag("Piso","1");
      $xml->addTag("EstadoLocalizacion","1");
      $xml->addTag("Latitud","1");
      $xml->addTag("Longitud","1");
    $xml->closeTag("Sede");




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
