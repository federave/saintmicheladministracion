


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/radiobutton.css">

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/productos/nuevoproducto/nuevoproducto.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/productos/nuevoproducto/nuevoproducto.js"></script>

  <?php

  $tipoProductosId = array();
  $tipoProductosId[0] = 1;
  $tipoProductosId[1] = 2;

  $tipoProductosNombre = array();
  $tipoProductosNombre[0] = "Retornable";
  $tipoProductosNombre[1] = "Descartable";

  $insumosId = array();
  $insumosId[0] = 1;
  $insumosId[1] = 2;
  $insumosId[2] = 3;
  $insumosId[3] = 4;
  $insumosId[4] = 5;
  $insumosId[5] = 6;

  $insumosNombre = array();
  $insumosNombre[0] = "Tapa";
  $insumosNombre[1] = "Etiqueta";
  $insumosNombre[2] = "Precinto";
  $insumosNombre[3] = "Manija";
  $insumosNombre[4] = "sss";
  $insumosNombre[5] = "sss";


  ?>



  <div class="contenedor">
    <br>
    <br>
    <div class="row text-center">
      <h2>Nuevo Producto</h2>
    </div>
    <br>
    <br>




    <div class="row" style="width:100%">

      <form class="regForm" id="regForm" action="../../../controladores/productos/productoNuevo.php">



        <div class="tab">

          <div class="text-center">
            <h1 style="color:black">Datos Del Producto</h1>
          </div>

          <br>
          <br>

          <input style="color:black" placeholder="Nombre" type="text" oninput="this.className = ''" name="nombre" id="nombre">
          <br>
          <br>

          <input style="color:black" type="number" step="0.1" placeholder="Litros" oninput="this.className = ''" name="litros" id="litros">
          <br>
          <br>

          <div class="text-center">
            <h3 style="color:black">Tipo de Producto</h3>
          </div>


            <div class="funkyradio">

              <?php
              $k=0;
              while($k<count($tipoProductosId))
                  {
                  ?>

                 <div class="funkyradio-info text-center">
                     <input <?php if($k==0) echo "checked"; ?> type="radio" name="radio" id="radio<?php echo $k; ?>" value="<?php echo $tipoProductosId[$k]; ?>"/>
                     <label for="radio<?php echo $k; ?>" style="color:black;font-size:18px"><?php echo $tipoProductosNombre[$k]; ?></label>
                 </div>


               <?php
                 $k++;
                 }
             ?>
           </div>

         <br>


        </div>





        <div class="tab">
          <div class="text-center">
            <h1>Insumos</h1>
          </div>

          <div style="height:500px; overflow-y: scroll;">

          <div class="funkyradio">


            <?php
            $k=0;
            while($k<count($insumosId))
                {
                ?>

               <div class="funkyradio-info text-center">
                   <input type="checkbox" name="insumos" id="insumo<?php echo $k; ?>" value="<?php echo $insumosId[$k]; ?>"/>
                   <label for="insumo<?php echo $k; ?>" style="color:black;font-size:18px"><?php echo $insumosNombre[$k]; ?></label>
               </div>


             <?php
               $k++;
               }
           ?>



            <br>
            <br>

          </div>
        </div>



          <br>
          <br>



        </div>


          <br>
          <br>






        <div style="overflow:auto;">
          <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
          </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <span class="step"></span>
          <span class="step"></span>

        </div>
      </form>
    </div>



    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the crurrent tab
    </script>



  </div>
