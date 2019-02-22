


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/bonificaciones/modificaracuerdo/modificaracuerdo.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/bonificaciones/modificaracuerdo/modificaracuerdo.js"></script>


<?php require $_SESSION["raiz"] . '/modelo/acuerdos/bonificaciones/bonificaciones.php'?>



  <input type="hidden" name="idAcuerdoBonificaciones" id="idAcuerdoBonificaciones" value="">

  <div class="contenedormodificaracuerdo">
        <br>
        <br>
        <div class="row text-center">
          <h2>Datos Del Acuerdo</h2>
        </div>
        <br>
        <br>


        <div class="row text-center">
          <label id="nombreAcuerdoBonificaciones" style="font-size:20px">Nombre: </label>
          <br>
          <input style="color:black;width:60%" type="text" id="nombreNuevoAcuerdoBonificaciones" name="nombreNuevoAcuerdoBonificaciones" placeholder="Nuevo Nombre">
          <br>
          <br>
          <button class="boton btn btn-primary" id="" name="" onclick="nombreNuevoAcuerdoBonificaciones()" style="height:50px;font-size:18px;width:60%">Modificar</button>
        </div>
        <br>
        <div id="alertaNombreAcuerdoBonificacionesNuevo">

        </div>


        <br>
        <br>

        <div class="row text-center">
          <h2>Bonificaciones</h2>
        </div>

        <br>
        <br>
        <style media="screen">
          .etiquetaBlanca{font-size:20px;color:white;}
        </style>
        <div class="row" id="divBonificacionesAcuerdo">

        </div>
        <br>
        <br>

        <div class="row text-center">
          <h2>Agregar Bonificaciones</h2>
        </div>
        <br>
        <br>

        <div class="row" style="margin:auto;width: 80%;background-color: white;height:500px; overflow-y: scroll;">

          <script type="text/javascript">
            function mostrarInputBonificacionAgregar(n)
            {
            if(document.getElementById("bonificacion"+n+"AcuerdoBonificacionesAgregar").checked)
              document.getElementById("divBonificacion"+n+"AcuerdoBonificacionesAgregar").style.display="block";
            else
              document.getElementById("divBonificacion"+n+"AcuerdoBonificacionesAgregar").style.display="none";
            }
          </script>


          <div class="funkyradio">

            <?php
            $k=0;
            while($k<count($bonificacionesId))
                {
                ?>
                <div id="divAgregarBonificacion<?php echo $bonificacionesId[$k];?>" name="divAgregarBonificacion<?php echo $bonificacionesId[$k];?>">
                   <div class="funkyradio-info text-center">
                       <input onchange="mostrarInputBonificacionAgregar(<?php echo $k;?>)" type="checkbox" name="bonificacionesAcuerdoAgregar" id="bonificacion<?php echo $k; ?>AcuerdoBonificacionesAgregar" value="<?php echo $bonificacionesId[$k]; ?>"/>
                       <label for="bonificacion<?php echo $k; ?>AcuerdoBonificacionesAgregar" style="color:black;font-size:18px"><?php echo $bonificacionesNombre[$k]; ?></label>
                   </div>
                   <br>
                   <div class="text-center"style="display:none" id="divBonificacion<?php echo $k;?>AcuerdoBonificacionesAgregar" >
                     <button class="btn btn-primary" onclick="agregarBonificacion(<?php echo $bonificacionesId[$k]; ?>)" style="height:50px;font-size:18px;width:60%;">Agregar</button>;
                   </div>
                   <input type="hidden" id="nombreBonificacion<?php echo $bonificacionesId[$k];?>Agregar" value="<?php echo $bonificacionesNombre[$k];?>">
                </div>

             <?php
               $k++;
               }
             ?>

          </div>
        </div>


        <br>
        <div id="alertaBonificacionAgregada">

        </div>





        <br>
        <br>

  </div>
