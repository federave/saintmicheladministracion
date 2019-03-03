<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/tablasbasededatos.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$nombreTabla="partidos";
$partidosId = array();
$partidosNombre = array();
$numeroPartidos = 0;

datosTabla($nombreTabla,$partidosId,$partidosNombre,$numeroPartidos);



?>
