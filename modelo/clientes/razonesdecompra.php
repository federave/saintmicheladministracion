<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/tablasbasededatos.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$nombreTabla="razonesdecompra";
$razonesDeCompraId = array();
$razonesDeCompraNombre = array();
$numeroRazonesDeCompra = 0;

datosTabla($nombreTabla,$razonesDeCompraId,$razonesDeCompraNombre,$numeroRazonesDeCompra);



?>
