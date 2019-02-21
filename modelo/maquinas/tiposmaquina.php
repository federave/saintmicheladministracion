<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');


$tiposMaquinaId = array();
$tiposMaquinaNombre = array();
$numeroTiposMaquina = 0;

$conector = new Conector();
if($conector->abrirConexion())
  {
  $conexion = $conector->getConexion();
  $sql = "SELECT * FROM tiposmaquina";
  $tabla = $conexion->query($sql);
  if($tabla->num_rows>0)
      {
      $k=0;
      while($row = $tabla->fetch_assoc())
          {
          $tiposMaquinaId[$k] = $row["id"];
          $tiposMaquinaNombre[$k] = $row["tipo"];
          $k++;
          }
      $numeroTiposMaquina = $k;
      }
  $conector->cerrarConexion();
  }




?>
