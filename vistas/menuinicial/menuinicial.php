
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

  <link rel="stylesheet" href="menuinicial.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="menuinicial.js"></script>

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


<style>
</style>

<br>
<br>
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



<div class="text-center" style="margin-bottom:0;height:2000px;padding:20px;">
  <p></p>
</div>

</body>
</html>
