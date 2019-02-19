<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');


$productosId = array();
$productosNombre = array();
$numeroProductos = 0;

$conector = new Conector();
if($conector->abrirConexion())
  {
  $conexion = $conector->getConexion();
  $sql = "SELECT * FROM productos";
  $tabla = $conexion->query($sql);
  if($tabla->num_rows>0)
      {
      $k=0;
      while($row = $tabla->fetch_assoc())
          {
          $productosId[$k] = $row["id"];
          $productosNombre[$k] = $row["nombre"];
          $k++;
          }
      $numeroProductos = $k;
      }
  $conector->cerrarConexion();
  }




?>
