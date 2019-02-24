<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();


if(isset($_GET["condicionNueva"]))
  {

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $aux = true;



    $condicionnueva = new SimpleXMLElement($_GET["condicionNueva"]);
    date_default_timezone_set("America/Argentina/Buenos_Aires");

    $nombre = $condicionnueva->Nombre;
    $minimototal = $condicionnueva->MinimoTotal;

    $date = new DateTime();
    $fechacreacion = $date->format('Y-m-d');


    $sql = "INSERT INTO condicionescomodatos (nombre,minimototal,fechacreacion)
    SELECT * FROM (SELECT '$nombre','$minimototal','$fechacreacion') AS b
    WHERE NOT EXISTS (
        SELECT nombre FROM condicionescomodatos WHERE nombre = '$nombre'
    ) LIMIT 1";
    $aux &= $conexion->query($sql);


    $sql = "SELECT id FROM condicionescomodatos WHERE nombre = '$nombre'";
    $tabla = $conexion->query($sql);
    if($tabla->num_rows>0)
      {

      $row = $tabla->fetch_assoc();
      $idcondicion = $row["id"];

      $numeroProductos = count($condicionnueva->xpath("Producto"));

      $k=0;
      while($k<$numeroProductos)
        {
        $idproducto = $condicionnueva->Producto[$k]->IdProducto;
        $cantidadminima = $condicionnueva->Producto[$k]->CantidadMinimaProducto;
        $sql = "INSERT INTO condicionescomodatos_productos (idcondicion,idproducto,minimo) VALUES ('$idcondicion','$idproducto','$cantidadminima')";
        $aux &= $conexion->query($sql);
        $k++;
        }
      }

    redirect('../../../vistas/acuerdos/comodatos/comodatos.php');



    $conector->cerrarConexion();
    }
  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }





?>
