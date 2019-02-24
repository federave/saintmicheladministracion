<?php

include_once($_SESSION["raiz"] . '/modelo/tablasbasededatos.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$nombreTabla="comodatos";
$comodatosId = array();
$comodatosNombre = array();
$numeroComodatos = 0;

datosTabla("comodatos",$comodatosId,$comodatosNombre,$numeroComodatos);



?>
