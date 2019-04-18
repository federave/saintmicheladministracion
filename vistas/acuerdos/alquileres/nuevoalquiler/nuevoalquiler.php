


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/radiobutton.css">

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/alquileres/nuevoalquiler/nuevoalquiler.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/alquileres/nuevoalquiler/nuevoalquiler.js"></script>
<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/formulario.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/javascript/formulario.js"></script>


<?php require $_SESSION["raiz"] . '/modelo/productos/productos.php'?>
<?php require $_SESSION["raiz"] . '/modelo/maquinas/tiposmaquina.php'?>

<?php $numeroMaquinas = $numeroTiposMaquina; ?>


  <div class="contenedoralquilernuevo">
    <br>
    <br>
    <div class="row text-center">
      <h1 style="color:white">Nuevo Alquiler</h1>
    </div>
    <br>
    <br>





      <form id="formularioAlquilerNuevo" class="formulario"  action="../../../controladores/acuerdos/alquileres/alquilernuevo.php">

        <input type="hidden" name="numeroProductos" id="numeroProductos" value=<?php echo $numeroProductos; ?>>
        <input type="hidden" name="numeroMaquinas" id="numeroMaquinas" value=<?php echo $numeroMaquinas; ?>>
        <input type="hidden" name="alquilerNuevo" id="alquilerNuevo" value="">

        <div class="tabFormulario" name="tabAlquilerNuevo">

          <div class="text-center">
            <h1 style="color:black">Datos Del Alquiler</h1>
          </div>

          <br>
          <br>
          <br>
          <div class="row" style="padding:10px;">
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
          </div>




          <br>
          <br>
          <br>

          <div class="text-center">
            <h1 style="color:black">Productos</h1>
          </div>

          <div style="height:400px;padding: 10px;overflow-y: scroll;">

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
            <h1 style="color:black">Maquinas</h1>
          </div>

          <div style="height:400px;padding: 10px;overflow-y: scroll;">

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
            while($k<count($tiposMaquinaId))
                {
                ?>
               <div class="funkyradio-info text-center">
                   <input onchange="mostrarInputCantidadMaquinas(<?php echo $k;?>)" type="checkbox" name="maquinasAlquilerNuevo" id="maquina<?php echo $k; ?>AlquilerNuevo" value="<?php echo $tiposMaquinaId[$k]; ?>"/>
                   <label for="maquina<?php echo $k; ?>AlquilerNuevo" style="color:black;font-size:18px"><?php echo $tiposMaquinaNombre[$k]; ?></label>
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

<br>

        <div style="overflow:auto;">
          <div style="float:right;">
            <button type="button" class="previousbutton" id="prevBtnAlquilerNuevo" onclick="nextTabAlquilerNuevo(-1)">Siguiente</button>
            <button type="button" id="nextBtnAlquilerNuevo" onclick="nextTabAlquilerNuevo(1)">Anterior</button>
          </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <span class="step" name="stepAlquilerNuevo"></span>
        </div>
      </form>



    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab,"AlquilerNuevo"); // Display the crurrent tab
    </script>



  </div>
</div>
