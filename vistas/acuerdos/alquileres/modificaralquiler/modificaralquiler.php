


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/alquileres/modificaralquiler/modificaralquiler.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/alquileres/modificaralquiler/modificaralquiler.js"></script>


  <?php

  ?>

  <input type="hidden" name="idAlquiler" id="idAlquiler" value="">
  <br>
  <br>
  <div id="contenedormodificaralquiler" class="contenedormodificaralquiler">

        <div class="row text-center">
          <h2>Datos Del Alquiler</h2>
        </div>
        <br>
        <br>
        <br>


        <!-- Nombre -->
        <div class="row">
          <div class="col-30 text-center">
            <label id="nombreAlquiler" style="font-size:20px">Nombre: </label>
          </div>
          <div class="col-40">
            <input style="color:black" type="text" id="nombreNuevoAlquiler" name="nombreNuevoAlquiler" placeholder="Nuevo Nombre">
          </div>
          <div class="col-30 text-center">
            <input type="button" class="btn btn-primary botonmodificar botontema" id="" name="" onclick="nombreNuevoAlquiler()" value="Modificar">
          </div>
        </div>
        <br>
        <div class="row" id="alertaNombreNuevoAlquiler">

        </div>

        <br>
        <br>

        <!-- Precio -->
        <div class="row">
          <div class="col-30 text-center">
            <label id="precioAlquiler" style="font-size:20px">Precio: </label>
          </div>
          <div class="col-40">
            <input style="color:black" type="number" min="1" value="" step="0.1" id="precioNuevoAlquiler" name="precioNuevoAlquiler" placeholder="Nuevo Precio">
          </div>
          <div class="col-30 text-center">
            <input type="button" class="btn btn-primary botonmodificar botontema" id="" name="" onclick="precioNuevoAlquiler()"  value="Modificar">
          </div>
        </div>
        <br>
        <div class="row" id="alertaPrecioNuevoAlquiler">

        </div>












  </div>
