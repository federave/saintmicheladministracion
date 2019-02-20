<?php
session_start();
if(isset($_SESSION["raiz"]))
  {
  include_once($_SESSION["raiz"] . '/modelo/acceso.php');
  verificarAcceso();
  }
else
  {
  include_once('../../modelo/otros.php');
  redirect('../../vistas/errores/errordeacceso.php');
  }
?>



<html lang="es">


    <head>
        <title>Productos</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../estilos/general.css">

        <link rel="stylesheet" href="productos.css">
        <script src="productos.js"></script>
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
          <li name="liProductos" class="active"><a class="items" href="#" onclick="seleccionarTab(0)">Ver Productos</a></li>
          <li name="liProductos" class="li"><a class="items" href="#" onclick="seleccionarTab(1)">Nuevo Producto</a></li>
          <li name="liProductos" class="li"><a class="items" href="#" onclick="seleccionarTab(2)">Modificar Producto</a></li>
        </ul>
      </div>

      <br>

      <div name="tabProductos" class="row divTabProductos" style="display:block">
        <?php require('verproductos/verproductos.php'); ?>
      </div>



      <div name="tabProductos"class="row divTabProductos">
        <?php  require('nuevoproducto/nuevoproducto.php'); ?>
      </div>



      <div name="tabProductos" class="row divTabProductos">
        <?php   require('modificarproducto/modificarproducto.php'); ?>
      </div>





      <footer style="height:500px"></footer>





    </body>

</html>
