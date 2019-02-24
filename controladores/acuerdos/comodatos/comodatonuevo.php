<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

if(isset($_GET["comodatoNuevo"]))
  {

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $aux = true;



    $comodato = new SimpleXMLElement($_GET["comodatoNuevo"]);
    date_default_timezone_set("America/Argentina/Buenos_Aires");

    $nombre = $comodato->Nombre;

    $date = new DateTime();
    $fechacreacion = $date->format('Y-m-d');


    $sql = "INSERT INTO comodatos (nombre,especial,fechacreacion)
    SELECT * FROM (SELECT '$nombre',0,'$fechacreacion') AS b
    WHERE NOT EXISTS (
        SELECT nombre FROM comodatos WHERE nombre = '$nombre'
    ) LIMIT 1";
    $aux &= $conexion->query($sql);


    $sql = "SELECT id FROM comodatos WHERE nombre = '$nombre'";
    $tabla = $conexion->query($sql);
    if($tabla->num_rows>0)
      {

      $row = $tabla->fetch_assoc();
      $idcomodato = $row["id"];
      $fechainicio=$fechacreacion;

      $numeroCondiciones = count($comodato->xpath("Condicion"));
      $k=0;
      while($k<$numeroCondiciones)
        {
        $idcondicion = $comodato->Condicion[$k]->IdCondicion;
        $sql = "INSERT INTO comodatos_condicionescomodatos_actual(idcomodato,idcondicion,fechainicio) VALUES ('$idcomodato','$idcondicion','$fechainicio')";
        $aux &= $conexion->query($sql);
        $k++;
        }


      $numeroMaquinas = count($comodato->xpath("Maquina"));

      $k=0;
      while($k<$numeroMaquinas)
        {
        $idmaquina = $comodato->Maquina[$k]->IdMaquina;
        $cantidad = $comodato->Maquina[$k]->CantidadMaquina;
        $sql = "INSERT INTO comodatos_maquinas_actual(idcomodato,idmaquina,cantidad,fechainicio) VALUES ('$idcomodato','$idmaquina','$cantidad','$fechainicio')";
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
