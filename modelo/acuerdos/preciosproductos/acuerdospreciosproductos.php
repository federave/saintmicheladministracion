<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');


$acuerdospreciosproductosId = array();
$acuerdospreciosproductosNombre = array();
$numeroAcuerdos = 0;

$conector = new Conector();
if($conector->abrirConexion())
  {
  $conexion = $conector->getConexion();
  $sql = "SELECT * FROM acuerdospreciosproductos";
  $tabla = $conexion->query($sql);
  if($tabla->num_rows>0)
      {
      $k=0;
      while($row = $tabla->fetch_assoc())
          {
          $acuerdospreciosproductosId[$k] = $row["id"];
          $acuerdospreciosproductosNombre[$k] = $row["nombre"];
          $k++;
          }
      $numeroAcuerdos = $k;
      }
  $conector->cerrarConexion();
  }




?>
