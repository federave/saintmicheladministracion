<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');


if(verificarUsuario($_SESSION["usuario"],$_SESSION["password"]) && isset($_GET["id"]) && isset($_GET["idRazonDeCompra"]))
  {
  $xml = new XML();
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    /*
    $sql = "UPDATE Clientes SET nombre='$nombre' WHERE id='$id'";
    $aux = $conexion->query($sql);
    */
    $aux = true;

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
