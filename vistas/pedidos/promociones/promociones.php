<?php
session_start();
?>



<html lang="es">


    <head>
        <title>Promociones</title>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../estilos/general.css">

        <link rel="stylesheet" href="promociones.css">
        <script src="promociones.js"></script>
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
          <h1 class="colorFuente">Menu Promociones</h1>
        </div>
      </div>
      <br>
      <br>
      <br>

      <div class="row" style="width:90%;margin-left:5%" >
        <ul class="nav nav-tabs">
          <li name="liPromociones" class="active"><a class="items" href="#" onclick="seleccionarTabPromociones(0)">Ver Promociones</a></li>
          <li name="liPromociones" class="li"><a class="items" href="#" onclick="seleccionarTabPromociones(1)">Nueva Promoción</a></li>
        </ul>
      </div>

      <br>

      <div name="tabPromociones" class="row divTabPromociones" style="display:block">
        <?php require('verpromociones/verpromociones.php'); ?>
      </div>
      <div name="tabPromociones" class="row divTabPromociones">
        <?php  require('nuevapromocion/nuevapromocion.php'); ?>
      </div>


      <footer style="height:500px"></footer>





    </body>

</html>
