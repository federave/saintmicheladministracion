<?php
session_start();
?>



<html lang="es">


    <head>
        <title>Comodatos</title>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../estilos/general.css">
        <link rel="stylesheet" href="../../estilos/menutabs.css">

        <link rel="stylesheet" href="comodatos.css">
        <script src="comodatos.js"></script>
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
          <h1>Menú Comodatos</h1>
        </div>
      </div>
      <br>
      <br>
      <br>
      <?php $nombre="Comodatos";?>
      <div class="row menutabs" >
        <ul class="nav nav-tabs">
          <li name="liComodatos" class="active"><a class="items" href="#" onclick="seleccionarTab(0,'<?php echo $nombre;?>')">Ver Comodatos</a></li>
          <li name="liComodatos" class="li"><a class="items" href="#" onclick="seleccionarTab(1,'<?php echo $nombre;?>')">Nuevo Comodato</a></li>
          <li name="liComodatos" class="li"><a class="items" href="#" onclick="seleccionarTab(2,'<?php echo $nombre;?>')">Modificar Comodato</a></li>
          <li name="liComodatos" class="li"><a class="items" href="#" onclick="seleccionarTab(3,'<?php echo $nombre;?>')">Ver Condiciones</a></li>
          <li name="liComodatos" class="li"><a class="items" href="#" onclick="seleccionarTab(4,'<?php echo $nombre;?>')">Nueva Condicion</a></li>
        </ul>
      </div>


      <br>

      <div name="tabComodatos" class="row divTab" style="display:block">
        <?php require('vercomodatos/vercomodatos.php'); ?>
      </div>

      <div name="tabComodatos" class="row divTab">
        <?php  require('nuevocomodato/nuevocomodato.php'); ?>
      </div>
      <div name="tabComodatos" class="row divTab"  >
        <?php  require('modificarcomodato/modificarcomodato.php'); ?>
      </div>
      <div name="tabComodatos" class="row divTab"  >
        <?php  require('vercondiciones/vercondiciones.php'); ?>
      </div>
      <div name="tabComodatos" class="row divTab"  >
        <?php  require('nuevacondicion/nuevacondicion.php'); ?>
      </div>
      <footer style="height:500px"></footer>





    </body>

</html>
