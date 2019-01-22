<?php
session_start();
?>



<html lang="es">


    <head>
        <title>Precios Productos</title>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../general.css">

        <link rel="stylesheet" href="preciosproductos.css">
        <script src="preciosproductos.js"></script>
        <script src="../../javascript/javascript.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>


      <?php require '../../header/header.php' ?>
      <!-- Tabs -->


      <br>
      <br>

      <div class="row">
        <div class="text-center">
          <h1>Menu Precios Productos</h1>
        </div>
      </div>
      <br>
      <br>
      <br>

      <div class="row" style="width:90%;margin-left:5%" >
        <ul class="nav nav-tabs">
          <li name="liPreciosProductos" class="active"><a class="items" href="#" onclick="seleccionarTabPreciosProductos(0)">Ver Acuerdos</a></li>
          <li name="liPreciosProductos" class="li"><a class="items" href="#" onclick="seleccionarTabPreciosProductos(1)">Modificar Acuerdo</a></li>
          <li name="liPreciosProductos" class="li"><a class="items" href="#" onclick="seleccionarTabPreciosProductos(2)">Nuevo Acuerdo</a></li>
        </ul>
      </div>

      <br>

      <div name="tabPreciosProductos" class="row divTabPreciosProductos" style="display:block">
        <?php require('veracuerdos/veracuerdos.php'); ?>
      </div>

      <div name="tabPreciosProductos" class="row divTabPreciosProductos">
        <?php  require('modificaracuerdo/modificaracuerdo.php'); ?>
      </div>


      <div name="tabPreciosProductos" class="row divTabPreciosProductos">
        <?php  require('nuevoacuerdo/nuevoacuerdo.php'); ?>
      </div>

      <footer style="height:500px"></footer>





    </body>

</html>
