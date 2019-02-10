<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
$xml = new XML();
$xml->startTag("Respuesta");

if(verificarUsuario($_SESSION["usuario"],$_SESSION["password"]) && isset($_GET["idCliente"])  && isset($_GET["idSede"])  && isset($_GET["idAlquiler"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $id=$_GET["idCliente"];

    /*
    $sql = "UPDATE Direcciones SET calle='$nombre' WHERE id='$id'";
    $aux = $conexion->query($sql);
    */

    $xml->addTag("Id",$id);


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
