



<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/productos/modificarproducto/modificarproducto.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/productos/modificarproducto/modificarproducto.js"></script>

<?php // son llamados en nuevoproducto ?>
<?php //require $_SESSION["raiz"] . '/modelo/productos/tiposproductos.php'?>
<?php //require $_SESSION["raiz"] . '/modelo/insumos/insumos.php'?>



  <input type="hidden" name="idProducto" id="idProducto" value="">

  <div class="contenedormp">
    <br>
    <br>
    <div class="row text-center">
      <h2>Datos Del Producto</h2>
    </div>
    <br>
    <br>

    <!-- Nombre -->
    <div class="row">
      <div class="col-30 text-center">
        <label id="nombreProducto" style="font-size:20px">Nombre: </label>
      </div>
      <div class="col-40">
        <input style="color:black" type="text" id="nombreProductoNuevo" name="nombreProductoNuevo" placeholder="Nuevo Nombre">
      </div>
      <div class="col-30 text-center">
        <input type="button" class="boton btn btn-primary" id="" name="" onclick="nombreProductoNuevo()" style="height:50px;font-size:18px" value="Modificar">
      </div>
    </div>
    <br>

    <div id="alertaNombreProductoNuevo">

    </div>

    <br>
    <br>

    <!-- Litros -->
    <div class="row">
      <div class="col-30 text-center">
        <label id="litrosProducto" style="font-size:20px">Litros: </label>
      </div>
      <div class="col-40 text-center">
        <input style="color:black;" class="text-center" type="number" step="0.1" id="litrosProductoNuevo" name="litrosProductoNuevo" placeholder="Nuevo Cantidad">
      </div>
      <div class="col-30 text-center">
        <input type="button" class="boton btn btn-primary" id="" name="" onclick="litrosProductoNuevo()" style="height:50px;font-size:18px;height:50px;font-size:18px" value="Modificar">
      </div>
    </div>
    <br>
    <div id="alertaLitrosProductoNuevo">

    </div>
    <br>
    <br>

    <!-- Tipo de Producto -->

    <div class="row text-center">
      <h2>Tipo de Producto</h2>
    </div>
    <br>
    <br>

    <div class="row">
      <div class="col-30 text-center">
        <label id="tipoProducto" style="font-size:20px">Tipo Producto </label>
      </div>
      <div class="col-40 ">

        <select class="form-control text-center" id="tipoProductoNuevo" name="tipoProductoNuevo" style="height:50px;width:100%;font-size:20px;text-align-last:center">
          <?php

          $k=0;
          while($k<count($tiposProductoId))
              {
              ?>
              <option id="idTipoProductoNuevo<?php echo $tiposProductoId[$k];?>" value="<?php echo $tiposProductoId[$k];?>" style="color:black;font-size:20px;">
                <?php echo $tiposProductoNombre[$k];?>
              </option>
            <?php
              $k++;
              }
          ?>
        </select>

      </div>
      <div class="col-30 text-center">
        <input type="button" class="boton btn btn-primary" id="" name="" onclick="tipoProductoNuevo()" style="height:50px;font-size:18px;height:50px;font-size:18px" value="Modificar">
      </div>
    </div>
    <br>
    <div id="alertaTipoProductoNuevo">

    </div>
    <br>
    <br>

    <div class="row text-center">
      <h2>Insumos</h2>
    </div>

    <br>

    <div class="contenedorInsumos" style="padding: 5%;height:500px;background-color:white; overflow-y: scroll;">

    <div class="funkyradio">


      <?php
      $k=0;
      while($k<count($insumosId))
          {
          ?>

         <div class="funkyradio-info text-center">
             <input onchange="actualizarInsumo(<?php echo $insumosId[$k]; ?>)" type="checkbox" name="insumosNuevo" id="insumoNuevo<?php echo $insumosId[$k]; ?>" value="<?php echo $insumosId[$k]; ?>"/>
             <label for="insumoNuevo<?php echo $insumosId[$k]; ?>" style="color:black;font-size:18px"><?php echo $insumosNombre[$k]; ?></label>
             <div id="alertaInsumo<?php echo $insumosId[$k]; ?>">

             </div>
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

  </div>
