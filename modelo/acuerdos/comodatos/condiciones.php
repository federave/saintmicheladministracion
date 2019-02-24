<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');


$condicionesId = array();
$condicionesNombre = array();
$numeroCondiciones = 0;

$conector = new Conector();
if($conector->abrirConexion())
  {
  $conexion = $conector->getConexion();
  $sql = "SELECT * FROM condicionescomodatos";
  $tabla = $conexion->query($sql);
  if($tabla->num_rows>0)
      {
      $k=0;
      while($row = $tabla->fetch_assoc())
          {
          $condicionesId[$k] = $row["id"];
          $condicionesNombre[$k] = $row["nombre"];
          $k++;
          }
      $numeroCondiciones = $k;
      }
  $conector->cerrarConexion();
  }


?>
