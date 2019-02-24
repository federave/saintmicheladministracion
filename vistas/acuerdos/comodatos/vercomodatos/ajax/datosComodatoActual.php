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

    $sql = "SELECT * FROM comodatos WHERE id = '$id'";
    $tabla = $conexion->query($sql);
    if($tabla->num_rows>0)
      {
      $row = $tabla->fetch_assoc();
      $idcomodato = $row["id"];
      $xml->addTag("Id", $row["id"]);
      $xml->addTag("Nombre", $row["nombre"]);
      $xml->addTag("Especial", $row["especial"]);
      $xml->addTag("FechaCreacion", $row["fechacreacion"]);

      $sql = "SELECT c_cc_a.idcondicion,cc.nombre FROM comodatos_condicionescomodatos_actual as c_cc_a inner join condicionescomodatos as cc on c_cc_a.idcondicion=cc.id WHERE c_cc_a.idcomodato='$idcomodato'";
      $tabla = $conexion->query($sql);
      $k=0;
      if($tabla->num_rows>0)
        {
        while($row = $tabla->fetch_assoc())
          {
          $xml->startTag("Condicion");
            $xml->addTag("IdCondicion",$row["idcondicion"]);
            $xml->addTag("NombreCondicion",$row["nombre"]);
          $xml->closeTag("Condicion");
          $k++;
          }
        }
      $xml->addTag("NumeroCondiciones",$k);



      $sql = "SELECT c_m_a.idmaquina,c_m_a.cantidad,m.nombre FROM comodatos_maquinas_actual as c_m_a inner join maquinas as m on c_m_a.idmaquina=m.id WHERE c_m_a.idcomodato='$idcomodato'";
      $tabla = $conexion->query($sql);
      $k=0;
      if($tabla->num_rows>0)
        {
        while($row = $tabla->fetch_assoc())
          {
          $xml->startTag("Maquina");
            $xml->addTag("IdMaquina",$row["idmaquina"]);
            $xml->addTag("NombreMaquina",$row["nombre"]);
            $xml->addTag("CantidadMaquina",$row["cantidad"]);
          $xml->closeTag("Maquina");
          $k++;
          }
        }
      $xml->addTag("NumeroMaquinas",$k);


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
