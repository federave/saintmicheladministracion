<?php
session_start();

$idcliente = $_GET["idcliente"];
$idsede = $_GET["idsede"];


?>



<html lang="es">


    <head>
        <title>Cliente ...</title>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../estilos/general.css">

        <link rel="stylesheet" href="cliente.css">
        <script src="cliente.js"></script>
        <script src="../../javascript/javascript.js"></script>
        <!-- Para las alertas  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!--        -->
    </head>

    <body>


      <?php require '../../header/header.php' ?>
      <?php require '../../mapas/mapa/mapa.php' ?>

      <!-- Tabs -->


      <br>
      <br>



      <input type="hidden" name="idCliente" id="idCliente" value="1">


      <div class="row">
        <div class="text-center">
          <h1>Cliente ... </h1>
        </div>
      </div>
      <br>

      <div class="row" style="width:90%;margin-left:5%" >
        <ul class="nav nav-tabs">
          <li name="liModificarCliente" class="active"><a class="items" href="#" onclick="seleccionarTabModificarCliente(0)">Datos Principales</a></li>
          <li name="liModificarCliente" class="li"><a class="items" href="#" onclick="seleccionarTabModificarCliente(1)">Sedes</a></li>
          <li name="liModificarCliente" class="li"><a class="items" href="#" onclick="seleccionarTabModificarCliente(2)">Nueva Sede</a></li>
          <li name="liModificarCliente" class="li"><a class="items" href="#" onclick="seleccionarTabModificarCliente(3)">Acuerdo Precios Productos</a></li>
          <li name="liModificarCliente" class="li"><a class="items" href="#" onclick="seleccionarTabModificarCliente(4)">Acuerdo Bonificaciones</a></li>
        </ul>
      </div>

      <br>

      <div name="divTabModificarCliente" class="row divTabModificarCliente " style="display:block">
        <?php require('datosprincipales/datosprincipales.php'); ?>
      </div>
      <div name="divTabModificarCliente" class="row divTabModificarCliente">
        <?php  require('sedes/sedes.php'); ?>
      </div>
      <div name="divTabModificarCliente" class="row divTabModificarCliente">
        <?php  require('nuevasede/nuevasede.php'); ?>
      </div>
      <div name="divTabModificarCliente" class="row divTabModificarCliente">
        <?php  require('acuerdopreciosproductos/acuerdopreciosproductos.php'); ?>
      </div>
      <div name="divTabModificarCliente" class="row divTabModificarCliente">
        <?php  require('acuerdobonificaciones/acuerdobonificaciones.php'); ?>
      </div>





      <footer style="height:500px"></footer>





    </body>

</html>
