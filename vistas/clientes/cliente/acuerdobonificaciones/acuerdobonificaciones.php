
<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/acuerdobonificaciones/acuerdobonificaciones.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/acuerdobonificaciones/acuerdobonificaciones.js"></script>

<?php

$estadoAcuerdoActualBonificaciones=true;


$idAcuerdoActualBonificaciones=1;
$nombreAcuerdoActualBonificaciones="Domicilios";


$bonificacionesNombre = array();
$bonificacionesNombre[0] = "Bidon 20L";
$bonificacionesNombre[1] = "Bidon 12L";

$bonificacionesPrecio = array();
$bonificacionesPrecio[0] = 140;
$bonificacionesPrecio[1] = 110;






?>

<div class="contenedoracuerdobonificaciones">

      <br>
      <br>

      <div class="row">
        <div class="text-center">
          <h1>Acuerdo Actual Bonificaciones</h1>
        </div>
      </div>

      <br>
      <br>

      <div id="divAcuerdoActualBonificaciones" class="row text-center">
          <?php if($estadoAcuerdoActualBonificaciones){ ?>
          <label id="nombreAcuerdoActualBonificaciones" class="labelAcuerdoActual"><?php echo $nombreAcuerdoActualBonificaciones?></label>
          <br>

          <div id="divDatosAcuerdoActualBonificaciones">

            <?php
            $k=0;
            while($k<count($bonificacionesNombre))
              {
              ?>
              <label class="labelAcuerdoActual"><?php echo $bonificacionesNombre[$k]; ?>: <?php echo $bonificacionesPrecio[$k]; ?> $</label>
              <br>
              <?php
              $k++;
              }
            ?>
          </div>

        <?php }else { ?>
          <label class="labelAcuerdoActualBonificaciones">El cliente no tiene asignado un acuerdo</label>
          <div id="divDatosAcuerdoActualBonificaciones">

          </div>
        <?php } ?>

      </div>

      <br>
      <br>
      <br>
      <br>

      <div class="row" style="width:90%;margin-left:5%" >
        <ul class="nav nav-tabs">
          <li name="liAcuerdoBonificaciones" class="active"><a class="items"  onclick="seleccionarTabAcuerdoBonificaciones(0)">Seleccionar Acuerdo</a></li>
          <li name="liAcuerdoBonificaciones" class="li"><a class="items"  onclick="seleccionarTabAcuerdoBonificaciones(1)">Crear Acuerdo Especial</a></li>
        </ul>
      </div>

      <br>

      <div name="tabAcuerdoBonificaciones" class="row divTabAcuerdoBonificaciones" style="display:block">
        <?php  require('seleccionaracuerdo/seleccionaracuerdo.php'); ?>
      </div>
      <div name="tabAcuerdoBonificaciones" class="row divTabAcuerdoBonificaciones">
        <?php   require('nuevoacuerdoespecial/nuevoacuerdo.php'); ?>
      </div>


    </div>
