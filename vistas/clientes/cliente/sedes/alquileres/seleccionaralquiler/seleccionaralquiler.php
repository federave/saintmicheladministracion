

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/alquileres/seleccionaralquiler/seleccionaralquiler.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/alquileres/seleccionaralquiler/seleccionaralquiler.js"></script>

  <?php

  $alquileresId = array();
  $alquileresId[0] = 1;
  $alquileresId[1] = 2;

  $alquileresNombre = array();
  $alquileresNombre[0] = "6 Bidones de 20L";
  $alquileresNombre[1] = "8 Bidones de 20L";



  $alquileresespecialesId = array();
  $alquileresespecialesId[0] = 1;
  $alquileresespecialesId[1] = 2;

  $alquileresespecialesNombre = array();
  $alquileresespecialesNombre[0] = "6 Bidones de 20L";
  $alquileresespecialesNombre[1] = "8 Bidones de 20L";




  ?>

  <div class="contenedorseleccionaralquiler">
    <br>
    <br>
    <div class="row text-center">
      <h1 style="color:white">Alquileres</h1>
    </div>
    <br>
    <br>

    <div style="height:500px; overflow-y: scroll;padding:5%;">
      <ul class="list-group">

        <?php
        $k=0;
        while($k<count($alquileresId))
            {
            ?>

            <li class="list-group-item">
              <div class="row">
                <div class="col-50 text-center">
                  <label id="" style="font-size:20px;color:black">   <?php echo $alquileresNombre[$k];?></label>
                </div>
                <div class="col-25">
                  <button class="btn btn-primary botonlista" id="buttonVerDatosAlquiler<?php echo $alquileresId[$k];?>" onclick="verAlquiler(<?php echo $alquileresId[$k];?>)">Ver</button>
                </div>
                <div class="col-25">
                  <button class="btn btn-success botonlista" onclick="seleccionarAlquiler(<?php echo $alquileresId[$k];?>)" >Seleccionar</button>
                </div>
              </div>
              <br>
             <div class="row text-center" id="divDatosAlquiler<?php echo $alquileresId[$k];?>" style="display:none">

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
     <h1 style="color:white">Alquileres Especiales</h1>
   </div>
   <br>
   <br>



     <div style="height:500px; overflow-y: scroll;padding:5%;">
       <ul class="list-group">

         <?php
         $k=0;
         while($k<count($alquileresespecialesId))
             {
             ?>

             <li class="list-group-item">
               <div class="row">
                 <div class="col-50 text-center">
                   <label id="" style="font-size:20px;color:black">   <?php echo $alquileresespecialesNombre[$k];?></label>
                 </div>
                 <div class="col-25">
                   <button class="btn btn-primary botonlista" id="buttonVerDatosAlquilerEspecial<?php echo $alquileresespecialesId[$k];?>" onclick="verAlquilerEspecial(<?php echo $alquileresespecialesId[$k];?>)">Ver</button>
                 </div>
                 <div class="col-25">
                   <button class="btn btn-success botonlista" onclick="seleccionarAlquiler(<?php echo $alquileresespecialesId[$k];?>)" >Seleccionar</button>
                 </div>
               </div>

              <div class="row text-center" id="divDatosAlquilerEspecial<?php echo $alquileresespecialesId[$k];?>" style="display:none">

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
