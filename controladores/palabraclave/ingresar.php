<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');


if(isset($_POST["palabraclave"]))
{

$palabraclave=$_POST["palabraclave"];

$conector = new Conector();
if($conector->abrirConexion())
  {
  $conexion = $conector->getConexion();
  $sql = "SELECT * FROM palabrasclaves WHERE palabra = '$palabraclave'";
  $tabla = $conexion->query($sql);

  if($tabla->num_rows>0)
    {
    $_SESSION["palabraclave"] = $_POST["palabraclave"];
    redirect('../../vistas/login/login.php');
    }
  else
    {
    redirect('../../vistas/palabraclave/palabraclave.php');
    }
  }
}
else
  {
  echo "ERROR";
  }


?>
