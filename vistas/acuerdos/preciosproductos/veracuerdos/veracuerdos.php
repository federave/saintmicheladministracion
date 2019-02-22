

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/preciosproductos/veracuerdos/veracuerdos.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/preciosproductos/veracuerdos/veracuerdos.js"></script>

<?php require $_SESSION["raiz"] . '/modelo/acuerdos/preciosproductos/acuerdospreciosproductos.php'?>


  <div class="contenedoracuerdospreciosproductos">
    <br>
    <br>
    <div class="row text-center">
      <h1 style="color:white">Lista de Acuerdos Precios Productos</h1>
    </div>
    <br>
    <br>





      <ul class="list-group">

        <?php
        $k=0;
        while($k<count($acuerdospreciosproductosId))
            {
            ?>

            <li class="list-group-item">
              <div class="row">
                <div class="col-60 text-center">
                  <label id="nombreAcuerdoPreciosProductos<?php echo $acuerdospreciosproductosId[$k];?>" style="font-size:20px;color:black">   <?php echo $acuerdospreciosproductosNombre[$k];?></label>
                </div>
                <div class="col-20">
                  <button class="btn btn-success" id="buttonVerAcuerdoPreciosProductos<?php echo $acuerdospreciosproductosId[$k];?>" name="" onclick="verAcuerdoPreciosProductos(<?php echo $acuerdospreciosproductosId[$k];?>)" style="height:50px;font-size:18px;margin-left:5%;width:90%;">Ver</button>
                </div>
                <div class="col-20">
                  <button class="btn btn-primary" id="buttonModificarAcuerdoPreciosProductos<?php echo $acuerdospreciosproductosId[$k];?>" name="" onclick="modificarAcuerdoPreciosProductos(<?php echo $acuerdospreciosproductosId[$k];?>)" style="height:50px;font-size:18px;margin-left:5%;width:90%;">Modificar</button>
                </div>
              </div>

               <div class="row text-center" id="divAcuerdoPreciosProductos<?php echo $acuerdospreciosproductosId[$k];?>" style="display:none">

                 <style media="screen">
                   .etiqueta{font-size:20px;color:black;}
                 </style>
                 <label id="nombreAcuerdoPreciosProductosDatos<?php echo $acuerdospreciosproductosId[$k];?>" class="etiqueta">Nombre: </label>
                 <br>
                 <label id="fechaCreacionAcuerdoPreciosProductos<?php echo $acuerdospreciosproductosId[$k];?>" class="etiqueta">Nombre: </label>
                 <br>
                 <div id="preciosAcuerdoPreciosProductos<?php echo $acuerdospreciosproductosId[$k];?>" class="row text-center"></div>

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
