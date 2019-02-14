<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
$xml = new XML();
$xml->startTag("Respuesta");

if(verificarPalabraClave($_SESSION["palabraclave"]) && verificarUsuario($_SESSION["usuario"],$_SESSION["password"]) && isset($_GET["acuerdoNuevo"]))
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

    $acuerdoNuevo=$_GET["acuerdoNuevo"];
    echo "<script>alert('$acuerdoNuevo')</script>";

    redirect('../../../vistas/clientes/cliente/cliente.php');




    $aux = true;

    $conector->cerrarConexion();
    }


  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }





?>
