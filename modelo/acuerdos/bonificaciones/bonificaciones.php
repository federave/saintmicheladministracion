<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');


$bonificacionesId = array();
$bonificacionesNombre = array();
$numeroBonificaciones = 0;

$conector = new Conector();
if($conector->abrirConexion())
  {
  $conexion = $conector->getConexion();
  $sql = "SELECT * FROM bonificaciones";
  $tabla = $conexion->query($sql);
  if($tabla->num_rows>0)
    {
    $k=0;
    while($row = $tabla->fetch_assoc())
      {
      $bonificacionesId[$k] = $row["id"];
      $bonificacionesNombre[$k] = $row["nombre"];
      $k++;
      }
    $numeroBonificaciones = $k;
    }
  $conector->cerrarConexion();
  }

?>
