
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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="configuracion.js"></script>

  <link rel="stylesheet" href="../header/header.css">
  <link rel="stylesheet" href="../estilos/general.css">



  <style>
  .fakeimg {
      height: 200px;
      background: #aaa;
  }
  </style>
</head>
<body>

  <?php require '../header/header.php'; ?>



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



  <footer style="height:1000px"></footer>


</body>
</html>
