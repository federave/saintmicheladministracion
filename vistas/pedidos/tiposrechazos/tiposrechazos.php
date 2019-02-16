<?php
session_start();
?>



<html lang="es">


    <head>
        <title>Tipos Rechazos</title>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../estilos/general.css">
        <link rel="stylesheet" href="../../estilos/menutabs.css">

        <link rel="stylesheet" href="tiposrechazos.css">
        <script src="tiposrechazos.js"></script>
        <script src="../../javascript/javascript.js"></script>
        <!-- Para las alertas  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!--        -->

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>


      <?php require '../../header/header.php' ?>
      <!-- Tabs -->


      <br>
      <br>

      <div class="row">
        <div class="text-center">
          <h1 class="colorFuente">Menu Tipos Rechazos</h1>
        </div>
      </div>
      <br>
      <br>
      <br>

      <div class="row menutabs">
        <ul class="nav nav-tabs">
          <li name="liTiposRechazos" class="active"><a class="items" href="#" onclick="seleccionarTabTiposRechazos(0)">Ver Tipos Rechazos</a></li>
          <li name="liTiposRechazos" class="li"><a class="items" href="#" onclick="seleccionarTabTiposRechazos(1)">Nuevo Tipo Rechazo</a></li>
        </ul>
      </div>

      <br>

      <div name="tabTiposRechazos" class="row divTab" style="display:block">
        <?php require('vertiposrechazos/vertiposrechazos.php'); ?>
      </div>
      <div name="tabTiposRechazos" class="row divTab">
        <?php  require('nuevotiporechazo/nuevotiporechazo.php'); ?>
      </div>


      <footer style="height:500px"></footer>





    </body>

</html>
