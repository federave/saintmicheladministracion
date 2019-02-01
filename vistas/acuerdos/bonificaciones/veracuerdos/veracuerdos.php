

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/bonificaciones/veracuerdos/veracuerdos.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/bonificaciones/veracuerdos/veracuerdos.js"></script>

  <?php

  $acuerdosbonificacionesId = array();
  $acuerdosbonificacionesId[0] = 1;
  $acuerdosbonificacionesId[1] = 2;
  $acuerdosbonificacionesId[2] = 3;

  $acuerdosbonificacionesNombre = array();
  $acuerdosbonificacionesNombre[0] = "Supermercados Chinos";
  $acuerdosbonificacionesNombre[1] = "Buffets Universitarios";
  $acuerdosbonificacionesNombre[2] = "Autoservicios";


  ?>

  <div class="contenedoracuerdosbonificaciones">
    <br>
    <br>
    <div class="row text-center">
      <h1 style="color:white">Lista de Acuerdos Bonificaciones</h1>
    </div>
    <br>
    <br>





      <ul class="list-group">

        <?php
        $k=0;
        while($k<count($acuerdosbonificacionesId))
            {
            ?>

            <li class="list-group-item">
              <div class="row">
                <div class="col-60 text-center">
                  <label id="" style="font-size:20px;color:black">   <?php echo $acuerdosbonificacionesNombre[$k];?></label>
                </div>
                <div class="col-40">
                  <button class="btn btn-success" id="buttonVerAcuerdoBonificacion<?php echo $acuerdosbonificacionesId[$k];?>" name="" onclick="verAcuerdoBonificacion(<?php echo $acuerdosbonificacionesId[$k];?>)" style="height:50px;font-size:18px;margin-left:5%;width:90%;">Ver</button>
                </div>
              
              </div>

               <div class="row text-center" id="divAcuerdoBonificacion<?php echo $acuerdosbonificacionesId[$k];?>" style="display:none">

                 <style media="screen">
                   .etiqueta{font-size:20px;color:black;}
                 </style>
                 <label id="nombreAcuerdoBonificacion<?php echo $acuerdosbonificacionesId[$k];?>" class="etiqueta">Nombre: </label>
                 <br>
                 <label id="bonificacionesAcuerdoBonificacion<?php echo $acuerdosbonificacionesId[$k];?>" class="etiqueta">Bonificaciones: </label>

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
