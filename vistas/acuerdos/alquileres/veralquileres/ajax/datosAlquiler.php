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

    $sql = "SELECT * FROM alquileres WHERE id = '$id'";
    $tabla = $conexion->query($sql);
    if($tabla->num_rows>0)
      {
      $row = $tabla->fetch_assoc();
      $idalquiler = $row["id"];
      $xml->addTag("Id", $row["id"]);
      $xml->addTag("Nombre", $row["nombre"]);
      $xml->addTag("FechaCreacion", $row["fechacreacion"]);

      $sql = "SELECT a_p_a.precio,a_p_a.fechainicio FROM alquileres_precios_actual as a_p_a WHERE a_p_a.idalquiler='$idalquiler'";
      $tabla = $conexion->query($sql);
      if($tabla->num_rows>0)
        {
        $row = $tabla->fetch_assoc();
        $xml->addTag("PrecioActual",$row["precio"]);
        $xml->addTag("FechaInicioPrecioActual",$row["fechainicio"]);
        }


      $sql = "SELECT a_p_a.precio,a_p_a.fechainicio,a_p_a.fechafin FROM alquileres_precios_historico as a_p_a WHERE a_p_a.idalquiler='$idalquiler'";
      $tabla = $conexion->query($sql);
      $k=0;
      if($tabla->num_rows>0)
        {
        while($row = $tabla->fetch_assoc())
          {
          $xml->startTag("PrecioHistorico");
            $xml->addTag("Precio",$row["precio"]);
            $xml->addTag("FechaInicio",$row["fechainicio"]);
            $xml->addTag("FechaFin",$row["fechafin"]);
          $xml->closeTag("PrecioHistorico");
          $k++;
          }
        }
      $xml->addTag("NumeroPreciosHistoricos",$k);



      $sql = "SELECT a_m.idmaquina,a_m.cantidad,m.nombre FROM alquileres_maquinas as a_m inner join maquinas as m on a_m.idmaquina=m.id WHERE a_m.idalquiler='$idalquiler'";
      $tabla = $conexion->query($sql);
      $k=0;
      if($tabla->num_rows>0)
        {
        while($row = $tabla->fetch_assoc())
          {
          $xml->startTag("Maquina");
            $xml->addTag("IdMaquina",$row["idmaquina"]);
            $xml->addTag("NombreMaquina",$row["nombre"]);
            $xml->addTag("CantidadMaquina",$row["cantidad"]);
          $xml->closeTag("Maquina");
          $k++;
          }
        }
      $xml->addTag("NumeroMaquinas",$k);



      $sql = "SELECT a_p.idproducto,a_p.cantidad,p.nombre FROM alquileres_productos as a_p inner join productos as p on a_p.idproducto=p.id WHERE a_p.idalquiler='$idalquiler'";
      $tabla = $conexion->query($sql);
      $k=0;
      if($tabla->num_rows>0)
        {
        while($row = $tabla->fetch_assoc())
          {
          $xml->startTag("Producto");
            $xml->addTag("IdProducto",$row["idproducto"]);
            $xml->addTag("NombreProducto",$row["nombre"]);
            $xml->addTag("CantidadProducto",$row["cantidad"]);
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
