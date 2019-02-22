<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$xml = new XML();
$xml->startTag("Respuesta");

if(isset($_GET["acuerdoBonificacionesNuevo"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $aux = true;

    $acuerdo = new SimpleXMLElement($_GET["acuerdoBonificacionesNuevo"]);
    date_default_timezone_set("America/Argentina/Buenos_Aires");

    $nombre = $acuerdo->Nombre;
    $especial = 0;
    $date = new DateTime();
    $fechacreacion = $date->format('Y-m-d');
    $fechainicio = $date->format('Y-m-d H:i:s');

    $sql = "INSERT INTO acuerdosbonificaciones (nombre,especial,fechacreacion)
    SELECT * FROM (SELECT '$nombre','$especial','$fechacreacion') AS app
    WHERE NOT EXISTS (
        SELECT nombre FROM acuerdosbonificaciones WHERE nombre = '$nombre'
    ) LIMIT 1";
    $aux &= $conexion->query($sql);


    $sql = "SELECT id FROM acuerdosbonificaciones WHERE nombre = '$nombre'";
    $tabla = $conexion->query($sql);
    if($tabla->num_rows>0)
      {
      $row = $tabla->fetch_assoc();
      $idacuerdo = $row["id"];

      $numeroBonificaciones = count($acuerdo->xpath("Bonificacion"));

      $k=0;
      while($k<$numeroBonificaciones)
        {
        $idbonificacion = $acuerdo->Bonificacion[$k]->IdBonificacion;

        $sql = "INSERT INTO acuerdosbonificaciones_bonificaciones_actual (idacuerdo,idbonificacion,fechainicio) VALUES ('$idacuerdo','$idbonificacion','$fechainicio')";
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
