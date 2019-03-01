<?php

include_once($_SESSION["raiz"] . '/modelo/tablasbasededatos.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$nombreTabla="alquileres";
$alquileresId = array();
$alquileresNombre = array();
$numeroAlquileres = 0;

datosTabla($nombreTabla,$alquileresId,$alquileresNombre,$numeroAlquileres);



?>
