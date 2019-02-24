


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/radiobutton.css">
<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/formulario.css">
<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/comodatos/nuevacondicion/nuevacondicion.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/comodatos/nuevacondicion/nuevacondicion.js"></script>
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/javascript/formulario.js"></script>


<?php require $_SESSION["raiz"] . '/modelo/productos/productos.php'?>



  <div class="contenedornuevacondicion">
    <br>
    <br>
    <div class="row text-center">
      <h1 style="color:white">Nueva Condición</h1>
    </div>
    <br>
    <br>





      <form id="formularioCondicionNueva" class="formulario"  action="../../../controladores/acuerdos/comodatos/condicionnueva.php">

        <input type="hidden" name="numeroProductos" id="numeroProductos" value=<?php echo $numeroProductos; ?>>
        <input type="hidden" name="condicionNueva" id="condicionNueva" value="">

        <div class="tabFormulario" name="tabCondicionNueva">

          <div class="text-center">
            <h1 style="color:black">Datos De la Condición</h1>
          </div>

          <br>
          <br>
          <br>

          <div class="row text-center">
            <label for="nombreCondicionNueva" style="color:black;font-size:18px">Ingresar Nombre</label>
            <input style="color:black" placeholder="Nombre" type="text" oninput="this.className = ''" name="nombreCondicionNueva" id="nombreCondicionNueva">
          </div>
          <br>
          <div class="row text-center">
            <label for="minimoTotalCondicionNueva" style="color:black;font-size:18px">Ingresar Minimo Total</label>
            <input name="minimoTotalCondicionNueva" id="minimoTotalCondicionNueva" class="text-center" style="color:black" type="number" min="1" value="" step="1" placeholder="Minima Total" oninput="this.className = ''" >
          </div>


          <br>
          <br>
          <div id="alertaCondicionNueva">
            
          </div>

          <br>

          <div class="text-center">
            <h1>Productos</h1>
          </div>

          <div style="height:500px; overflow-y: scroll;">

            <script type="text/javascript">
              function mostrarInputCantidadMinimaCondicion(n)
              {
              if(document.getElementById("producto"+n+"CondicionNueva").checked)
                document.getElementById("divCantidadMinimaProducto"+n+"CondicionNueva").style.display="block";
              else
                document.getElementById("divCantidadMinimaProducto"+n+"CondicionNueva").style.display="none";
              }
            </script>


          <div class="funkyradio">

            <?php
            $k=0;
            while($k<count($productosId))
                {
                ?>
               <div class="funkyradio-info text-center">
                   <input onchange="mostrarInputCantidadMinimaCondicion(<?php echo $k;?>)" type="checkbox" name="productosCondicionNueva" id="producto<?php echo $k; ?>CondicionNueva" value="<?php echo $productosId[$k]; ?>"/>
                   <label for="producto<?php echo $k; ?>CondicionNueva" style="color:black;font-size:18px"><?php echo $productosNombre[$k]; ?></label>
               </div>
               <br>
               <div class="text-center "style="display:none" id="divCantidadMinimaProducto<?php echo $k;?>CondicionNueva">
                 <p class="etiqueta ">Ingrese Cantidad Minima</p>
                 <input name="cantidadMinimaProducto<?php echo $k;?>CondicionNueva" id="cantidadMinimaProducto<?php echo $k; ?>CondicionNueva" class="text-center" style="color:black" type="number" min="1" value="" step="1" placeholder="Cantidad Minima" oninput="this.className = ''" >
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





        <div style="overflow:auto;">
          <div style="float:right;">
            <button type="button" class="previousbutton" id="prevBtnCondicionNueva" onclick="nextTabCondicionNueva(-1)">Siguiente</button>
            <button type="button" id="nextBtnCondicionNueva" onclick="nextTabCondicionNueva(1)">Anterior</button>
          </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <span class="step" name="stepCondicionNueva"></span>
        </div>
      </form>



    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab,"CondicionNueva"); // Display the crurrent tab
    </script>



  </div>
</div>
