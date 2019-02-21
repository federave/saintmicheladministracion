

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/productos/verproductos/verproductos.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/productos/verproductos/verproductos.js"></script>

<?php require $_SESSION["raiz"] . '/modelo/productos/productos.php'?>


  <div class="contenedorvp">
    <br>
    <br>
    <div class="row text-center">
      <h2>Lista de Productos</h2>
    </div>
    <br>
    <br>





      <ul class="list-group">

        <?php
        $k=0;
        while($k<count($productosId))
            {
            ?>

            <li class="list-group-item">
              <div class="rowvp">
                <div class="col-50 text-center">
                  <label id="productoNombre<?php echo $productosId[$k];?>" style="font-size:20px;color:black">   <?php echo $productosNombre[$k];?></label>
                </div>
                <div class="col-25">
                  <button class="btn btn-success" id="buttonVerProducto<?php echo $productosId[$k];?>" name="" onclick="verProducto(<?php echo $productosId[$k];?>)" style="height:50px;font-size:18px;margin-left:5%;width:90%;">Ver</button>
                </div>
                <div class="col-25">
                  <button class="btn btn-primary" id="" name="" onclick="modificarProducto(<?php echo $productosId[$k];?>)" style="height:50px;font-size:18px;margin-left:5%;width:90%;">Modificar</button>
                </div>
              </div>

               <div class="rowvp text-center" id="divProducto<?php echo $productosId[$k];?>" style="display:none">

                 <style media="screen">
                   .etiqueta{font-size:20px;color:black;}
                 </style>
                 <label id="nombreProducto<?php echo $productosId[$k];?>" class="etiqueta">Nombre: </label>
                 <br>
                 <label id="litrosProducto<?php echo $productosId[$k];?>" class="etiqueta">Litros: </label>
                 <br>
                 <label id="tipoProducto<?php echo $productosId[$k];?>" class="etiqueta">TipoProducto: </label>
                 <br>
                 <label id="insumosProducto<?php echo $productosId[$k];?>" class="etiqueta">Insumos: </label>






               </div>

             </li>
          <?php
            $k++;
            }
        ?>


     </ul>











 <br>
 <br>

</div>
