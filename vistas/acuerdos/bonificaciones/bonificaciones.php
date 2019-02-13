<?php
session_start();
?>



<html lang="es">


    <head>
        <title>Bonificaciones</title>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../estilos/general.css">

        <link rel="stylesheet" href="bonificaciones.css">
        <script src="bonificaciones.js"></script>
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
          <h1>Menu Bonificaciones</h1>
        </div>
      </div>
      <br>
      <br>
      <br>

      <div class="row" style="width:90%;margin-left:5%" >
        <ul class="nav nav-tabs">
          <li name="liBonificaciones" class="active"><a class="items" href="#" onclick="seleccionarTabBonificaciones(0)">Ver Acuerdos</a></li>
          <li name="liBonificaciones" class="li"><a class="items" href="#" onclick="seleccionarTabBonificaciones(1)">Nuevo Acuerdo</a></li>
          <li name="liBonificaciones" class="li"><a class="items" href="#" onclick="seleccionarTabBonificaciones(2)">Ver Bonificaciones</a></li>
          <li name="liBonificaciones" class="li"><a class="items" href="#" onclick="seleccionarTabBonificaciones(3)">Nueva Bonificacion</a></li>

        </ul>
      </div>

      <br>

      <div name="tabBonificaciones" class="row divTabBonificaciones" style="display:block">

        <?php require('veracuerdos/veracuerdos.php'); ?>

      </div>



      <div name="tabBonificaciones" class="row divTabBonificaciones">
        <?php require('nuevoacuerdo/nuevoacuerdo.php'); ?>
      </div>



      <div name="tabBonificaciones" class="row divTabBonificaciones">
        <?php require('verbonificaciones/verbonificaciones.php'); ?>
      </div>


      <div name="tabBonificaciones" class="row divTabBonificaciones">
        <?php require('nuevabonificacion/nuevabonificacion.php'); ?>
      </div>



      <footer style="height:500px"></footer>





    </body>

</html>
