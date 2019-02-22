

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/bonificaciones/verbonificaciones/verbonificaciones.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/bonificaciones/verbonificaciones/verbonificaciones.js"></script>

<?php require $_SESSION["raiz"] . '/modelo/acuerdos/bonificaciones/bonificaciones.php'?>

  <div class="contenedorbonificaciones">
    <br>
    <br>
    <div class="row text-center">
      <h1 style="color:white">Lista de Bonificaciones</h1>
    </div>
    <br>
    <br>





      <ul class="list-group">

        <?php
        $k=0;
        while($k<count($bonificacionesId))
            {
            ?>

            <li class="list-group-item">
              <div class="row">
                <div class="col-60 text-center">
                  <label id="bonificacionNombre<?php echo $bonificacionesId[$k];?>" style="font-size:20px;color:black">   <?php echo $bonificacionesNombre[$k];?></label>
                </div>
                <div class="col-40">
                  <button class="btn btn-success" id="buttonVerBonificacion<?php echo $bonificacionesId[$k];?>" name="" onclick="verBonificacion(<?php echo $bonificacionesId[$k];?>)" style="height:50px;font-size:18px;margin-left:5%;width:90%;">Ver</button>
                </div>

              </div>

               <div class="row text-center" id="divBonificacion<?php echo $bonificacionesId[$k];?>" style="display:none">

                 <style media="screen">
                   .etiqueta{font-size:20px;color:black;}
                 </style>
                 <label id="nombreBonificacion<?php echo $bonificacionesId[$k];?>" class="etiqueta">Nombre: </label>
                 <br>
                 <label id="cantidadMinimaBonificacion<?php echo $bonificacionesId[$k];?>" class="etiqueta">Cantidad Minima: </label>
                 <br>
                 <label id="cantidadMaximaBonificacion<?php echo $bonificacionesId[$k];?>" class="etiqueta">Cantidad Maxima: </label>
                 <br>
                 <label id="porcentajeBonificacion<?php echo $bonificacionesId[$k];?>" class="etiqueta">Porcentaje: </label>
                 <br>
                 <label id="productosBonificacion<?php echo $bonificacionesId[$k];?>" class="etiqueta">Productos: </label>






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
