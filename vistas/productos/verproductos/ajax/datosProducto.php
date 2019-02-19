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

    escribir("gggggg");
    escribir($id);

    $sql = "SELECT P.id,P.nombre,P.litros,P.idtipoproducto,TP.tipo FROM productos as P inner join tiposproducto as TP on P.idtipoproducto=TP.id WHERE P.id='$id'";
    escribir("'$sql'");

    $tabla = $conexion->query($sql);
    $row = $tabla->fetch_assoc();


    $xml->addTag("Id",$id);
    $xml->addTag("Nombre",$row["nombre"]);
    $xml->addTag("Litros",$row["litros"]);
    $xml->addTag("IdTipoProducto",$row["idtipoproducto"]);
    $xml->addTag("NombreTipoProducto",$row["tipo"]);

    $xml->addTag("NumeroInsumos",2);

    $xml->startTag("Insumo");
      $xml->addTag("IdInsumo",1);
      $xml->addTag("NombreInsumo","Etiqueta");
    $xml->closeTag("Insumo");

    $xml->startTag("Insumo");
      $xml->addTag("IdInsumo",3);
      $xml->addTag("NombreInsumo","Manija");
    $xml->closeTag("Insumo");



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
