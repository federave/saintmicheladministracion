<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/tablasbasededatos.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$nombreTabla="condicionesiva";
$condicionesIvaId = array();
$condicionesIvaNombre = array();
$numeroCondicionesIva = 0;

datosTabla($nombreTabla,$condicionesIvaId,$condicionesIvaNombre,$numeroCondicionesIva);



?>
