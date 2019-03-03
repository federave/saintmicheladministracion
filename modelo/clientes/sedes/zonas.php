<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/tablasbasededatos.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$nombreTabla="zonas";
$zonasId = array();
$zonasNombre = array();
$numeroZonas = 0;

datosTabla($nombreTabla,$zonasId,$zonasNombre,$numeroZonas);



?>
