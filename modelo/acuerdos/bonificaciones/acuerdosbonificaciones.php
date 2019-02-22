<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');


$acuerdosbonificacionesId = array();
$acuerdosbonificacionesNombre = array();
$numeroAcuerdosBonificaciones = 0;

$conector = new Conector();
if($conector->abrirConexion())
  {
  $conexion = $conector->getConexion();
  $sql = "SELECT * FROM acuerdosbonificaciones";
  $tabla = $conexion->query($sql);
  if($tabla->num_rows>0)
    {
    $k=0;
    while($row = $tabla->fetch_assoc())
      {
      $acuerdosbonificacionesId[$k] = $row["id"];
      $acuerdosbonificacionesNombre[$k] = $row["nombre"];
      $k++;
      }
    $numeroAcuerdosBonificaciones = $k;
    }
  $conector->cerrarConexion();
  }

?>
