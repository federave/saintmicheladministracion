<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/tablasbasededatos.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$nombreTabla="trabajadores";
$vendedoresId = array();
$vendedoresNombre = array();
$numeroVendedores = 0;

$conector = new Conector();
if($conector->abrirConexion())
  {
  $conexion = $conector->getConexion();
  $sql = "SELECT * FROM trabajadores WHERE idtipotrabajador=2";
  $tabla = $conexion->query($sql);
  if($tabla->num_rows>0)
    {
    $k=0;
    while($row = $tabla->fetch_assoc())
      {
      $vendedoresId[$k] = $row["id"];
      $vendedoresNombre[$k] = $row["nombre"];
      $k++;
      }
    $numeroVendedores = $k;
    }
  $conector->cerrarConexion();
  }

?>
