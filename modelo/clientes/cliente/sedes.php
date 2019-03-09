<?php
include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$sedesId = array();
$sedesNombre = array();
$numeroSedes = 0;

$conector = new Conector();
if($conector->abrirConexion())
  {
  $conexion = $conector->getConexion();

  $sql = "SELECT s.id,s.nombre FROM clientes AS c INNER JOIN sedes AS s ON s.idcliente=c.id WHERE c.id='$idcliente'";
  $tabla = $conexion->query($sql);
  if($tabla->num_rows>0)
    {
    $k=0;
    while($row = $tabla->fetch_assoc())
      {
      $sedesId[$k] = $row["id"];
      $sedesNombre[$k] = $row["nombre"];
      $k++;
      }
    $numeroSedes = $k;
    }

  $conector->cerrarConexion();
  }

?>
