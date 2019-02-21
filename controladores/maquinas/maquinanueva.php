<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$xml = new XML();
$xml->startTag("Respuesta");

if(isset($_GET["maquinaNueva"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $maquinanueva = new SimpleXMLElement($_GET["maquinaNueva"]);
    $nombre = $maquinanueva->Nombre;
    $marca = $maquinanueva->Marca;
    $capacidad = $maquinanueva->Capacidad;
    $idtipomaquina = $maquinanueva->IdTipoMaquina;

    $sql = "INSERT INTO maquinas (nombre,marca,capacidad,idtipomaquina)
    SELECT * FROM (SELECT '$nombre','$marca','$capacidad','$idtipomaquina') AS p
    WHERE NOT EXISTS (
        SELECT nombre FROM maquinas WHERE nombre = '$nombre'
    ) LIMIT 1";
    $aux = $conexion->query($sql);

    if($aux)
      {
      $_SESSION["errornuevamaquina"] = null;
      redirect('../../vistas/maquinas/maquinas.php');
      }
    else
      {
      $_SESSION["errornuevamaquina"] = "no fue posible guardar la nueva maquina";
      redirect('../../vistas/maquinas/nuevamaquina/nuevamaquina.php');
      }

    $conector->cerrarConexion();
    }

  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }


?>
