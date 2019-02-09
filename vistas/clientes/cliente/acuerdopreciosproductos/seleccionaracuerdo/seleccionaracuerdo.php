

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/acuerdopreciosproductos/seleccionaracuerdo/seleccionaracuerdo.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/acuerdopreciosproductos/seleccionaracuerdo/seleccionaracuerdo.js"></script>

  <?php

  $acuerdospreciosproductosId = array();
  $acuerdospreciosproductosId[0] = 1;
  $acuerdospreciosproductosId[1] = 2;

  $acuerdospreciosproductosNombre = array();
  $acuerdospreciosproductosNombre[0] = "Domicilios";
  $acuerdospreciosproductosNombre[1] = "Comercios";


  $acuerdosespecialespreciosproductosId = array();
  $acuerdosespecialespreciosproductosId[0] = 1;
  $acuerdosespecialespreciosproductosId[1] = 2;

  $acuerdosespecialespreciosproductosNombre = array();
  $acuerdosespecialespreciosproductosNombre[0] = "Precios Ipensa";
  $acuerdosespecialespreciosproductosNombre[1] = "Precios Sanatorio Argentino";




  ?>

  <div class="contenedoracuerdospreciosproductos">
    <br>
    <br>
    <div class="row text-center">
      <h1 style="color:white">Acuerdos Precios Productos</h1>
    </div>
    <br>
    <br>

    <div style="height:500px; overflow-y: scroll;padding:5%;">
      <ul class="list-group">

        <?php
        $k=0;
        while($k<count($acuerdospreciosproductosId))
            {
            ?>

            <li class="list-group-item">
              <div class="row">
                <div class="col-50 text-center">
                  <label id="" style="font-size:20px;color:black">   <?php echo $acuerdospreciosproductosNombre[$k];?></label>
                </div>
                <div class="col-25">
                  <button class="btn btn-primary botonlista" id="buttonVerDatosAcuerdoPreciosProductos<?php echo $acuerdospreciosproductosId[$k];?>" onclick="verAcuerdoPreciosProductos(<?php echo $acuerdospreciosproductosId[$k];?>)">Ver</button>
                </div>
                <div class="col-25">
                  <button class="btn btn-success botonlista" onclick="seleccionarAcuerdoPreciosProductos(<?php echo $acuerdospreciosproductosId[$k];?>)" >Seleccionar</button>
                </div>
              </div>

             <div class="row text-center" id="divDatosAcuerdoPreciosProductos<?php echo $acuerdospreciosproductosId[$k];?>" style="display:none">

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
     <h1 style="color:white">Acuerdos Especiales Precios Productos</h1>
   </div>
   <br>
   <br>



     <div style="height:500px; overflow-y: scroll;padding:5%;">
       <ul class="list-group">

         <?php
         $k=0;
         while($k<count($acuerdosespecialespreciosproductosId))
             {
             ?>

             <li class="list-group-item">
               <div class="row">
                 <div class="col-50 text-center">
                   <label id="" style="font-size:20px;color:black">   <?php echo $acuerdosespecialespreciosproductosNombre[$k];?></label>
                 </div>
                 <div class="col-25">
                   <button class="btn btn-primary botonlista" id="buttonVerDatosAcuerdoEspecialPreciosProductos<?php echo $acuerdosespecialespreciosproductosId[$k];?>" onclick="verAcuerdoEspecialPreciosProductos(<?php echo $acuerdosespecialespreciosproductosId[$k];?>)">Ver</button>
                 </div>
                 <div class="col-25">
                   <button class="btn btn-success botonlista" onclick="seleccionarAcuerdoPreciosProductos(<?php echo $acuerdosespecialespreciosproductosId[$k];?>)" >Seleccionar</button>
                 </div>
               </div>

              <div class="row text-center" id="divDatosAcuerdoEspecialPreciosProductos<?php echo $acuerdosespecialespreciosproductosId[$k];?>" style="display:none">

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
