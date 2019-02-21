

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/maquinas/vermaquinas/vermaquinas.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/maquinas/vermaquinas/vermaquinas.js"></script>

<?php require $_SESSION["raiz"] . '/modelo/maquinas/maquinas.php'?>

  <div class="contenedorvermaquinas">
    <br>
    <br>
    <div class="row text-center">
      <h2>Lista de Maquinas</h2>
    </div>
    <br>
    <br>





      <ul class="list-group">

        <?php
        $k=0;
        while($k<count($maquinasId))
            {
            ?>

            <li class="list-group-item">
              <div class="row">
                <div class="col-60 text-center">
                  <label id="maquinaNombre<?php echo $maquinasId[$k];?>" style="font-size:20px;color:black">   <?php echo $maquinasNombre[$k];?></label>
                </div>
                <div class="col-20">
                  <button class="btn btn-success" id="buttonVerMaquina<?php echo $maquinasId[$k];?>" name="" onclick="verMaquina(<?php echo $maquinasId[$k];?>)" style="height:50px;font-size:18px;margin-left:5%;width:90%;">Ver</button>
                </div>
                <div class="col-20">
                  <button class="btn btn-primary" id="" name="" onclick="modificarMaquina(<?php echo $maquinasId[$k];?>)" style="height:50px;font-size:18px;margin-left:5%;width:90%;">Modificar</button>
                </div>
              </div>

               <div class="row text-center" id="divMaquina<?php echo $maquinasId[$k];?>" style="display:none">

                 <style media="screen">
                   .etiqueta{font-size:20px;color:black;}
                 </style>
                 <label id="nombreMaquina<?php echo $maquinasId[$k];?>" class="etiqueta">Nombre: </label>
                 <br>
                 <label id="marcaMaquina<?php echo $maquinasId[$k];?>" class="etiqueta">Marca: </label>
                 <br>
                 <label id="capacidadMaquina<?php echo $maquinasId[$k];?>" class="etiqueta">Capacidad: </label>
                 <br>
                 <label id="tipoMaquina<?php echo $maquinasId[$k];?>" class="etiqueta">Tipo Maquina: </label>






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
