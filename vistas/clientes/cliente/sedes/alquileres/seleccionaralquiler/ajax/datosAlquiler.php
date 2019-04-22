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

    $sql = "SELECT * FROM alquileres AS a WHERE a.id='$id'";
    $tabla = $conexion->query($sql);

    if($tabla!=null)
    {
    if($tabla->num_rows>0)
      {
      $row = $tabla->fetch_assoc();
      $xml->addTag("Id",$id);
      $xml->addTag("Nombre",$row["nombre"]);
      $xml->addTag("FechaCreacion",$row["fechacreacion"]);


      $sql = "SELECT a.precio FROM alquileres_precios_actual AS a WHERE a.idalquiler='$id'";
      $tabla = $conexion->query($sql);
      $row = $tabla->fetch_assoc();
      $xml->addTag("Precio",$row["precio"]);



      $sql = "SELECT a_p.idproducto,a_p.cantidad,p.nombre FROM alquileres_productos AS a_p INNER JOIN productos as p ON a_p.idproducto = p.id WHERE a_p.idalquiler='$id'";
      $tabla = $conexion->query($sql);

      $xml->addTag("NumeroProductos",$tabla->num_rows);

      while($row = $tabla->fetch_assoc())
        {
        $xml->addTag("IdProducto",$row["idproducto"]);
        $xml->addTag("NombreProducto",$row["nombre"]);
        $xml->addTag("CantidadProducto",$row["cantidad"]);
        }

      $sql = "SELECT a_m.idtipomaquina,a_m.cantidad,tm.tipo FROM alquileres_maquinas AS a_m INNER JOIN tiposmaquina as tm ON a_m.idtipomaquina = tm.id WHERE a_m.idalquiler='$id'";
      $tabla = $conexion->query($sql);
      $xml->addTag("NumeroMaquinas",$tabla->num_rows);

      while($row = $tabla->fetch_assoc())
        {
        $xml->addTag("IdTipoMaquina",$row["idtipomaquina"]);
        $xml->addTag("NombreMaquina",$row["tipo"]);
        $xml->addTag("CantidadMaquina",$row["cantidad"]);
        }

      $aux = true;

      }
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
