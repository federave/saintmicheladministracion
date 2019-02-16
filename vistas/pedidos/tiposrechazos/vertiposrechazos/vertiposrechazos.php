

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/pedidos/tiposrechazos/vertiposrechazos/vertiposrechazos.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/pedidos/tiposrechazos/vertiposrechazos/vertiposrechazos.js"></script>

<?php

$tiposRechazosId = array();
$tiposRechazosId[0] = 1;
$tiposRechazosId[1] = 2;

$tiposRechazosNombre = array();
$tiposRechazosNombre[0] = "Cambio de Dia";
$tiposRechazosNombre[1] = "No Tenia Plata";

?>

<div class="contenedorver contenedorvertiposrechazos">
  <br>
  <br>
  <div class="row text-center">
    <h1 class="colorFuente">Lista de Tipos Rechazos</h1>
  </div>
  <br>
  <br>





    <ul class="list-group">

      <?php
      $k=0;
      while($k<count($tiposRechazosId))
          {
          ?>

          <li class="list-group-item">
            <div class="row">
              <div class="col-60 text-center">
                <label id="" style="font-size:20px;color:black"><?php echo $tiposRechazosNombre[$k];?></label>
              </div>
              <div class="col-20">
                <button class="botonlista btn btn-success" id="buttonVerTipoRechazo<?php echo $tiposRechazosId[$k];?>"  onclick="verTipoRechazo(<?php echo $tiposRechazosId[$k];?>)">Ver</button>
              </div>
              <div class="col-20">
                <button class="botonlista btn btn-primary" name="" onclick="darDeBajaTipoRechazo(<?php echo $tiposRechazosId[$k];?>)">Dar de Baja</button>
              </div>
            </div>

             <div class="row text-center" id="divTipoRechazo<?php echo $tiposRechazosId[$k];?>" style="display:none">

             </div>

           </li>
        <?php
          $k++;
          }
      ?>


   </ul>


 <br>
 <br>

</div>
