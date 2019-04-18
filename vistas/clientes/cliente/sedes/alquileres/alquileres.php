
<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/alquileres/alquileres.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/alquileres/alquileres.js"></script>

<?php

$estadoAlquiler=true;
$idAlquilerActual=1;
$nombreAlquilerActual="6 Bidones de 20L";
$precioAlquilerActual=1400;


$productosIdAlquilerActual = array();
$productosIdAlquilerActual[0] = 0;
$productosIdAlquilerActual[1] = 1;


$productosNombreAlquilerActual = array();
$productosNombreAlquilerActual[0] = "Bidón 20L";
$productosNombreAlquilerActual[1] = "Bidón 12L";

$productosCantidadAlquilerActual = array();
$productosCantidadAlquilerActual[0] = 8;
$productosCantidadAlquilerActual[1] = 6;

$maquinasNombreAlquilerActual = array();
$maquinasNombreAlquilerActual[0] = "Heladera";
$maquinasNombreAlquilerActual[1] = "Dispenser";

$maquinasCantidadAlquilerActual = array();
$maquinasCantidadAlquilerActual[0] = 1;
$maquinasCantidadAlquilerActual[1] = 2;



?>

<div class="contenedoralquileres">

      <br>
      <br>

      <div class="row">
        <div class="text-center">
          <h1 id="labelEstadoAlquiler" style="color:white">Alquiler Actual</h1>
        </div>
      </div>
      <br>
      <br>

      <div id="divAlquilerActual" class="row text-center borde" style="width:80%;margin:auto">

        <br>
        <label class="labelAlquilerActual" id="labelNombreAlquiler">Nombre: </label>
        <br>
        <label class="labelAlquilerActual" id="labelPrecioAlquiler">Precio: </label>
        <br>
        <br>        
        <label class="labelAlquilerActual">Productos</label>
        <br>
        <div class="row" id="divProductosAlquiler">
        </div>
        <br>
        <label class="labelAlquilerActual">Maquinas</label>
        <br>
        <div class="row" id="divMaquinasAlquiler">
        </div>

      </div>

      <br>
      <br>
      <br>
      <br>

      <div class="row" style="width:90%;margin-left:5%" >
        <ul class="nav nav-tabs">
          <li name="liAlquileres" class="active"><a class="items"  onclick="seleccionarTabAlquileres(0)">Seleccionar Alquiler</a></li>
          <li name="liAlquileres" class="li"><a class="items"  onclick="seleccionarTabAlquileres(1)">Crear Alquiler Especial</a></li>
        </ul>
      </div>

      <br>

      <div name="tabAlquileres" class="row divTabAlquileres" style="display:block">
        <?php  require('seleccionaralquiler/seleccionaralquiler.php'); ?>
      </div>
      <div name="tabAlquileres" class="row divTabAlquileres">
        <?php  require('nuevoalquilerespecial/nuevoalquiler.php'); ?>
      </div>


    </div>
