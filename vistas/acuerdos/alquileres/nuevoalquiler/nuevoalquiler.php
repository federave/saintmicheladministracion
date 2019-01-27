


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/radiobutton.css">

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/alquileres/nuevoalquiler/nuevoalquiler.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/alquileres/nuevoalquiler/nuevoalquiler.js"></script>

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



  <div class="contenedoralquilernuevo">
    <br>
    <br>
    <div class="row text-center">
      <h1 style="color:white">Nuevo Alquiler</h1>
    </div>
    <br>
    <br>





      <form id="formularioAlquilerNuevo" class="formularioAlquilerNuevo"  action="../../../controladores/acuerdos/alquileres/alquilernuevo.php">

        <input type="hidden" name="numeroProductos" id="numeroProductos" value=<?php echo $numeroProductos; ?>>
        <input type="hidden" name="numeroMaquinas" id="numeroMaquinas" value=<?php echo $numeroMaquinas; ?>>
        <input type="hidden" name="alquilerNuevo" id="alquilerNuevo" value="">

        <div class="tabAlquilerNuevo">

          <div class="text-center">
            <h1 style="color:black">Datos Del Alquiler</h1>
          </div>

          <br>
          <br>
          <br>

          <div class="row text-center">
            <label for="nombreAlquilerNuevo" style="color:black;font-size:18px">Ingresar Nombre</label>
            <input style="color:black" placeholder="Nombre" type="text" oninput="this.className = ''" name="nombreAlquilerNuevo" id="nombreAlquilerNuevo">
          </div>
          <br>
          <br>
          <div class="row text-center">
            <label for="precioAlquilerNuevo" style="color:black;font-size:18px">Ingresar Precio</label>
            <input name="precioAlquilerNuevo" id="precioAlquilerNuevo" class="text-center" style="color:black" type="number" min="1" value="" step="0.1" placeholder="Precio" oninput="this.className = ''" >
          </div>



          <br>
          <br>
          <br>

          <div class="text-center">
            <h1>Productos</h1>
          </div>

          <div style="height:500px; overflow-y: scroll;">

            <script type="text/javascript">
              function mostrarInputCantidad(n)
              {
              if(document.getElementById("producto"+n+"AlquilerNuevo").checked)
                document.getElementById("divCantidadProducto"+n+"AlquilerNuevo").style.display="block";
              else
                document.getElementById("divCantidadProducto"+n+"AlquilerNuevo").style.display="none";
              }
            </script>


          <div class="funkyradio">

            <?php
            $k=0;
            while($k<count($productosId))
                {
                ?>
               <div class="funkyradio-info text-center">
                   <input onchange="mostrarInputCantidad(<?php echo $k;?>)" type="checkbox" name="productosAlquilerNuevo" id="producto<?php echo $k; ?>AlquilerNuevo" value="<?php echo $productosId[$k]; ?>"/>
                   <label for="producto<?php echo $k; ?>AlquilerNuevo" style="color:black;font-size:18px"><?php echo $productosNombre[$k]; ?></label>
               </div>
               <br>
               <div class="text-center "style="display:none" id="divCantidadProducto<?php echo $k;?>AlquilerNuevo">
                 <p class="etiqueta ">Ingrese Cantidad</p>
                 <input name="cantidadProducto<?php echo $k;?>AlquilerNuevo" id="cantidadProducto<?php echo $k; ?>AlquilerNuevo" class="text-center" style="color:black" type="number" min="1" value="" step="1" placeholder="Cantidad" oninput="this.className = ''" >
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
              if(document.getElementById("maquina"+n+"AlquilerNuevo").checked)
                document.getElementById("divCantidadMaquina"+n+"AlquilerNuevo").style.display="block";
              else
                document.getElementById("divCantidadMaquina"+n+"AlquilerNuevo").style.display="none";
              }
            </script>


          <div class="funkyradio">

            <?php
            $k=0;
            while($k<count($maquinasId))
                {
                ?>
               <div class="funkyradio-info text-center">
                   <input onchange="mostrarInputCantidadMaquinas(<?php echo $k;?>)" type="checkbox" name="maquinasAlquilerNuevo" id="maquina<?php echo $k; ?>AlquilerNuevo" value="<?php echo $maquinasId[$k]; ?>"/>
                   <label for="maquina<?php echo $k; ?>AlquilerNuevo" style="color:black;font-size:18px"><?php echo $maquinasNombre[$k]; ?></label>
               </div>
               <br>
               <div class="text-center "style="display:none" id="divCantidadMaquina<?php echo $k;?>AlquilerNuevo">
                 <p class="etiqueta ">Ingrese Cantidad</p>
                 <input name="cantidadMaquina<?php echo $k;?>AlquilerNuevo" id="cantidadMaquina<?php echo $k; ?>AlquilerNuevo" class="text-center" style="color:black" type="number" min="1" value="" step="1" placeholder="Cantidad" oninput="this.className = ''" >
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
            <button type="button" id="prevBtnAlquilerNuevo" onclick="nextPrevAlquilerNuevo(-1)">Siguiente</button>
            <button type="button" id="nextBtnAlquilerNuevo" onclick="nextPrevAlquilerNuevo(1)">Anterior</button>
          </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <span class="stepAlquilerNuevo"></span>
        </div>
      </form>



    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTabAlquilerNuevo(currentTab); // Display the crurrent tab
    </script>



  </div>
</div>
