<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/tablasbasededatos.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$nombreTabla="asignaciones";
$asignacionesId = array();
$asignacionesNombre = array();
$numeroAsignaciones = 0;

datosTabla($nombreTabla,$asignacionesId,$asignacionesNombre,$numeroAsignaciones);



?>
