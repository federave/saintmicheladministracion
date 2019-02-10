

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/comodatos/seleccionarcomodato/seleccionarcomodato.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/comodatos/seleccionarcomodato/seleccionarcomodato.js"></script>

  <?php

  $comodatosId = array();
  $comodatosId[0] = 1;
  $comodatosId[1] = 2;

  $comodatosNombre = array();
  $comodatosNombre[0] = "6 Bidones de 20L";
  $comodatosNombre[1] = "8 Bidones de 20L";



  $comodatosespecialesId = array();
  $comodatosespecialesId[0] = 1;
  $comodatosespecialesId[1] = 2;

  $comodatosespecialesNombre = array();
  $comodatosespecialesNombre[0] = "6 Bidones de 20L";
  $comodatosespecialesNombre[1] = "8 Bidones de 20L";




  ?>

  <div class="contenedorseleccionarcomodato">
    <br>
    <br>
    <div class="row text-center">
      <h1 style="color:white">Comodatos</h1>
    </div>
    <br>
    <br>

    <div style="height:500px; overflow-y: scroll;padding:5%;">
      <ul class="list-group">

        <?php
        $k=0;
        while($k<count($comodatosId))
            {
            ?>

            <li class="list-group-item">
              <div class="row">
                <div class="col-50 text-center">
                  <label id="" style="font-size:20px;color:black">   <?php echo $comodatosNombre[$k];?></label>
                </div>
                <div class="col-25">
                  <button class="btn btn-primary botonlista" id="buttonVerDatosComodato<?php echo $comodatosId[$k];?>" onclick="verComodato(<?php echo $comodatosId[$k];?>)">Ver</button>
                </div>
                <div class="col-25">
                  <button class="btn btn-success botonlista" onclick="seleccionarComodato(<?php echo $comodatosId[$k];?>)" >Seleccionar</button>
                </div>
              </div>
              <br>
             <div class="row text-center" id="divDatosComodato<?php echo $comodatosId[$k];?>" style="display:none">

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
     <h1 style="color:white">Comodatos Especiales</h1>
   </div>
   <br>
   <br>



     <div style="height:500px; overflow-y: scroll;padding:5%;">
       <ul class="list-group">

         <?php
         $k=0;
         while($k<count($comodatosespecialesId))
             {
             ?>

             <li class="list-group-item">
               <div class="row">
                 <div class="col-50 text-center">
                   <label id="" style="font-size:20px;color:black">   <?php echo $comodatosespecialesNombre[$k];?></label>
                 </div>
                 <div class="col-25">
                   <button class="btn btn-primary botonlista" id="buttonVerDatosComodatoEspecial<?php echo $comodatosespecialesId[$k];?>" onclick="verComodatoEspecial(<?php echo $comodatosespecialesId[$k];?>)">Ver</button>
                 </div>
                 <div class="col-25">
                   <button class="btn btn-success botonlista" onclick="seleccionarComodato(<?php echo $comodatosespecialesId[$k];?>)" >Seleccionar</button>
                 </div>
               </div>

              <div class="row text-center" id="divDatosComodatoEspecial<?php echo $comodatosespecialesId[$k];?>" style="display:none">

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
