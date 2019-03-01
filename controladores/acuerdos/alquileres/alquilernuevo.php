<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

if(isset($_GET["alquilerNuevo"]))
  {

  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();



    $alquiler = new SimpleXMLElement($_GET["alquilerNuevo"]);
    date_default_timezone_set("America/Argentina/Buenos_Aires");

    $nombre = $alquiler->Nombre;

    $date = new DateTime();
    $fechacreacion = $date->format('Y-m-d');


    $sql = "INSERT INTO alquileres (nombre,fechacreacion)
    SELECT * FROM (SELECT '$nombre','$fechacreacion') AS b
    WHERE NOT EXISTS (
        SELECT nombre FROM alquileres WHERE nombre = '$nombre'
    ) LIMIT 1";
    $aux &= $conexion->query($sql);


    $sql = "SELECT id FROM alquileres WHERE nombre = '$nombre'";
    $tabla = $conexion->query($sql);
    if($tabla->num_rows>0)
      {

      $row = $tabla->fetch_assoc();
      $idalquiler = $row["id"];
      $fechainicio=$fechacreacion;

      $precio = $alquiler->Precio;

      $sql = "INSERT INTO alquileres_precios_actual(idalquiler,precio,fechainicio) VALUES ('$idalquiler','$precio','$fechainicio')";
      $aux &= $conexion->query($sql);


      $numero = count($alquiler->xpath("Producto"));
      $k=0;
      while($k<$numero)
        {
        $idproducto = $alquiler->Producto[$k]->IdProducto;
        $cantidad = $alquiler->Producto[$k]->CantidadProducto;
        $sql = "INSERT INTO alquileres_productos(idalquiler,idproducto,cantidad) VALUES ('$idalquiler','$idproducto','$cantidad')";
        $aux &= $conexion->query($sql);
        $k++;
        }


      $numero = count($alquiler->xpath("Maquina"));


      $k=0;
      while($k<$numero)
        {
        $idmaquina = $alquiler->Maquina[$k]->IdMaquina;
        $cantidad = $alquiler->Maquina[$k]->CantidadMaquina;
        $sql = "INSERT INTO alquileres_maquinas (idalquiler,idmaquina,cantidad) VALUES ('$idalquiler','$idmaquina','$cantidad')";
        $aux &= $conexion->query($sql);
        $k++;
        }

      }

    redirect('../../../vistas/acuerdos/alquileres/alquileres.php');


    $aux = true;

    $conector->cerrarConexion();
    }


  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }





?>
