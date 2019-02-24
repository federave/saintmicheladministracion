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

    $sql = "SELECT * FROM acuerdosbonificaciones WHERE id = '$id'";
    $tabla = $conexion->query($sql);
    if($tabla->num_rows>0)
      {
      $row = $tabla->fetch_assoc();

      $xml->addTag("Id",$id);
      $xml->addTag("Nombre",$row["nombre"]);
      $xml->addTag("FechaCreacion",$row["fechacreacion"]);

      $sql = "SELECT ab_b_a.idbonificacion,b.nombre FROM acuerdosbonificaciones_bonificaciones_actual as ab_b_a inner join bonificaciones as b on ab_b_a.idbonificacion=b.id WHERE ab_b_a.idacuerdo='$id'";
      $tabla = $conexion->query($sql);
      $k=0;
      if($tabla->num_rows>0)
        {
        while($row = $tabla->fetch_assoc())
          {
          $xml->startTag("Bonificacion");
            $xml->addTag("IdBonificacion",$row["idbonificacion"]);
            $xml->addTag("NombreBonificacion",$row["nombre"]);
          $xml->closeTag("Bonificacion");
          $k++;
          }
        }

      $xml->addTag("NumeroBonificaciones",$k);


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
