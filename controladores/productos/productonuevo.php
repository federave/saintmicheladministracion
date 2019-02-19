<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
$xml = new XML();
$xml->startTag("Respuesta");

if(verificarUsuario($_SESSION["usuario"],$_SESSION["password"]) && isset($_GET["productonuevo"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();


    $productonuevo = new SimpleXMLElement($_GET["productonuevo"]);

    $nombre = $productonuevo->Nombre;
    $litros = $productonuevo->Litros;
    $idtipoproducto = $productonuevo->IdTipoProducto;

    $sql = "INSERT INTO productos (nombre,litros,idtipoproducto)
    SELECT * FROM (SELECT '$nombre','$litros','$idtipoproducto') AS p
    WHERE NOT EXISTS (
        SELECT nombre FROM productos WHERE nombre = '$nombre'
    ) LIMIT 1";
    $aux &= $conexion->query($sql);

    $sql = "SELECT id FROM productos WHERE nombre = '$nombre'";
    $tabla = $conexion->query($sql);
    $row = $tabla->fetch_assoc();
    $idproducto = $row["id"];

    $numeroInsumos = count($productonuevo->xpath("Insumo"));

    $k=0;
    while($k<$numeroInsumos)
    {
    $idinsumo = $productonuevo->Insumo[$k]->IdInsumo;

    $sql = "INSERT INTO productos_insumos (idproducto,idinsumo)
    SELECT * FROM (SELECT '$idproducto','$idinsumo') AS p_i
    WHERE NOT EXISTS (
        SELECT idproducto FROM productos_insumos WHERE idproducto = '$idproducto' AND idinsumo = '$idinsumo'
    ) LIMIT 1";
    $aux &= $conexion->query($sql);

    $k++;
    }





    redirect('../../vistas/productos/productos.php');



    $aux = true;

    $conector->cerrarConexion();
    }


  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }





?>
