<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();


if(isset($_GET["bonificacionNueva"]))
  {

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $aux = true;



    $bonificacion = new SimpleXMLElement($_GET["bonificacionNueva"]);
    date_default_timezone_set("America/Argentina/Buenos_Aires");

    $nombre = $bonificacion->Nombre;
    $cantidadminima = $bonificacion->CantidadMinima;
    $cantidadmaxima = $bonificacion->CantidadMaxima;
    $porcentaje = $bonificacion->Porcentaje;

    $date = new DateTime();
    $fechacreacion = $date->format('Y-m-d');


    $sql = "INSERT INTO bonificaciones (nombre,cantidadminima,cantidadmaxima,porcentaje,fechacreacion)
    SELECT * FROM (SELECT '$nombre','$cantidadminima','$cantidadmaxima','$porcentaje','$fechacreacion') AS b
    WHERE NOT EXISTS (
        SELECT nombre FROM bonificaciones WHERE nombre = '$nombre'
    ) LIMIT 1";
    $aux &= $conexion->query($sql);

    $sql = "SELECT id FROM bonificaciones WHERE nombre = '$nombre'";
    $tabla = $conexion->query($sql);
    if($tabla->num_rows>0)
      {

      $row = $tabla->fetch_assoc();
      $idbonificacion = $row["id"];

      $numeroProductos = count($bonificacion->xpath("Producto"));

      $k=0;
      while($k<$numeroProductos)
        {
        $idproducto = $bonificacion->Producto[$k]->IdProducto;
        $sql = "INSERT INTO bonificaciones_productos (idbonificacion,idproducto) VALUES ('$idbonificacion','$idproducto')";
        $aux &= $conexion->query($sql);
        $k++;
        }
      }

    redirect('../../../vistas/acuerdos/bonificaciones/bonificaciones.php');



    $conector->cerrarConexion();
    }
  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }





?>
