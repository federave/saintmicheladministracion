<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

escribir("1");

if(isset($_GET["idsede"]) && isset($_GET["asignacion"]))
  {
  $xml = new XML();
  $aux=false;
  escribir("2");

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();


    $asignacion = new SimpleXMLElement($_GET["asignacion"]);
    $idsede = $_GET["idsede"];
    escribir("3");

    $idasignacion = $asignacion->IdAsignacion;
    if($idasignacion == 1)
      {
      $idtrabajador = NULL;
      }
    else if($idasignacion == 2)
      {
      $idtrabajador = $asignacion->IdRepartidorAsignado;
      }
    else
      {
      $idtrabajador = $asignacion->IdVendedorAsignado;
      }

    $sql = "UPDATE sedes SET idasignacion='$idasignacion',idtrabajador='$idtrabajador' WHERE id='$idsede'";
    $aux = $conexion->query($sql);


    $sql = "DELETE FROM recorridos_sedes WHERE idsede='$idsede'";
    $aux = $conexion->query($sql);


    //Recorrido

    $numero = count($asignacion->xpath("Dia"));
    $k=0;
    while($k<$numero)
      {
      $iddia = $asignacion->Dia[$k]->IdDia;
      if($idasignacion==1)
        {
        $idtrabajador = $asignacion->Dia[$k]->IdRepartidorDia;
        }
      $sql = "INSERT INTO recorridos_sedes(idsede,idtrabajador,iddia) VALUES ('$idsede','$idtrabajador','$iddia')";
      $aux &= $conexion->query($sql);
      $k++;
      }





    /*
    $sql = "UPDATE Direcciones SET calle='$nombre' WHERE id='$id'";
    $aux = $conexion->query($sql);
    */
    $aux = true;

    $conector->cerrarConexion();
    }

  $xml->addTag("Estado",$aux);

  echo $xml->toString();
  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }




?>
