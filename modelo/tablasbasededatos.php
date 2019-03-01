<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');


function datosTabla($nombreTabla,&$datosId,&$datosNombre,&$numeroDatos)
{
$conector = new Conector();
if($conector->abrirConexion())
  {
  $conexion = $conector->getConexion();
  $sql = "SELECT * FROM ".$nombreTabla;
  $tabla = $conexion->query($sql);
  if($tabla->num_rows>0)
    {
    $k=0;
    while($row = $tabla->fetch_assoc())
      {
      $datosId[$k] = $row["id"];
      $datosNombre[$k] = $row["nombre"];
      $k++;
      }
    $numeroDatos = $k;
    }
  $conector->cerrarConexion();
  }
}



function datosTablaTipos($nombreTabla,&$datosId,&$datosNombre,&$numeroDatos)
{
$conector = new Conector();
if($conector->abrirConexion())
  {
  $conexion = $conector->getConexion();
  $sql = "SELECT * FROM ".$nombreTabla;
  $tabla = $conexion->query($sql);
  if($tabla->num_rows>0)
    {
    $k=0;
    while($row = $tabla->fetch_assoc())
      {
      $datosId[$k] = $row["id"];
      $datosNombre[$k] = $row["tipo"];
      $k++;
      }
    $numeroDatos = $k;
    }
  $conector->cerrarConexion();
  }
}







?>
