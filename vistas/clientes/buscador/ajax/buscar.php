<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$xml = new XML();
$xml->startTag("Respuesta");

if(isset($_GET["dato"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $dato=$_GET["dato"];

    $sql = "SELECT c.id as idcliente ,c.nombre,s.id as idsede,s.nombre as nombresede,d_s.calle,d_s.numero  FROM clientes AS c INNER JOIN sedes AS s ON c.id=s.idcliente INNER JOIN direcciones_sedes AS d_s ON s.id=d_s.idsede
    WHERE c.id LIKE '%$dato%' OR c.nombre LIKE '%$dato%' OR s.nombre LIKE '%$dato%' OR d_s.calle LIKE '%$dato%'";
    $tabla = $conexion->query($sql);
    if($tabla->num_rows>0)
      {
      $k=0;
      if($tabla->num_rows>0)
        {
        while($row = $tabla->fetch_assoc())
          {
          $xml->startTag("Cliente");
            $xml->addTag("Id",$row["idcliente"]);
            $xml->addTag("NombreCliente",$row["nombre"]);
            $xml->addTag("IdSede",$row["idsede"]);
            $xml->addTag("NombreSede",$row["nombresede"]);
            $xml->addTag("Calle",$row["calle"]);
            $xml->addTag("Numero",$row["numero"]);
          $xml->closeTag("Cliente");
          $k++;
          }
        }
      $xml->addTag("NumeroClientes",$k);
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
