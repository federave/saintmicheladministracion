<?php
session_start();
?>



<html lang="es">


    <head>
        <title>Comodatos</title>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../general.css">

        <link rel="stylesheet" href="comodatos.css">
        <script src="comodatos.js"></script>
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
          <h1>Menu Comodatos</h1>
        </div>
      </div>
      <br>
      <br>
      <br>

      <div class="row" style="width:90%;margin-left:5%" >
        <ul class="nav nav-tabs">
          <li name="liComodatos" class="active"><a class="items" href="#" onclick="seleccionarTabComodatos(0)">Ver Comodatos</a></li>
          <li name="liComodatos" class="li"><a class="items" href="#" onclick="seleccionarTabComodatos(1)">Nuevo Comodato</a></li>
          <li name="liComodatos" class="li"><a class="items" href="#" onclick="seleccionarTabComodatos(2)">Modificar Comodato</a></li>
        </ul>
      </div>




      <br>

      <div name="tabComodatos" class="row divTabComodatos" style="display:block">
        <?php require('vercomodatos/vercomodatos.php'); ?>
      </div>

      <div name="tabComodatos" class="row divTabComodatos">
        <?php  require('nuevocomodato/nuevocomodato.php'); ?>
      </div>
      <div name="tabComodatos" class="row divTabComodatos"  >
        <?php  require('modificarcomodato/modificarcomodato.php'); ?>
      </div>
      <footer style="height:500px"></footer>





    </body>

</html>
