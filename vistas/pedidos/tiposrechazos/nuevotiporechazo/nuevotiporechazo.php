


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/radiobutton.css">

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/comodatos/nuevocomodato/nuevocomodato.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/comodatos/nuevocomodato/nuevocomodato.js"></script>

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



  $maquinasId = array();
  $maquinasId[0] = 1;
  $maquinasId[1] = 2;
  $maquinasId[2] = 3;

  $maquinasNombre = array();
  $maquinasNombre[0] = "Dispenser Frio Calor Ushuaia";
  $maquinasNombre[1] = "Heladera Briket 3500";
  $maquinasNombre[2] = "Heladera Briket 4500";

  $numeroMaquinas = 3;








  ?>



  <div class="contenedorcomodatonuevo">
    <br>
    <br>
    <div class="row text-center">
      <h1 style="color:white">Nuevo Comodato</h1>
    </div>
    <br>
    <br>





      <form id="formularioComodatoNuevo" class="formularioComodatoNuevo"  action="../../../controladores/acuerdos/comodatos/comodatonuevo.php">

        <input type="hidden" name="numeroProductos" id="numeroProductos" value=<?php echo $numeroProductos; ?>>
        <input type="hidden" name="numeroMaquinas" id="numeroMaquinas" value=<?php echo $numeroMaquinas; ?>>
        <input type="hidden" name="comodatoNuevo" id="comodatoNuevo" value="">

        <div class="tabComodatoNuevo">

          <div class="text-center">
            <h1 style="color:black">Datos Del Comodato</h1>
          </div>

          <br>
          <br>
          <br>

          <div class="row text-center">
            <label for="nombreComodatoNuevo" style="color:black;font-size:18px">Ingresar Nombre</label>
            <input style="color:black" placeholder="Nombre" type="text" oninput="this.className = ''" name="nombreComodatoNuevo" id="nombreComodatoNuevo">
          </div>
          <br>




          <br>
          <br>
          <br>

          <div class="text-center">
            <h1>Productos</h1>
          </div>

          <div style="height:500px; overflow-y: scroll;">

            <script type="text/javascript">
              function mostrarInputCantidadMinima(n)
              {
              if(document.getElementById("producto"+n+"ComodatoNuevo").checked)
                document.getElementById("divCantidadMinimaProducto"+n+"ComodatoNuevo").style.display="block";
              else
                document.getElementById("divCantidadMinimaProducto"+n+"ComodatoNuevo").style.display="none";
              }
            </script>


          <div class="funkyradio">

            <?php
            $k=0;
            while($k<count($productosId))
                {
                ?>
               <div class="funkyradio-info text-center">
                   <input onchange="mostrarInputCantidadMinima(<?php echo $k;?>)" type="checkbox" name="productosComodatoNuevo" id="producto<?php echo $k; ?>ComodatoNuevo" value="<?php echo $productosId[$k]; ?>"/>
                   <label for="producto<?php echo $k; ?>ComodatoNuevo" style="color:black;font-size:18px"><?php echo $productosNombre[$k]; ?></label>
               </div>
               <br>
               <div class="text-center "style="display:none" id="divCantidadMinimaProducto<?php echo $k;?>ComodatoNuevo">
                 <p class="etiqueta ">Ingrese Cantidad Minima</p>
                 <input name="cantidadMinimaProducto<?php echo $k;?>AlquilerNuevo" id="cantidadMinimaProducto<?php echo $k; ?>ComodatoNuevo" class="text-center" style="color:black" type="number" min="1" value="" step="1" placeholder="Cantidad Minima" oninput="this.className = ''" >
                 <br>
                 <br>

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


          <div class="text-center">
            <h1>Maquinas</h1>
          </div>

          <div style="height:500px; overflow-y: scroll;">

            <script type="text/javascript">
              function mostrarInputCantidadMaquinas(n)
              {
              if(document.getElementById("maquina"+n+"ComodatoNuevo").checked)
                document.getElementById("divCantidadMaquina"+n+"ComodatoNuevo").style.display="block";
              else
                document.getElementById("divCantidadMaquina"+n+"ComodatoNuevo").style.display="none";
              }
            </script>


          <div class="funkyradio">

            <?php
            $k=0;
            while($k<count($maquinasId))
                {
                ?>
               <div class="funkyradio-info text-center">
                   <input onchange="mostrarInputCantidadMaquinas(<?php echo $k;?>)" type="checkbox" name="maquinasComodatoNuevo" id="maquina<?php echo $k; ?>ComodatoNuevo" value="<?php echo $maquinasId[$k]; ?>"/>
                   <label for="maquina<?php echo $k; ?>ComodatoNuevo" style="color:black;font-size:18px"><?php echo $maquinasNombre[$k]; ?></label>
               </div>
               <br>
               <div class="text-center "style="display:none" id="divCantidadMaquina<?php echo $k;?>ComodatoNuevo">
                 <p class="etiqueta ">Ingrese Cantidad</p>
                 <input name="cantidadMaquina<?php echo $k;?>ComodatoNuevo" id="cantidadMaquina<?php echo $k; ?>ComodatoNuevo" class="text-center" style="color:black" type="number" min="1" value="" step="1" placeholder="Cantidad" oninput="this.className = ''" >
                 <br>
                 <br>

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



        <div style="overflow:auto;">
          <div style="float:right;">
            <button type="button" id="prevBtnComodatoNuevo" onclick="nextPrevComodatoNuevo(-1)">Siguiente</button>
            <button type="button" id="nextBtnComodatoNuevo" onclick="nextPrevComodatoNuevo(1)">Anterior</button>
          </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <span class="stepComodatoNuevo"></span>
        </div>
      </form>



    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTabComodatoNuevo(currentTab); // Display the crurrent tab
    </script>



  </div>
</div>
