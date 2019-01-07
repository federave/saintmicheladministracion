<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');


if(verificarUsuario($_SESSION["usuario"],$_SESSION["password"]) && isset($_GET["id"]) && isset($_GET["idAsignacion"]) && isset($_GET["recorrido"]))
  {
  $xml = new XML();
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $recorrido = new SimpleXMLElement($_GET["recorrido"]);


    if($recorrido->Lunes->Estado=="true")
      $aux = true;
    else {
      $aux = false;

    }





    /*
    $sql = "UPDATE Direcciones SET calle='$nombre' WHERE id='$id'";
    $aux = $conexion->query($sql);
    */

    $conector->cerrarConexion();
    }

  if($aux)
    $xml->addTag("Estado","1");
  else
    $xml->addTag("Estado","0");

  echo $xml->toString();
  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }




?>
