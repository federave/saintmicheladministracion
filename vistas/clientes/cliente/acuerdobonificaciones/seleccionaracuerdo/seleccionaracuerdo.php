

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/acuerdobonificaciones/seleccionaracuerdo/seleccionaracuerdo.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/acuerdobonificaciones/seleccionaracuerdo/seleccionaracuerdo.js"></script>

  <?php

  $acuerdosbonificacionesId = array();
  $acuerdosbonificacionesId[0] = 1;
  $acuerdosbonificacionesId[1] = 2;

  $acuerdosbonificacionesNombre = array();
  $acuerdosbonificacionesNombre[0] = "Domicilios";
  $acuerdosbonificacionesNombre[1] = "Comercios";


  $acuerdosespecialesbonificacionesId = array();
  $acuerdosespecialesbonificacionesId[0] = 1;
  $acuerdosespecialesbonificacionesId[1] = 2;

  $acuerdosespecialesbonificacionesNombre = array();
  $acuerdosespecialesbonificacionesNombre[0] = "Precios Ipensa";
  $acuerdosespecialesbonificacionesNombre[1] = "Precios Sanatorio Argentino";




  ?>

  <div class="contenedorseleccionaracuerdobonificaciones">
    <br>
    <br>
    <div class="row text-center">
      <h1 style="color:white">Acuerdos Bonificaciones</h1>
    </div>
    <br>
    <br>

    <div style="height:500px; overflow-y: scroll;padding:5%;">
      <ul class="list-group">

        <?php
        $k=0;
        while($k<count($acuerdosbonificacionesId))
            {
            ?>

            <li class="list-group-item">
              <div class="row">
                <div class="col-50 text-center">
                  <label id="" style="font-size:20px;color:black">   <?php echo $acuerdosbonificacionesNombre[$k];?></label>
                </div>
                <div class="col-25">
                  <button class="btn btn-primary botonlista" id="buttonVerDatosAcuerdoBonificaciones<?php echo $acuerdosbonificacionesId[$k];?>" onclick="verAcuerdoBonificaciones(<?php echo $acuerdosbonificacionesId[$k];?>)">Ver</button>
                </div>
                <div class="col-25">
                  <button class="btn btn-success botonlista" onclick="seleccionarAcuerdoBonificaciones(<?php echo $acuerdosbonificacionesId[$k];?>)" >Seleccionar</button>
                </div>
              </div>

             <div class="row text-center" id="divDatosAcuerdoBonificaciones<?php echo $acuerdosbonificacionesId[$k];?>" style="display:none">

             </div>

             </li>
          <?php
            $k++;
            }
        ?>


     </ul>
   </div>



   <br>
   <br>
   <br>

   <div class="row text-center">
     <h1 style="color:white">Acuerdos Especiales Bonificaciones</h1>
   </div>
   <br>
   <br>



     <div style="height:500px; overflow-y: scroll;padding:5%;">
       <ul class="list-group">

         <?php
         $k=0;
         while($k<count($acuerdosespecialesbonificacionesId))
             {
             ?>

             <li class="list-group-item">
               <div class="row">
                 <div class="col-50 text-center">
                   <label id="" style="font-size:20px;color:black">   <?php echo $acuerdosespecialesbonificacionesNombre[$k];?></label>
                 </div>
                 <div class="col-25">
                   <button class="btn btn-primary botonlista" id="buttonVerDatosAcuerdoEspecialBonificaciones<?php echo $acuerdosespecialesbonificacionesId[$k];?>" onclick="verAcuerdoEspecialBonificaciones(<?php echo $acuerdosespecialesbonificacionesId[$k];?>)">Ver</button>
                 </div>
                 <div class="col-25">
                   <button class="btn btn-success botonlista" onclick="seleccionarAcuerdoEspecialBonificaciones(<?php echo $acuerdosespecialesbonificacionesId[$k];?>)" >Seleccionar</button>
                 </div>
               </div>

              <div class="row text-center" id="divDatosAcuerdoEspecialBonificaciones<?php echo $acuerdosespecialesbonificacionesId[$k];?>" style="display:none">

              </div>

              </li>
           <?php
             $k++;
             }
         ?>


      </ul>
    </div>






 <br>
 <br>

</div>
