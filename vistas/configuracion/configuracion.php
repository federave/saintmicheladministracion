
<?php
session_start();
?>


<html lang="en">
<head>
  <title>Configuracion</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="configuracion.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Para las alertas  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!--        -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="configuracion.js"></script>
  <script src="../javascript/javascript.js"></script>

  <link rel="stylesheet" href="../header/header.css">
  <link rel="stylesheet" href="../estilos/general.css">
  <link rel="stylesheet" href="../estilos/menutabs.css">



  <style>
  .fakeimg {
      height: 200px;
      background: #aaa;
  }
  </style>
</head>
<body>

  <?php require '../header/header.php'; ?>

  <br>
  <br>

  <div class="row">
    <div class="text-center">
      <h1 class="colorFuente">Menu Configuración</h1>
    </div>
  </div>
  <br>
  <br>
  <br>

  <div class="row menutabs">
    <ul class="nav nav-tabs">
      <li name="liConfiguracion" class="active"><a class="items" href="#" onclick="seleccionarTabConfiguracion(0)">Base De Datos</a></li>
    </ul>
  </div>

  <br>

  <div name="tabConfiguracion" class="row divTab" style="display:block">
    <?php require('basededatos/basededatos.php'); ?>
  </div>



  <footer style="height:1000px"></footer>


</body>
</html>
