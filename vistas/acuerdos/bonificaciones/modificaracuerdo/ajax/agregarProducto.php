<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$xml = new XML();
$xml->startTag("Respuesta");

if(isset($_GET["idAcuerdo"]) && isset($_GET["idProducto"]) && isset($_GET["precio"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $idacuerdo = $_GET["idAcuerdo"];
    $idproducto = $_GET["idProducto"];
    $precio = $_GET["precio"];

    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $date = new DateTime();
    $fechainicio = $date->format('Y-m-d H:i:s');

    $sql = "INSERT INTO acuerdospreciosproductos_productos_actual (idacuerdo,idproducto,precio,fechainicio) VALUES ('$idacuerdo','$idproducto','$precio','$fechainicio')";
    $aux = $conexion->query($sql);


    $conector->cerrarConexion();
    }

  if($aux==false)
    $aux=0;
    
  $xml->addTag("Estado",$aux);

  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }

$xml->closeTag("Respuesta");
echo $xml->toString();



?>
