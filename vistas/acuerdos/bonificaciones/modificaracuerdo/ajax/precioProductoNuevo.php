<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$xml = new XML();
$xml->startTag("Respuesta");

if(isset($_GET["id"]) && isset($_GET["idProducto"]) && isset($_GET["precio"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $idacuerdo = $_GET["id"];
    $idproducto = $_GET["idProducto"];
    $precionuevo = $_GET["precio"];


    $sql = "SELECT * FROM acuerdospreciosproductos_productos_actual WHERE idacuerdo = '$idacuerdo' AND idproducto = '$idproducto'";
    $tabla = $conexion->query($sql);
    if($tabla->num_rows>0)
      {
      $row = $tabla->fetch_assoc();

      $aux = true;
      $precioviejo = $row["precio"];
      $fechainiciovieja = $row["fechainicio"];

      date_default_timezone_set("America/Argentina/Buenos_Aires");
      $date = new DateTime();
      $fechafin = $date->format('Y-m-d H:i:s');
      $fechainicio = $fechafin;

      $sql = "INSERT INTO acuerdospreciosproductos_productos_historico (idacuerdo,idproducto,precio,fechainicio,fechafin) VALUES ('$idacuerdo','$idproducto','$precioviejo','$fechainiciovieja','$fechafin')";
      $aux &= $conexion->query($sql);

      $sql = "DELETE FROM acuerdospreciosproductos_productos_actual WHERE idacuerdo = '$idacuerdo' AND idproducto = '$idproducto' ";
      $aux &= $conexion->query($sql);

      $sql = "INSERT INTO acuerdospreciosproductos_productos_actual (idacuerdo,idproducto,precio,fechainicio) VALUES ('$idacuerdo','$idproducto','$precionuevo','$fechainicio')";
      $aux &= $conexion->query($sql);

      }

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
