<?php

session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
$xml = new XML();
$xml->startTag("Respuesta");

if(verificarUsuario($_SESSION["usuario"],$_SESSION["password"]) && isset($_GET["sedeNueva"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();


    /*
    $sql = "UPDATE Direcciones SET calle='$nombre' WHERE id='$id'";
    $aux = $conexion->query($sql);
    */

    $sedeNueva=$_GET["sedeNueva"];
    echo "<script>alert('$sedeNueva')</script>";

    redirect( '../../vistas/clientes/cliente/cliente.php');




    $aux = true;

    $conector->cerrarConexion();
    }


  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }





?>
