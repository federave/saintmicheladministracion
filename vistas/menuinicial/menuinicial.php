
<?php
session_start();
?>


<html lang="en">
<head>
  <title>Saint Michel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="menuinicial.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="menuinicial.js"></script>

  <link rel="stylesheet" href="../header/header.css">
  <link rel="stylesheet" href="../general.css">



  <style>
  .fakeimg {
      height: 200px;
      background: #aaa;
  }
  </style>
</head>
<body>


<?php require '../header/header.php'; ?>


<style>




</style>
<div class="topnav" id="myTopnav">
  <a href="#home" class="active">Saint Michel</a>
  <div class="dropdown">
    <button class="dropbtn">Clientes
      <i class="fa fa-caret-down"></i>
    </button>

    <div class="dropdown-content">
      <a href="../clientes/nuevo/clientenuevo.php">Nuevo</a>
      <a href="../clientes/cliente/cliente.php">Modificar</a>
      <a href="#l3">Buscar</a>
    </div>
  </div>
  <a href="../mapas/mapa/mapa.php">Mapas</a>
  <a href="../pruebas/prueba.php">Pruebas</a>
  <a href="#about">About</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">☰</a>
</div>






<div class="container" style="margin-top:30px">
  <div class="row">

    <div class="col-sm-4">
      <h2>About Me</h2>
      <h5>Photo of me:</h5>
      <div class="fakeimg">Fake Image</div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
      <h3>Some Links</h3>
      <p>Lorem ipsum dolor sit ame.</p>
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="#">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
      <hr class="d-sm-none">
    </div>

    <div class="col-sm-8">
      <h2>TITLE HEADING</h2>
      <h5>Title description, Dec 7, 2017</h5>
      <div class="fakeimg">Fake Image</div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
      <br>
      <h2>TITLE HEADING</h2>
      <h5>Title description, Sep 2, 2017</h5>
      <div class="fakeimg">Fake Image</div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>

  </div>
</div>

<div class="text-center" style="margin-bottom:0;height:500px;padding:20px;">
  <p>Footer</p>
</div>

</body>
</html>
