<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');

include_once($_SESSION["raiz"] . '/modelo/tablasbasededatos.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$nombreTabla="tiposcliente";
$tiposClienteId = array();
$tiposClienteNombre = array();
$numeroTiposCliente = 0;

datosTablaTipos($nombreTabla,$tiposClienteId,$tiposClienteNombre,$numeroTiposCliente);



?>
