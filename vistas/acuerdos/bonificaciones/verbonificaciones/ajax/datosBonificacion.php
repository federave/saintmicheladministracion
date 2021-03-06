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

    $sql = "SELECT * FROM bonificaciones WHERE id = '$id'";
    $tabla = $conexion->query($sql);
    if($tabla->num_rows>0)
      {
      $row = $tabla->fetch_assoc();

      $xml->addTag("Id",$id);
      $xml->addTag("Nombre",$row["nombre"]);
      $xml->addTag("CantidadMinima",$row["cantidadminima"]);
      $xml->addTag("CantidadMaxima",$row["cantidadmaxima"]);
      $xml->addTag("Porcentaje",$row["porcentaje"]);
      $xml->addTag("FechaCreacion",$row["fechacreacion"]);

      $sql = "SELECT b_p.idproducto,p.nombre FROM bonificaciones_productos as b_p inner join productos as p on b_p.idproducto=p.id WHERE b_p.idbonificacion='$id'";
      $tabla = $conexion->query($sql);
      $k=0;
      if($tabla->num_rows>0)
        {
        while($row = $tabla->fetch_assoc())
          {
          $xml->startTag("Producto");
            $xml->addTag("IdProducto",$row["idproducto"]);
            $xml->addTag("NombreProducto",$row["nombre"]);
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
