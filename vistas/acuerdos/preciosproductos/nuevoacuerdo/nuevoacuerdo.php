


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/radiobutton.css">

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/preciosproductos/nuevoacuerdo/nuevoacuerdo.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/preciosproductos/nuevoacuerdo/nuevoacuerdo.js"></script>

  <?php

  $productosId = array();
  $productosId[0] = 1;
  $productosId[1] = 5;
  $productosId[2] = 3;


  $productosNombre = array();
  $productosNombre[0] = "Bidon 10L";
  $productosNombre[1] = "Bidon 8L";
  $productosNombre[2] = "Bidon 5L";

  $numeroProductos = 3;

  ?>



  <div class="contenedoracuerdopreciosproductosnuevo">
    <br>
    <br>
    <div class="row text-center">
      <h1 style="color:white">Nuevo Acuerdo Precios Productos</h1>
    </div>
    <br>
    <br>





      <form id="formularioAcuerdoPreciosProductosNuevo" class="formularioAcuerdoPreciosProductosNuevo"  action="../../../controladores/acuerdos/preciosproductos/acuerdonuevo.php">

        <input type="hidden" name="numeroProductos" id="numeroProductos" value=<?php echo $numeroProductos; ?>>
        <input type="hidden" name="acuerdoNuevo" id="acuerdoNuevo" value="">

        <div class="tabAcuerdoPreciosProductosNuevo">

          <div class="text-center">
            <h1 style="color:black">Datos Del Acuerdo</h1>
          </div>

          <br>
          <br>
          <div class="row text-center">
            <label for="nombreAcuerdoPreciosProductosNuevo" style="color:black;font-size:18px">Ingresar Nombre</label>
            <input style="color:black" placeholder="Nombre" type="text" oninput="this.className = ''" name="nombreAcuerdoPreciosProductosNuevo" id="nombreAcuerdoPreciosProductosNuevo">
          </div>



          <br>
          <br>

          <div class="text-center">
            <h1>Productos</h1>
          </div>

          <div style="height:500px; overflow-y: scroll;">

            <script type="text/javascript">
              function mostrarInputPrecio(n)
              {
              if(document.getElementById("producto"+n+"AcuerdoPreciosProductosNuevo").checked)
                document.getElementById("precioProducto"+n+"AcuerdoPreciosProductosNuevo").style.display="block";
              else
                document.getElementById("precioProducto"+n+"AcuerdoPreciosProductosNuevo").style.display="none";
              }
            </script>


          <div class="funkyradio">

            <?php
            $k=0;
            while($k<count($productosId))
                {
                ?>
               <div class="funkyradio-info text-center">
                   <input onchange="mostrarInputPrecio(<?php echo $k;?>)" type="checkbox" name="productosAcuerdoPreciosProductosNuevo" id="producto<?php echo $k; ?>AcuerdoPreciosProductosNuevo" value="<?php echo $productosId[$k]; ?>"/>
                   <label for="producto<?php echo $k; ?>AcuerdoPreciosProductosNuevo" style="color:black;font-size:18px"><?php echo $productosNombre[$k]; ?></label>
               </div>
               <br>
               <input name="precioProducto<?php echo $k;?>AcuerdoPreciosProductosNuevo" id="precioProducto<?php echo $k; ?>AcuerdoPreciosProductosNuevo" class="text-center" style="color:black;display:none" type="number" min="0" value="0" step="0.1" placeholder="Precio" oninput="this.className = ''" >

               <div class="div">

               </div>


             <?php
               $k++;
               }
             ?>



            <br>
            <br>


         <br>


        </div>


        </div>


          <br>
          <br>






        <div style="overflow:auto;">
          <div style="float:right;">
            <button type="button" id="prevBtnAcuerdoPreciosProductosNuevo" onclick="nextPrevAcuerdoPreciosProductosNuevo(-1)">Siguiente</button>
            <button type="button" id="nextBtnAcuerdoPreciosProductosNuevo" onclick="nextPrevAcuerdoPreciosProductosNuevo(1)">Anterior</button>
          </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <span class="stepAcuerdoPreciosProductosNuevo"></span>
        </div>
      </form>



    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTabAcuerdoPreciosProductosNuevo(currentTab); // Display the crurrent tab
    </script>



  </div>
</div>
