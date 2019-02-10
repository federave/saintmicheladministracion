
<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/comodatos/comodatos.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/comodatos/comodatos.js"></script>

<?php

$estadoComodato=true;
$idComodatoActual=1;
$nombreComodatoActual="6 Bidones de 20L";


$productosIdComodatoActual = array();
$productosIdComodatoActual[0] = 0;
$productosIdComodatoActual[1] = 1;


$productosNombreComodatoActual = array();
$productosNombreComodatoActual[0] = "Bidón 20L";
$productosNombreComodatoActual[1] = "Bidón 12L";

$productosCantidadComodatoActual = array();
$productosCantidadComodatoActual[0] = 8;
$productosCantidadComodatoActual[1] = 6;

$maquinasNombreComodatoActual = array();
$maquinasNombreComodatoActual[0] = "Heladera";
$maquinasNombreComodatoActual[1] = "Dispenser";

$maquinasCantidadComodatoActual = array();
$maquinasCantidadComodatoActual[0] = 1;
$maquinasCantidadComodatoActual[1] = 2;



?>

<div class="contenedorcomodatos">

      <br>
      <br>

      <div class="row">
        <div class="text-center">
          <h1>Comodato Actual</h1>
        </div>
      </div>

      <br>
      <br>

      <div id="divComodatoActual" class="row text-center">
          <?php if($estadoComodato){ ?>


          <div id="divDatosComodatoActual">
            <label class="labelComodatoActual"><?php echo $nombreComodatoActual?></label>
            <br>
            <label class="labelComodatoActual">Productos</label>
            <br>
            <?php
            $k=0;
            while($k<count($productosNombreComodatoActual))
              {
              ?>
              <label class="labelComodatoActual"><?php echo $productosNombreComodatoActual[$k]; ?></label>
              <label class="labelComodatoActual">Cantidad Mínima: <?php echo $productosCantidadComodatoActual[$k]; ?></label>
              <br>
              <?php
              $k++;
              }
            ?>
            <br>
            <label class="labelComodatoActual">Máquinas</label>
            <br>
            <?php
            $k=0;
            while($k<count($productosNombreComodatoActual))
              {
              ?>
              <label class="labelComodatoActual"><?php echo $maquinasNombreComodatoActual[$k]; ?></label>
              <label class="labelComodatoActual">Cantidad: <?php echo $maquinasCantidadComodatoActual[$k]; ?></label>
              <br>
              <?php
              $k++;
              }
            ?>
          </div>

        <?php }else { ?>
          <label class="labelComodatoActual">El cliente no tiene comodatos</label>
          <div id="divComodatoActual">

          </div>
        <?php } ?>

      </div>

      <br>
      <br>
      <br>
      <br>

      <div class="row" style="width:90%;margin-left:5%" >
        <ul class="nav nav-tabs">
          <li name="liComodatos" class="active"><a class="items"  onclick="seleccionarTabComodatos(0)">Seleccionar Comodato</a></li>
          <li name="liComodatos" class="li"><a class="items"  onclick="seleccionarTabComodatos(1)">Crear Comodato Especial</a></li>
        </ul>
      </div>

      <br>

      <div name="tabComodatos" class="row divTabComodatos" style="display:block">
        <?php  require('seleccionarcomodato/seleccionarcomodato.php'); ?>
      </div>
      <div name="tabComodatos" class="row divTabComodatos">
        <?php  require('nuevocomodatoespecial/nuevocomodato.php'); ?>
      </div>


    </div>
