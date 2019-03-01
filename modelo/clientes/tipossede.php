<?php

include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/tablasbasededatos.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$nombreTabla="tipossede";
$tiposSedeId = array();
$tiposSedeNombre = array();
$numeroTiposSede = 0;

datosTablaTipos($nombreTabla,$tiposSedeId,$tiposSedeNombre,$numeroTiposSede);



?>
