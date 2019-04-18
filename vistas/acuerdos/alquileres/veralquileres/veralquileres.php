

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/alquileres/veralquileres/veralquileres.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/alquileres/veralquileres/veralquileres.js"></script>

<?php require $_SESSION["raiz"] . '/modelo/acuerdos/alquileres/alquileres.php'?>


  <div class="contenedorveralquileres">
    <br>
    <br>
    <div class="row text-center">
      <h1 style="color:white">Lista de Alquileres</h1>
    </div>
    <br>
    <br>





      <ul class="list-group">

        <?php
        $k=0;
        while($k<count($alquileresId))
            {
            ?>

            <li class="list-group-item">
              <div class="row">
                <div class="col-50 text-center">
                  <label id="" style="font-size:20px;color:black">   <?php echo $alquileresNombre[$k];?></label>
                </div>
                <div class="col-25">
                  <button class="btn btn-success botontema" id="buttonVerAlquiler<?php echo $alquileresId[$k];?>" name="" onclick="verAlquiler(<?php echo $alquileresId[$k];?>)" style="height:50px;font-size:18px;margin-left:5%;width:90%;">Ver</button>
                </div>
                <div class="col-25">
                  <button class="btn btn-primary botontema" id="buttonModificarAlquiler<?php echo $alquileresId[$k];?>" name="" onclick="modificarAlquiler(<?php echo $alquileresId[$k];?>)" style="height:50px;font-size:18px;margin-left:5%;width:90%;">Modificar</button>
                </div>
              </div>

               <div class="row text-center" id="divAlquiler<?php echo $alquileresId[$k];?>" style="display:none">

                 <style media="screen">
                   .etiqueta{font-size:20px;color:black;}
                 </style>
                 <br>
                 <label id="nombreAlquiler<?php echo $alquileresId[$k];?>" class="etiqueta">Nombre: </label>
                 <br>
                 <label id="precioAlquiler<?php echo $alquileresId[$k];?>" class="etiqueta">Precio: </label>
                 <br>
                 <br>

                 <div style="border: 1px solid #000000;border-radius: 4px;width:80%;margin:auto" id="divProductosAlquiler<?php echo $alquileresId[$k];?>" class="row text-center">
                   <div class="row text-center">
                     <h3 style="color:black">Productos</h3>
                   </div>
                   <br>
                 </div>
                 <br>

                 <div style="border: 1px solid #000000;border-radius: 4px;width:80%;margin:auto" id="divMaquinasAlquiler<?php echo $alquileresId[$k];?>" class="row text-center">
                   <div class="row text-center">
                     <h3 style="color:black">Máquinas</h3>
                   </div>
                   <br>
                 </div>

                 <br>


                 <div style="border: 1px solid #000000;border-radius: 4px;width:90%;margin:auto" id="divPreciosHistoricosAlquiler<?php echo $alquileresId[$k];?>" class="row text-center">
                   <div class="row text-center">
                     <h3 style="color:black">Precios Históricos</h3>
                   </div>
                   <br>
                 </div>
                 <br>



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
