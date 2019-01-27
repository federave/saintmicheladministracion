



<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/maquinas/modificarmaquina/modificarmaquina.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/maquinas/modificarmaquina/modificarmaquina.js"></script>

  <?php


  $tipoMaquinasId = array();
  $tipoMaquinasId[0] = 1;
  $tipoMaquinasId[1] = 2;

  $tipoMaquinasNombre = array();
  $tipoMaquinasNombre[0] = "Dispenser Frio Calor";
  $tipoMaquinasNombre[1] = "Heladera";




  ?>

  <input type="hidden" name="idMaquina" id="idMaquina" value="">

  <div class="contenedormodificarmaquina">
    <br>
    <br>
    <div class="row text-center">
      <h2>Datos de la Máquina</h2>
    </div>
    <br>
    <br>

    <!-- Nombre -->
    <div class="row">
      <div class="col-30 text-center">
        <label id="nombreMaquina" style="font-size:20px">Nombre: </label>
      </div>
      <div class="col-40">
        <input style="color:black" type="text" id="nombreMaquinaNuevo" name="nombreMaquinaNuevo" placeholder="Nuevo Nombre">
      </div>
      <div class="col-30 text-center">
        <input type="button" class="boton btn btn-primary" id="" name="" onclick="nombreMaquinaNuevo()" style="height:50px;font-size:18px" value="Modificar">
      </div>
    </div>
    <br>
    <div id="alertaNombreMaquinaNuevo">

    </div>
    <br>


    <!-- Marca -->
    <div class="row">
      <div class="col-30 text-center">
        <label id="marcaMaquina" style="font-size:20px">Marca: </label>
      </div>
      <div class="col-40">
        <input style="color:black" type="text" id="marcaMaquinaNueva" name="marcaMaquinaNueva" placeholder="Nueva Marca">
      </div>
      <div class="col-30 text-center">
        <input type="button" class="boton btn btn-primary" id="" name="" onclick="marcaMaquinaNueva()" style="height:50px;font-size:18px" value="Modificar">
      </div>
    </div>
    <br>
    <div id="alertaMarcaMaquinaNueva">

    </div>
    <br>



    <!-- Capacidad -->
    <div class="row">
      <div class="col-30 text-center">
        <label id="capacidadMaquina" style="font-size:20px">Capacidad: </label>
      </div>
      <div class="col-40">
        <input style="color:black" type="text" id="capacidadMaquinaNueva" name="capacidadMaquinaNueva" placeholder="Nueva Capacidad">
      </div>
      <div class="col-30 text-center">
        <input type="button" class="boton btn btn-primary" id="" name="" onclick="capacidadMaquinaNueva()" style="height:50px;font-size:18px" value="Modificar">
      </div>
    </div>
    <br>
    <div id="alertaCapacidadMaquinaNueva">

    </div>
    <br>


    <!-- Tipo Maquina -->
    <div class="row">
      <div class="col-30 text-center">
        <label id="tipoMaquina" style="font-size:20px">Tipo Maquina: </label>
      </div>
      <div class="col-40">

        <select class="form-control text-center" id="tipoMaquinaNuevo" name="tipoMaquinaNuevo" style="height:50px;width:100%;font-size:20px;text-align-last:center">
          <?php

          $k=0;
          while($k<count($tipoMaquinasId))
              {
              ?>
              <option value="<?php echo $tipoMaquinasId[$k];?>" style="color:black;font-size:20px;">
                <?php echo $tipoMaquinasNombre[$k];?>
              </option>
            <?php
              $k++;
              }
          ?>
        </select>

      </div>
      <div class="col-30 text-center">
        <input type="button" class="btn btn-primary" id="" name="" onclick="tipoMaquinaNuevo()" style="height:50px;font-size:18px" value="Modificar">
      </div>

    </div>
    <br>
    <div id="alertaTipoMaquinaNuevo">

    </div>













    <br>
    <br>

  </div>
