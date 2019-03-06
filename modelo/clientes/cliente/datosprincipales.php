<?php
include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();


$conector = new Conector();
if($conector->abrirConexion())
  {
  $conexion = $conector->getConexion();

  $sql = "SELECT * FROM clientes WHERE id='$idcliente'";
  $tabla = $conexion->query($sql);
  if($tabla->num_rows>0)
    {
    $row = $tabla->fetch_assoc();

    $nombre = $row["nombre"];
    $email = $row["email"];
    $telefono = $row["telefono"];
    $razonsocial = $row["razonsocial"];
    $cuit = $row["cuit"];
    $idcondicioniva = $row["idcondicioniva"];
    $idtipocliente = $row["idtipocliente"];
    $idrazondecompra = $row["idrazondecompra"];



    }

  $aux = true;

  $conector->cerrarConexion();
  }

?>
