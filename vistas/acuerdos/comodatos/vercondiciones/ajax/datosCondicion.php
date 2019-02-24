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

    $sql = "SELECT * FROM condicionescomodatos WHERE id = '$id'";
    $tabla = $conexion->query($sql);
    if($tabla->num_rows>0)
      {
      $row = $tabla->fetch_assoc();
      $idcondicion = $row["id"];
      $xml->addTag("Id", $row["id"]);
      $xml->addTag("Nombre", $row["nombre"]);
      $xml->addTag("MinimoTotal", $row["minimototal"]);
      $xml->addTag("FechaCreacion", $row["fechacreacion"]);

      $sql = "SELECT cc_p.idproducto,cc_p.minimo,p.nombre FROM condicionescomodatos_productos as cc_p inner join productos as p on cc_p.idproducto=p.id WHERE cc_p.idcondicion='$idcondicion'";
      $tabla = $conexion->query($sql);
      $k=0;
      if($tabla->num_rows>0)
        {
        while($row = $tabla->fetch_assoc())
          {
          $xml->startTag("Producto");
            $xml->addTag("IdProducto",$row["idproducto"]);
            $xml->addTag("NombreProducto",$row["nombre"]);
            $xml->addTag("Minimo",$row["minimo"]);
          $xml->closeTag("Producto");
          $k++;
          }
        }
      $xml->addTag("NumeroProductos",$k);

      }





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
