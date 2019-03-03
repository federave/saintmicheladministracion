<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/tablasbasededatos.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$nombreTabla="dias";
$diasId = array();
$diasNombre = array();
$numeroDias = 0;

datosTabla($nombreTabla,$diasId,$diasNombre,$numeroDias);



?>
