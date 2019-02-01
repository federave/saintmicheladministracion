<?php
session_start();
?>



<html lang="es">


    <head>
        <title>Cliente ...</title>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../general.css">

        <link rel="stylesheet" href="cliente.css">
        <script src="cliente.js"></script>
        <script src="../../javascript/javascript.js"></script>

    </head>

    <body>


      <?php require '../../header/header.php' ?>
      <!-- Tabs -->


      <br>
      <br>

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
          <li name="liModificarCliente" class="li"><a class="items" href="#" onclick="seleccionarTabModificarCliente(2)">Asignación</a></li>
          <li name="liModificarCliente" class="li"><a class="items" href="#" onclick="seleccionarTabModificarCliente(3)">Acuerdos</a></li>
          <li name="liModificarCliente" class="li"><a class="items" href="#" onclick="seleccionarTabModificarCliente(4)">Seguimiento</a></li>
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
        <?php require('asignacion/asignacion.php'); ?>
      </div>
      <div name="divTabModificarCliente" class="row divTabModificarCliente">
        <p><strong>Note:</strong>Acuerdos</p>
      </div>

      <div name="divTabModificarCliente" class="row divTabModificarCliente">
        <p><strong>Note:</strong>Seguimiento</p>
      </div>





      <footer style="height:500px"></footer>





    </body>

</html>
