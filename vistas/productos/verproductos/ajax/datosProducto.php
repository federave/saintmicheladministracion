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

    $sql = "SELECT P.id,P.nombre,P.litros,P.idtipoproducto,TP.tipo FROM productos as P inner join tiposproducto as TP on P.idtipoproducto=TP.id WHERE P.id='$id'";

    $tabla = $conexion->query($sql);
    $row = $tabla->fetch_assoc();


    $xml->addTag("Id",$id);
    $xml->addTag("Nombre",$row["nombre"]);
    $xml->addTag("Litros",$row["litros"]);
    $xml->addTag("IdTipoProducto",$row["idtipoproducto"]);
    $xml->addTag("NombreTipoProducto",$row["tipo"]);


    $sql = "SELECT * FROM productos_insumos as p_i inner join insumos as i on p_i.idinsumo=i.id WHERE p_i.idproducto='$id'";
    $tabla = $conexion->query($sql);
    $k=0;
    if($tabla->num_rows>0)
        {
        while($row = $tabla->fetch_assoc())
            {
            $xml->startTag("Insumo");
              $xml->addTag("IdInsumo",$row["idinsumo"]);
              $xml->addTag("NombreInsumo",$row["nombre"]);
            $xml->closeTag("Insumo");
            $k++;
            }
        }

    $xml->addTag("NumeroInsumos",$k);


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
