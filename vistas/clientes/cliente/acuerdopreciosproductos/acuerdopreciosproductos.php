
<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/acuerdopreciosproductos/acuerdopreciosproductos.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/acuerdopreciosproductos/acuerdopreciosproductos.js"></script>

<?php

$estadoAcuerdoActual=true;


$idAcuerdoActual=1;
$nombreAcuerdoActual="Domicilios";


$productosNombre = array();
$productosNombre[0] = "Bidon 20L";
$productosNombre[1] = "Bidon 12L";

$productosPrecio = array();
$productosPrecio[0] = 140;
$productosPrecio[1] = 110;






?>

<div class="contenedoracuerdopreciosproductos">

      <br>
      <br>

      <div class="row">
        <div class="text-center">
          <h1>Acuerdo Actual Precios Productos</h1>
        </div>
      </div>

      <br>
      <br>

      <div id="divAcuerdoActual" class="row text-center">
          <?php if($estadoAcuerdoActual){ ?>
          <label id="nombreAcuerdoActualPreciosProductos" class="labelAcuerdoActual"><?php echo $nombreAcuerdoActual?></label>
          <br>

          <div id="divDatosAcuerdoActual">

            <?php
            $k=0;
            while($k<count($productosNombre))
              {
              ?>
              <label class="labelAcuerdoActual"><?php echo $productosNombre[$k]; ?>: <?php echo $productosPrecio[$k]; ?> $</label>
              <br>
              <?php
              $k++;
              }
            ?>
          </div>

        <?php }else { ?>
          <label class="labelAcuerdoActual">El cliente no tiene asignado un acuerdo</label>
          <div id="divDatosAcuerdoActual">

          </div>
        <?php } ?>

      </div>

      <br>
      <br>
      <br>
      <br>

      <div class="row" style="width:90%;margin-left:5%" >
        <ul class="nav nav-tabs">
          <li name="liAcuerdoPreciosProductos" class="active"><a class="items"  onclick="seleccionarTabAcuerdoPreciosProductos(0)">Seleccionar Acuerdo</a></li>
          <li name="liAcuerdoPreciosProductos" class="li"><a class="items"  onclick="seleccionarTabAcuerdoPreciosProductos(1)">Crear Acuerdo Especial</a></li>
        </ul>
      </div>

      <br>

      <div name="tabAcuerdoPreciosProductos" class="row divTabAcuerdoPreciosProductos" style="display:block">
        <?php  require('seleccionaracuerdo/seleccionaracuerdo.php'); ?>
      </div>
      <div name="tabAcuerdoPreciosProductos" class="row divTabAcuerdoPreciosProductos">
        <?php   require('nuevoacuerdoespecial/nuevoacuerdo.php'); ?>
      </div>


    </div>
