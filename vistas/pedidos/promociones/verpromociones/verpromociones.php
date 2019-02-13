

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/pedidos/promociones/verpromociones/verpromociones.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/pedidos/promociones/verpromociones/verpromociones.js"></script>

<?php

$promocionesId = array();
$promocionesId[0] = 1;
$promocionesId[1] = 2;

$promocionesNombre = array();
$promocionesNombre[0] = "10+1 x 5L";
$promocionesNombre[1] = "10+1 x 8L";

?>

<div class="contenedorver contenedorverpromociones">
  <br>
  <br>
  <div class="row text-center">
    <h1 class="colorFuente">Lista de Promociones</h1>
  </div>
  <br>
  <br>





    <ul class="list-group">

      <?php
      $k=0;
      while($k<count($promocionesId))
          {
          ?>

          <li class="list-group-item">
            <div class="row">
              <div class="col-60 text-center">
                <label id="" style="font-size:20px;color:black">   <?php echo $promocionesNombre[$k];?></label>
              </div>
              <div class="col-20">
                <button class="botonlista btn btn-success" id="buttonVerPromocion<?php echo $promocionesId[$k];?>"  onclick="verPromocion(<?php echo $promocionesId[$k];?>)">Ver</button>
              </div>
              <div class="col-20">
                <button class="botonlista btn btn-primary" name="" onclick="darDeBajaPromocion(<?php echo $promocionesId[$k];?>)">Dar de Baja</button>
              </div>
            </div>

             <div class="row text-center" id="divPromocion<?php echo $promocionesId[$k];?>" style="display:none">

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
