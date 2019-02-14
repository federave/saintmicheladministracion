

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/formulario.css">
<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/radiobutton.css">
<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/pedidos/promociones/nuevapromocion/nuevapromocion.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/pedidos/promociones/nuevapromocion/nuevapromocion.js"></script>

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



  <div class="contenedornuevapromocion">
    <br>
    <br>
    <div class="row text-center">
      <h1 style="color:white">Nueva Promoción</h1>
    </div>
    <br>
    <br>





      <form id="formularioPromocionNueva" class="formulario"  action="../../../controladores/pedidos/promociones/promociones.php">

        <input type="hidden" name="numeroProductos" id="numeroProductos" value=<?php echo $numeroProductos; ?>>
        <input type="hidden" name="promocionNueva" id="promocionNueva" value="">

        <div class="tabFormulario" name="tabPromocionNueva">

          <div class="text-center">
            <h1 class="hFormulario">Datos De la Promoción</h1>
          </div>

          <br>
          <br>
          <div class="row text-center" style="width:90%;margin:auto">
            <label class="labelFormulario" for="nombrePromocionNueva">Ingresar Nombre</label>
            <input name="nombrePromocionNueva" id="nombrePromocionNueva" type="text" placeholder="Nombre" oninput="this.className = ''">
          </div>


          <br>

          <div class="text-center">
            <h1 class="hFormulario">Productos</h1>
          </div>

          <div style="height:500px; overflow-y: scroll;">

            <script type="text/javascript">
              function mostrarDivProducto(n)
              {
              if(document.getElementById("producto"+n+"PromocionNueva").checked)
                document.getElementById("divProducto"+n+"PromocionNueva").style.display="block";
              else
                document.getElementById("divProducto"+n+"PromocionNueva").style.display="none";
              }
            </script>


          <div class="funkyradio">

            <?php
            $k=0;
            while($k<count($productosId))
                {
                ?>
               <div class="funkyradio-info text-center">
                   <input onchange="mostrarDivProducto(<?php echo $productosId[$k];?>)" type="checkbox" name="productosPromocionNueva" id="producto<?php echo $productosId[$k]; ?>PromocionNueva" value="<?php echo $productosId[$k]; ?>"/>
                   <label class="labelFormulario" for="producto<?php echo $productosId[$k]; ?>PromocionNueva"><?php echo $productosNombre[$k]; ?></label>
               </div>
               <br>

               <div class="row text-center" id="divProducto<?php echo $productosId[$k];?>PromocionNueva" style="display:none;padding:5%;">
                 <label class="labelFormulario" for="cantidadProducto<?php echo $productosId[$k];?>">Cantidad</label>
                 <input name="cantidadProducto<?php echo $productosId[$k];?>" id="cantidadProducto<?php echo $productosId[$k];?>" type="number" min="0" value="" step="1" placeholder="Cantidad" oninput="this.className = ''" >
                 <br>
                 <br>
                 <label class="labelFormulario" for="bonificadosProducto<?php echo $productosId[$k];?>">Bonificados</label>
                 <input name="bonificadosProducto<?php echo $productosId[$k];?>" id="bonificadosProducto<?php echo $productosId[$k];?>" type="number" min="0" value="" step="1" placeholder="Bonificados" oninput="this.className = ''" >
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
            <button type="button" class="previousbutton" id="prevBtnPromocionNueva" onclick="nextTabPromocionNueva(-1)">Anterior</button>
            <button type="button" id="nextBtnPromocionNueva" onclick="nextTabPromocionNueva(1)">Siguiente</button>
          </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <span class="step" name="stepPromocionNueva"></span>
        </div>
      </form>



    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTabPromocionNueva(currentTab); // Display the crurrent tab
    </script>



  </div>
</div>
