
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


<html lang="en">
<head>
  <title>Saint Michel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="menuinicial.js"></script>
  <script src="navegador.js"></script>

  <link rel="stylesheet" href="../header/header.css">
  <link rel="stylesheet" href="../estilos/general.css">
  <link rel="stylesheet" href="../estilos/tema.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="navegador.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">



<!--   <link rel="stylesheet" href="menuinicial.css">
 -->


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

<br>
<br>


<br><br>



<script type="text/javascript">
$(document).ready(function () {
$('.navbar-light .dmenu').hover(function () {
      $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
  }, function () {
      $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
  });
});

</script>






<nav class="navbar navbar-expand-sm   navbar-light bg-light navfondo">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03" style="padding: 20px;">

      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

        <li class="nav-item">
          <a class="nav-link" href="#">Saint Michel <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item dropdown dmenu">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Clientes</a>
          <div class="dropdown-menu sm-menu items">
            <a class="dropdown-item" href="../clientes/nuevo/clientenuevo.php">Nuevo</a>
            <a class="dropdown-item" href="../clientes/buscador/buscador.php">Buscar</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../mapas/mapa/mapa.php">Mapas</a>


        </li>
        <li class="nav-item">
          <a class="nav-link" href="../productos/productos.php">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../maquinas/maquinas.php">Maquinas</a>
        </li>

        <li class="nav-item dropdown dmenu">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Acuerdos</a>
        <div class="dropdown-menu sm-menu items">
          <a class="dropdown-item" href="../acuerdos/preciosproductos/preciosproductos.php">Precios Productos</a>
          <a class="dropdown-item" href="../acuerdos/alquileres/alquileres.php">Alquileres</a>
          <a class="dropdown-item" href="../acuerdos/comodatos/comodatos.php">Comodatos</a>
          <a class="dropdown-item" href="../acuerdos/bonificaciones/bonificaciones.php">Bonificaciones</a>
        </div>
        </li>

        <li class="nav-item dropdown dmenu">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Pedidos</a>
        <div class="dropdown-menu sm-menu items">
          <a class="dropdown-item" href="../pedidos/nuevopedido/nuevopedido.php">Nuevo Pedido</a>
          <a class="dropdown-item" href="../pedidos/promociones/promociones.php">Promociones</a>
          <a class="dropdown-item" href="../pedidos/tiposrechazos/tiposrechazos.php">Tipos Rechazos</a>
        </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../configuracion/configuracion.php">Configuración</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../pruebas/prueba.php">Pruebas</a>
        </li>

       <!-- <li class="nav-item dropdown dmenu">
       <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
         Dropdown link
       </a>
       <div class="dropdown-menu sm-menu">
         <a class="dropdown-item" href="#">Link 1</a>
         <a class="dropdown-item" href="#">Link 2</a>
         <a class="dropdown-item" href="#">Link 3</a>
         <a class="dropdown-item" href="#">Link 4</a>
         <a class="dropdown-item" href="#">Link 5</a>
         <a class="dropdown-item" href="#">Link 6</a>
       </div>
      </li>
       -->
      </ul>
      <!--
      <form class="navbar-form navbar-left">
         <div class="row">
           <div class="column-50">
             <input type="text" class="form-control" placeholder="Buscar">
           </div>
           <div class="column-50">
              <button type="submit" class="btn btn-default">Buscar</button>
           </div>
         </div>
       </form>
     -->

      <!--
      <div class="social-part">
        <i class="fa fa-facebook" aria-hidden="true"></i>
        <i class="fa fa-twitter" aria-hidden="true"></i>
        <i class="fa fa-instagram" aria-hidden="true"></i>
      </div>
      -->
    </div>
  </nav>













<div class="text-center" style="margin-bottom:0;height:2000px;padding:20px;">
  <p></p>
</div>

</body>
</html>







<!--

<div class="topnav" id="myTopnav">
  <a href="#home" class="active">Saint Michel</a>
  <div class="dropdown">
    <button class="dropbtn">Clientes
      <i class="fa fa-caret-down"></i>
    </button>

    <div class="dropdown-content">
      <a href="../clientes/nuevo/clientenuevo.php">Nuevo</a>
      <a href="../clientes/cliente/cliente.php">Modificar</a>
      <a href="../clientes/buscador/buscador.php">Buscar</a>
    </div>
  </div>
  <a href="../mapas/mapa/mapa.php">Mapas</a>
  <a href="../productos/productos.php">Productos</a>
  <a href="../maquinas/maquinas.php">Maquinas</a>

  <div class="dropdown">
    <button class="dropbtn">Acuerdos
      <i class="fa fa-caret-down"></i>
    </button>

    <div class="dropdown-content">
      <a href="../acuerdos/preciosproductos/preciosproductos.php">Precios Productos</a>
      <a href="../acuerdos/alquileres/alquileres.php">Alquileres</a>
      <a href="../acuerdos/comodatos/comodatos.php">Comodatos</a>
      <a href="../acuerdos/bonificaciones/bonificaciones.php">Bonificaciones</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Pedidos
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../pedidos/nuevopedido/nuevopedido.php">Nuevo Pedido</a>
      <a href="../pedidos/promociones/promociones.php">Promociones</a>
      <a href="../pedidos/tiposrechazos/tiposrechazos.php">Tipos Rechazos</a>
    </div>
  </div>
  <a href="../configuracion/configuracion.php">Configuración</a>
  <a href="../pruebas/prueba.php">Pruebas</a>
  <a href="#about">About</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">☰</a>
</div>

-->
