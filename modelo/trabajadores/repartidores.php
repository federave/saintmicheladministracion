<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/tablasbasededatos.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$nombreTabla="trabajadores";
$repartidoresId = array();
$repartidoresNombre = array();
$numeroRepartidores = 0;

$conector = new Conector();
if($conector->abrirConexion())
  {
  $conexion = $conector->getConexion();
  $sql = "SELECT * FROM trabajadores WHERE idtipotrabajador=1";
  $tabla = $conexion->query($sql);
  if($tabla->num_rows>0)
    {
    $k=0;
    while($row = $tabla->fetch_assoc())
      {
      $repartidoresId[$k] = $row["id"];
      $repartidoresNombre[$k] = $row["nombre"];
      $k++;
      }
    $numeroRepartidores = $k;
    }
  $conector->cerrarConexion();
  }

?>
