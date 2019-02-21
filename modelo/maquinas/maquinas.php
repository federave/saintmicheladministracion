<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');


$maquinasId = array();
$maquinasNombre = array();
$numeroMaquinas = 0;

$conector = new Conector();
if($conector->abrirConexion())
  {
  $conexion = $conector->getConexion();
  $sql = "SELECT * FROM maquinas";
  $tabla = $conexion->query($sql);
  if($tabla->num_rows>0)
      {
      $k=0;
      while($row = $tabla->fetch_assoc())
          {
          $maquinasId[$k] = $row["id"];
          $maquinasNombre[$k] = $row["nombre"];
          $k++;
          }
      $numeroMaquinas = $k;
      }
  $conector->cerrarConexion();
  }




?>
