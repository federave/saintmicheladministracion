<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$xml = new XML();
$xml->startTag("Respuesta");

if(isset($_GET["id"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $id=$_GET["id"];

    $sql = "SELECT m.id,m.nombre,m.marca,m.capacidad,m.idtipomaquina,tm.tipo FROM maquinas as m inner join tiposmaquina as tm on m.idtipomaquina=tm.id WHERE m.id='$id'";

    $tabla = $conexion->query($sql);
    $row = $tabla->fetch_assoc();

    $xml->addTag("Id",$id);
    $xml->addTag("Nombre",$row["nombre"]);
    $xml->addTag("Marca",$row["marca"]);
    $xml->addTag("Capacidad",$row["capacidad"]);
    $xml->addTag("IdTipoMaquina",$row["idtipomaquina"]);
    $xml->addTag("TipoMaquina",$row["tipo"]);





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
