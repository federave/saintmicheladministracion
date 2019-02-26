<?php
session_start();
?>



<html lang="es">


    <head>
        <title>Alquileres</title>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../estilos/general.css">
        <link rel="stylesheet" href="../../estilos/menutabs.css">

        <link rel="stylesheet" href="alquileres.css">
        <script src="alquileres.js"></script>
        <script src="../../javascript/javascript.js"></script>
        <script src="../../javascript/menutabs.js"></script>

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
          <h1>Menu Alquileres</h1>
        </div>
      </div>
      <br>
      <br>
      <br>
      <?php $nombre="Alquileres";?>
      <div class="row" style="width:90%;margin-left:5%" >
        <ul class="nav nav-tabs">
          <li name="liAlquileres" class="active"><a class="items" href="#" onclick="seleccionarTab(0,'<?php echo $nombre;?>')">Ver Alquileres</a></li>
          <li name="liAlquileres" class="li"><a class="items" href="#" onclick="seleccionarTab(1,'<?php echo $nombre;?>')">Nuevo Alquiler</a></li>
          <li name="liAlquileres" class="li"><a class="items" href="#" onclick="seleccionarTab(2,'<?php echo $nombre;?>')">Modificar Alquiler</a></li>
        </ul>
      </div>

      <br>

      <div name="tabAlquileres" class="row divTab" style="display:block">
        <?php require('veralquileres/veralquileres.php'); ?>
      </div>

      <div name="tabAlquileres" class="row divTab">
        <?php  require('nuevoalquiler/nuevoalquiler.php'); ?>
      </div>
      <div name="tabAlquileres" class="row divTab"  >
        <?php  require('modificaralquiler/modificaralquiler.php'); ?>
      </div>
      <footer style="height:500px"></footer>





    </body>

</html>
