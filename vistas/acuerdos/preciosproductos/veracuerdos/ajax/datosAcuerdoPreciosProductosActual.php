<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$xml = new XML();
$xml->startTag("Respuesta");

if(isset($_GET["id"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $id=$_GET["id"];

    $sql = "SELECT * FROM acuerdospreciosproductos WHERE id = '$id'";
    $tabla = $conexion->query($sql);
    if($tabla->num_rows>0)
      {
      $row = $tabla->fetch_assoc();
      $idacuerdo = $row["id"];
      $xml->addTag("Id", $row["id"]);
      $xml->addTag("Nombre", $row["nombre"]);
      $xml->addTag("Especial", $row["especial"]);
      $xml->addTag("FechaCreacion", $row["fechacreacion"]);

      $sql = "SELECT app_p_a.idproducto,app_p_a.precio,app_p_a.fechainicio,p.nombre FROM acuerdospreciosproductos_productos_actual as app_p_a inner join productos as p on app_p_a.idproducto=p.id WHERE app_p_a.idacuerdo='$idacuerdo'";
      $tabla = $conexion->query($sql);
      $k=0;
      if($tabla->num_rows>0)
        {
        while($row = $tabla->fetch_assoc())
          {
          $xml->startTag("Producto");
            $xml->addTag("IdProducto",$row["idproducto"]);
            $xml->addTag("NombreProducto",$row["nombre"]);
            $xml->addTag("PrecioProducto",$row["precio"]);
            $fechaaux = new DateTime($row["fechainicio"]);
            $fechainicio = $fechaaux->format('Y-m-d');
            $xml->addTag("FechaInicioProducto",$fechainicio);
          $xml->closeTag("Producto");
          $k++;
          }
        }
      $xml->addTag("NumeroProductos",$k);

      }





    $aux = true;

    $conector->cerrarConexion();
    }

  $xml->addTag("Estado",$aux);

  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }

$xml->closeTag("Respuesta");

echo $xml->toString();



?>
