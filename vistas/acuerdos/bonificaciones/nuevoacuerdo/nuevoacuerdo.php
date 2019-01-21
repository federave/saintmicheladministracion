


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/radiobutton.css">

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/bonificaciones/nuevoacuerdo/nuevoacuerdo.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/bonificaciones/nuevoacuerdo/nuevoacuerdo.js"></script>

  <?php

  $bonificacionesId = array();
  $bonificacionesId[0] = 1;
  $bonificacionesId[1] = 2;

  $bonificacionesNombre = array();
  $bonificacionesNombre[0] = "Bidones 10%";
  $bonificacionesNombre[1] = "Bidones 15%";

  $numeroBonificaciones = 2;



  ?>




    <div class="contenedoracuerdobonificacionesnuevo">

      <div class="row text-center">
        <h1 style="color:white">Nuevo Acuerdo Bonificaciones</h1>
      </div>
      <br>





      <form class="regFormAcuerdoBonificacionesNuevo" id="regFormAcuerdoBonificacionesNuevo" action="../../../controladores/acuerdos/bonificaciones/acuerdobonificacionesnuevo.php">

        <input type="hidden" name="numeroBonificaciones" id="numeroBonificaciones" value=<?php echo $numeroBonificaciones; ?>>
        <input type="hidden" name="acuerdoBonificacionesNuevo" id="acuerdoBonificacionesNuevo" value="">


        <div class="tabAcuerdoBonificacionesNuevo">

          <div class="text-center">
            <h1 style="color:black">Datos Del Acuerdo Bonificaciones</h1>
          </div>

          <br>
          <br>
          <div class="row text-center">
            <label for="nombreAcuerdoBonificacionesNuevo" style="color:black;font-size:18px">Ingresar Nombre</label>
            <input style="color:black" placeholder="Nombre" type="text" oninput="this.className = ''" name="nombreAcuerdoBonificacionesNuevo" id="nombreAcuerdoBonificacionesNuevo">
          </div>

          <br>
          <br>


        <div class="text-center">
          <h1>Bonificaciones</h1>
        </div>

        <div style="height:500px; overflow-y: scroll;">

        <div class="funkyradio">


          <?php
          $k=0;
          while($k<count($bonificacionesId))
              {
              ?>

             <div class="funkyradio-info text-center">
                 <input type="checkbox" name="bonificacionesAcuerdoBonificacionesNuevo" id="bonificacion<?php echo $k; ?>AcuerdoBonificacionesNuevo" value="<?php echo $bonificacionesId[$k]; ?>"/>
                 <label for="bonificacion<?php echo $k; ?>AcuerdoBonificacionesNuevo" style="color:black;font-size:18px"><?php echo $bonificacionesNombre[$k]; ?></label>
             </div>


           <?php
             $k++;
             }
         ?>
          <br>
        </div>


        </div>

      </div>





        <div style="overflow:auto;">
          <div style="float:right;">
            <button type="button" id="prevBtnAcuerdoBonificacionesNuevo" onclick="nextPrevAcuerdoBonificacionesNuevo(-1)">Previous</button>
            <button type="button" id="nextBtnAcuerdoBonificacionesNuevo" onclick="nextPrevAcuerdoBonificacionesNuevo(1)">Next</button>
          </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <span class="stepAcuerdoBonificacionesNuevo"></span>
        </div>
      </form>
    </div>



    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTabAcuerdoBonificacionesNuevo(currentTab); // Display the crurrent tab
    </script>



  </div>
