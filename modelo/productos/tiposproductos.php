<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');


$tiposProductoId = array();
$tiposProductoNombre = array();
$numeroTiposProducto = 0;

$conector = new Conector();
if($conector->abrirConexion())
  {
  $conexion = $conector->getConexion();
  $sql = "SELECT * FROM tiposproducto";
  $tabla = $conexion->query($sql);
  if($tabla->num_rows>0)
      {
      $k=0;
      while($row = $tabla->fetch_assoc())
          {
          $tiposProductoId[$k] = $row["id"];
          $tiposProductoNombre[$k] = $row["tipo"];
          $k++;
          }
      $numeroTiposProducto = $k;
      }
  $conector->cerrarConexion();
  }




?>
