


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/preciosproductos/modificaracuerdo/modificaracuerdo.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/preciosproductos/modificaracuerdo/modificaracuerdo.js"></script>

  <?php



    $productosId = array();
    $productosId[0] = 1;
    $productosId[1] = 2;
    $productosId[2] = 3;


    $productosNombre = array();
    $productosNombre[0] = "Bidon 10L";
    $productosNombre[1] = "Bidon 8L";
    $productosNombre[2] = "Bidon 5L";

    $numeroProductos = 3;



  ?>

  <input type="hidden" name="idAcuerdoPreciosProductos" id="idAcuerdoPreciosProductos" value="">

  <div class="contenedormodificaracuerdo">
        <br>
        <br>
        <div class="row text-center">
          <h2>Datos Del Acuerdo</h2>
        </div>
        <br>
        <br>


        <div class="row text-center">
          <label id="nombreAcuerdoPreciosProductos" style="font-size:20px">Nombre: </label>
          <br>
          <input style="color:black;width:60%" type="text" id="nombreNuevoAcuerdoPreciosProductos" name="nombreNuevoAcuerdoPreciosProductos" placeholder="Nuevo Nombre">
          <br>
          <br>
          <button class="boton btn btn-primary" id="" name="" onclick="nombreNuevoAcuerdoPreciosProductos()" style="height:50px;font-size:18px;width:60%">Modificar</button>
        </div>

        <br>
        <br>

        <div class="row text-center">
          <h2>Precios Productos</h2>
        </div>

        <br>
        <br>
        <style media="screen">
          .etiquetaBlanca{font-size:20px;color:white;}
        </style>
        <div class="row" id="divProductosAcuerdoPreciosProductos">

        </div>
        <br>
        <br>

        <div class="row text-center">
          <h2>Agregar Productos</h2>
        </div>
        <br>
        <br>

        <div class="row" style="margin:auto;width: 80%;background-color: white;height:500px; overflow-y: scroll;">

          <script type="text/javascript">
            function mostrarInputPrecioAgregar(n)
            {
            if(document.getElementById("producto"+n+"AcuerdoPreciosProductosAgregar").checked)
              document.getElementById("divPrecioProducto"+n+"AcuerdoPreciosProductosAgregar").style.display="block";
            else
              document.getElementById("divPrecioProducto"+n+"AcuerdoPreciosProductosAgregar").style.display="none";
            }
          </script>


          <div class="funkyradio">

            <?php
            $k=0;
            while($k<count($productosId))
                {
                ?>
                <div id="divAgregarProducto<?php echo $productosId[$k];?>" name="divAgregarProducto<?php echo $productosId[$k];?>">

                 <div class="funkyradio-info text-center">
                     <input onchange="mostrarInputPrecioAgregar(<?php echo $k;?>)" type="checkbox" name="productosAcuerdoPreciosProductosAgregar" id="producto<?php echo $k; ?>AcuerdoPreciosProductosAgregar" value="<?php echo $productosId[$k]; ?>"/>
                     <label for="producto<?php echo $k; ?>AcuerdoPreciosProductosAgregar" style="color:black;font-size:18px"><?php echo $productosNombre[$k]; ?></label>
                 </div>
                 <br>
                 <div class="text-center"style="display:none" id="divPrecioProducto<?php echo $k;?>AcuerdoPreciosProductosAgregar" >
                   <input name="precioProducto<?php echo $k;?>AcuerdoPreciosProductosAgregar" id="precioProducto<?php echo $k; ?>AcuerdoPreciosProductosAgregar" class="text-center" style="color:black" type="number" min="0" value="0" step="0.1" placeholder="Precio">
                   <br>
                   <br>
                   <button class="btn btn-primary" onclick="agregarProducto(<?php echo $productosId[$k]; ?>)" style="height:50px;font-size:18px;width:60%;">Agregar</button>;
                 </div>

                </div>

             <?php
               $k++;
               }
             ?>

          </div>
        </div>




        <br>
        <br>

  </div>
