<?php session_start(); ?>



<html lang="es">


    <head>
        <title>Maquinas</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../estilos/general.css">

        <link rel="stylesheet" href="maquinas.css">
        <script src="maquinas.js"></script>
        <script src="../javascript/javascript.js"></script>
        <!-- Para las alertas  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!--        -->

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
          <li name="liMaquinas" class="active"><a class="items" href="#" onclick="seleccionarTabMaquinas(0)">Ver Maquinas</a></li>
          <li name="liMaquinas" class="li"><a class="items" href="#" onclick="seleccionarTabMaquinas(1)">Nueva Maquina</a></li>
          <li name="liMaquinas" class="li"><a class="items" href="#" onclick="seleccionarTabMaquinas(2)">Modificar Maquina</a></li>
        </ul>
      </div>

      <br>

      <div name="tabMaquinas" class="row divTabMaquinas" style="display:block">
        <?php require('vermaquinas/vermaquinas.php'); ?>
      </div>



      <div name="tabMaquinas"class="row divTabMaquinas">
        <?php  require('nuevamaquina/nuevamaquina.php'); ?>
      </div>



      <div name="tabMaquinas" class="row divTabMaquinas">
        <?php   require('modificarmaquina/modificarmaquina.php'); ?>
      </div>





      <footer style="height:500px"></footer>





    </body>

</html>
