


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/radiobutton.css">

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/bonificaciones/nuevabonificacion/nuevabonificacion.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/bonificaciones/nuevabonificacion/nuevabonificacion.js"></script>

<?php require $_SESSION["raiz"] . '/modelo/productos/productos.php'?>



  <div class="contenedornuevabonificacion">
    <br>
    <br>
    <div class="row text-center">
      <h1 style="color:white">Nueva Bonificación</h1>
    </div>
    <br>
    <br>





      <form class="regFormNuevaBonificacion" id="regFormNuevaBonificacion" action="../../../controladores/acuerdos/bonificaciones/bonificacionnueva.php">

        <input type="hidden" name="numeroProductos" id="numeroProductos" value=<?php echo $numeroProductos; ?>>
        <input type="hidden" name="bonificacionNueva" id="bonificacionNueva" value="">

        <div class="tabNuevaBonificacion">

          <div class="text-center">
            <h1 style="color:black">Datos De la Bonificacion</h1>
          </div>

          <br>
          <br>
          <div class="row text-center">
            <label for="nombreBonificacionNueva" style="color:black;font-size:18px">Ingresar Nombre</label>
            <input style="color:black" placeholder="Nombre" type="text" oninput="this.className = ''" name="nombreBonificacionNueva" id="nombreBonificacionNueva">
          </div>

          <br>
          <br>
          <div class="row text-center">
            <label for="cantidadMinimaBonificacionNueva" style="color:black;font-size:18px">Cantidad Minima</label>
            <input class="text-center" style="color:black" type="number" min="1" value="1" step="1" placeholder="Cantidad Minima" oninput="this.className = ''" name="cantidadMinimaBonificacionNueva" id="cantidadMinimaBonificacionNueva">
          </div>
          <br>
          <br>


          <div class="row text-center">
            <label style="color:black;font-size:18px">Cantidad Maxima</label>
            <div class="funkyradio">
              <div class="funkyradio-info text-center">
                  <input onchange="mostrarCantidadMaxima()" type="checkbox" name="estadoCantidadMaxima" id="estadoCantidadMaxima" value=""/>
                  <label for="estadoCantidadMaxima" style="color:black;font-size:18px">Ingresar Cantidad Maxima</label>
              </div>
            </div>

            <script type="text/javascript">
              function mostrarCantidadMaxima()
              {
              if(document.getElementById("estadoCantidadMaxima").checked)
                document.getElementById("cantidadMaximaBonificacionNueva").style.display="block";
              else
                document.getElementById("cantidadMaximaBonificacionNueva").style.display="none";
              }
            </script>
            <br>
            <input  class="text-center" style="color:black;display:none" type="number" min="1" value="1" step="1" placeholder="Cantidad Maxima" oninput="this.className = ''" name="cantidadMaximaBonificacionNueva" id="cantidadMaximaBonificacionNueva">

          </div>

          <br>
          <br>
          <div class="row text-center">
            <label for="porcentajeBonificacionNueva" style="color:black;font-size:18px">Ingresar Porcentaje % </label>
            <input class="text-center" style="color:black" type="number" min="0" value="0" max="100" step="0.5" placeholder="Porcentaje %" oninput="this.className = ''" name="porcentajeBonificacionNueva" id="porcentajeBonificacionNueva">
          </div>
          <br>
          <br>

          <div class="text-center">
            <h1>Productos</h1>
          </div>

          <div style="height:500px; overflow-y: scroll;">

          <div class="funkyradio">


            <?php
            $k=0;
            while($k<count($productosId))
                {
                ?>

               <div class="funkyradio-info text-center">
                   <input type="checkbox" name="productosBonificacionNueva" id="producto<?php echo $k; ?>BonificacionNueva" value="<?php echo $productosId[$k]; ?>"/>
                   <label for="producto<?php echo $k; ?>BonificacionNueva" style="color:black;font-size:18px"><?php echo $productosNombre[$k]; ?></label>
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
            <button type="button" id="prevBtnNuevaBonificacion" onclick="nextPrevNuevaBonificacion(-1)">Siguiente</button>
            <button type="button" id="nextBtnNuevaBonificacion" onclick="nextPrevNuevaBonificacion(1)">Anterior</button>
          </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <span class="stepNuevaBonificacion"></span>
        </div>
      </form>



    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTabNuevaBonificacion(currentTab); // Display the crurrent tab
    </script>



  </div>
