<?php
session_start();
?>



<html lang="es">


    <head>
        <title>Productos</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../general.css">

        <link rel="stylesheet" href="productos.css">
        <script src="productos.js"></script>
        <script src="../javascript/javascript.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>


      <?php require '../header/header.php' ?>
      <!-- Tabs -->


      <br>
      <br>

      <div class="row">
        <div class="text-center">
          <h1>Menu Productos</h1>
        </div>
      </div>
      <br>
      <br>
      <br>

      <div class="row" style="width:90%;margin-left:5%" >
        <ul class="nav nav-tabs">
          <li class="active"><a class="items" href="#" onclick="seleccionarTab(0)">Ver Productos</a></li>
          <li class="li"><a class="items" href="#" onclick="seleccionarTab(1)">Nuevo Producto</a></li>
          <li class="li"><a class="items" href="#" onclick="seleccionarTab(2)">Modificar Producto</a></li>
        </ul>
      </div>

      <br>

      <div class="row divTab " style="display:block">

        <?php require('verproductos/verproductos.php'); ?>

      </div>



      <div class="row divTab">
        <?php // require('nuevoproducto/nuevoproducto.php'); ?>
      </div>



      <div class="row divTab">
        <?php  // require('modificarproducto/modificarproducto.php'); ?>
      </div>





      <footer style="height:500px"></footer>





    </body>

</html>
