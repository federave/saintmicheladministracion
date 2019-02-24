<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
$xml = new XML();
$xml->startTag("Respuesta");

if(verificarUsuario($_SESSION["usuario"],$_SESSION["password"]) && isset($_GET["acuerdoBonificacionesNuevo"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();


    $acuerdo = new SimpleXMLElement($_GET["acuerdoNuevo"]);
    date_default_timezone_set("America/Argentina/Buenos_Aires");

    $nombre = $acuerdo->Nombre;
    $especial = 0;
    $date = new DateTime();
    $fechacreacion = $date->format('Y-m-d');
    $fechainicio = $date->format('Y-m-d H:i:s');

    $sql = "INSERT INTO acuerdospreciosproductos (nombre,especial,fechacreacion)
    SELECT * FROM (SELECT '$nombre','$especial','$fechacreacion') AS app
    WHERE NOT EXISTS (
        SELECT nombre FROM acuerdospreciosproductos WHERE nombre = '$nombre'
    ) LIMIT 1";
    $aux &= $conexion->query($sql);


    $sql = "SELECT id FROM acuerdospreciosproductos WHERE nombre = '$nombre'";
    $tabla = $conexion->query($sql);
    if($tabla->num_rows>0)
      {
      $row = $tabla->fetch_assoc();
      $idacuerdo = $row["id"];

      $numeroProductos = count($acuerdo->xpath("Producto"));

      $k=0;
      while($k<$numeroProductos)
        {
        $idproducto = $acuerdo->Producto[$k]->IdProducto;
        $precio = $acuerdo->Producto[$k]->Precio;

        $sql = "INSERT INTO acuerdospreciosproductos_productos_actual (idacuerdo,idproducto,precio,fechainicio) VALUES ('$idacuerdo','$idproducto','$precio','$fechainicio')";
        $aux &= $conexion->query($sql);

        $k++;
        }
      }


    redirect('../../../vistas/acuerdos/bonificaciones/bonificaciones.php');



    $aux = true;

    $conector->cerrarConexion();
    }


  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }





?>
