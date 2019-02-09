<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');


if(verificarUsuario($_SESSION["usuario"],$_SESSION["password"]) && isset($_GET["idCliente"]) && isset($_GET["idSede"]) && isset($_GET["idHorario"]))
  {
  $aux=false;
  $xml = new XML();
  $xml->startTag("Respuesta");

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    /*
    $sql = "UPDATE Clientes SET nombre='$nombre' WHERE id='$id'";
    $aux = $conexion->query($sql);
    */

    $idHorario = $_GET["idHorario"];

    $aux = true;

    $conector->cerrarConexion();
    }

  $xml->addTag("Estado",$aux);
  $xml->addTag("IdHorario",$idHorario);
  $xml->closeTag("Respuesta");

  echo $xml->toString();
  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }




?>
