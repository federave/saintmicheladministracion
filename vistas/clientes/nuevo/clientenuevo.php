<?php
session_start();
$_SESSION["raiz"] = $_SERVER["DOCUMENT_ROOT"] . '/saintmicheladministracion';
?>

<html lang="en">
<head>
  <title>Saint Michel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../header/header.css">
  <link rel="stylesheet" href="../../estilos/general.css">
  <link rel="stylesheet" href="../../estilos/radiobutton.css">
  <link rel="stylesheet" href="../../estilos/checkbox.css">

  <link rel="stylesheet" href="clientenuevo.css">
  <script src="clientenuevo.js"></script>
  <script src="../../javascript/javascript.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

</head>
<body>








<?php require '../../header/header.php'; ?>


<div class="row" style="width:100%">

  <form class="formularioClienteNuevo" id="formularioClienteNuevo" action="../../../controladores/clientes/clienteNuevo.php">
    <h1>Cliente Nuevo</h1>
    <br>


    <input type="hidden" name="clienteNuevo" id="clienteNuevo" value="">



    <?php require('datosbasicos/datosbasicos.php'); ?>
    <?php require('sede/sede.php'); ?>
    <?php require('asignacion/asignacion.php'); ?>
    <?php require('recorrido/recorrido.php'); ?>


    <div style="overflow:auto;">
      <div style="float:right;">
        <button type="button" id="prevBtnClienteNuevo" onclick="nextPrevClienteNuevo(-1)">Anterior</button>
        <button type="button" id="nextBtnClienteNuevo" onclick="nextPrevClienteNuevo(1)">Siguiente</button>
      </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
      <span class="stepClienteNuevo"></span>
      <span class="stepClienteNuevo"></span>
      <span class="stepClienteNuevo"></span>
      <span class="stepClienteNuevo"></span>
      <span class="stepClienteNuevo"></span>
    </div>

  </form>
</div>




<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTabClienteNuevo(currentTab); // Display the crurrent tab
</script>











<div class="text-center" style="margin-bottom:0;height:500px;padding:20px;">
  <p>Footer</p>
</div>

</body>
</html>
