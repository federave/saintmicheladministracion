<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');


$insumosId = array();
$insumosNombre = array();
$numeroInsumos = 0;

$conector = new Conector();
if($conector->abrirConexion())
  {
  $conexion = $conector->getConexion();
  $sql = "SELECT * FROM insumos";
  $tabla = $conexion->query($sql);
  if($tabla->num_rows>0)
      {
      $k=0;
      while($row = $tabla->fetch_assoc())
          {
          $insumosId[$k] = $row["id"];
          $insumosNombre[$k] = $row["nombre"];
          $k++;
          }
      $numeroInsumos = $k;
      }
  $conector->cerrarConexion();
  }




?>
