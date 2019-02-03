
<?php

$partidosId = array();
$partidosId[0] = 1;
$partidosId[1] = 2;
$partidosId[2] = 3;
$partidosId[3] = 4;
$partidosId[4] = 5;

$partidosNombre = array();
$partidosNombre[0] = "La Plata";
$partidosNombre[1] = "Berisso";
$partidosNombre[2] = "Ensenada";
$partidosNombre[3] = "Gonnet";
$partidosNombre[4] = "City Bell";


?>


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/direccion/direccion.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/direccion/direccion.js"></script>

<div class="contenedordireccion">
  <br>
  <br>
  <div class="row text-center">
    <h2>Dirección</h2>
  </div>
  <br>
  <br>

  <!-- Calle -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="calle" style="font-size:20px">Calle: 484</label>
    </div>
    <div class="col-40">
      <input onchange="limpiarLocalizacionNuevo()" style="color:black" type="text" id="calleNueva" name="calleNueva" placeholder="Nueva Calle">
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary" id="" name="" onclick="nuevaCalle()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>
  <br>


  <!-- Numero -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="numero" style="font-size:20px">Numero: </label>
    </div>
    <div class="col-40">
      <input onchange="limpiarLocalizacionNuevo()" style="color:black" type="text" id="numeroNuevo" name="numeroNuevo" placeholder="Nuevo Numero">
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary" id="" name="" onclick="nuevoNumero()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>
  <br>

  <!-- Entre 1 -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="entre1" style="font-size:20px">Entre 1: 484</label>
    </div>
    <div class="col-40">
      <input style="color:black" type="text" id="entre1Nuevo" name="entre1Nuevo" placeholder="Nuevo Entre 1">
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary" id="" name="" onclick="nuevoEntre1()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>
  <br>


  <!-- Entre 2 -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="entre2" style="font-size:20px">Entre 2: 484</label>
    </div>
    <div class="col-40">
      <input style="color:black" type="text" id="entre2Nuevo" name="entre2Nuevo" placeholder="Nuevo Entre 2">
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary" id="" name="" onclick="nuevoEntre2()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>
  <br>

  <!-- Departamento  -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="departamento" style="font-size:20px">Departamento: </label>
    </div>
    <div class="col-40">
      <input style="color:black" type="text" id="departamentoNuevo" name="departamentoNuevo" placeholder="Nuevo Departamento">
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary" id="" name="" onclick="nuevoDepartamento()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>
  <br>


  <!-- Piso  -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="piso" style="font-size:20px">Piso: </label>
    </div>
    <div class="col-40">
      <input style="color:black;height:50px;width:100%;text-align:center" type="number" min="0" max="50" id="pisoNuevo" name="pisoNuevo" placeholder="Nueva Piso">
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary" id="" name="" onclick="nuevoPiso()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>
  <br>


  <!-- Partido -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="partido" style="font-size:20px">Partido: </label>
    </div>
    <div class="col-40 ">
      <select class="form-control text-center" id="partidoNuevo" name="partidoNuevo" style="height:50px;width:100%;font-size:20px;text-align-last:center">
        <?php
        $k=0;
        while($k<count($partidosId))
            {
            ?>
            <option id="partido<?php echo $partidosId[$k];?>" value="<?php echo $partidosId[$k];?>" style="color:black;font-size:20px;">
              <?php echo $partidosNombre[$k];?>
            </option>
          <?php
            $k++;
            }
        ?>
      </select>
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary" id="" name="" onclick="nuevoPartido()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>

  <br>
  <br>

  <br>

  <div class="row contenedorlocalizacion text-center">
    <style media="screen">
      .etiqueta{font-size:20px;color:white}
    </style>
    <button type="button" class="botonLocalizar btn btn-primary" id="" name="" onclick="localizarNuevo()" >Localizar</button>
    <br>
    <br>

    <button type="button" class="botonLocalizar btn btn-success" id="" name="" onclick="guardarLocalizacion()" >Guardar Localización</button>
    <br>
    <br>
    <label id="localizacionNueva" class="etiqueta">Estado: </label>
    <input type="hidden" name="estadoLocalizacionNuevo" id="estadoLocalizacionNuevo" value="0">
    <br>
    <label id="etiquetaLatitudNueva" class="etiqueta">Latitud: </label>
    <input type="hidden" name="latitudNueva" id="latitudNueva" value="">
    <br>
    <label id="etiquetaLongitudNueva" class="etiqueta">Longitud: </label>
    <input type="hidden" name="longitudNueva" id="longitudNueva" value="">
    <br>
    <br>
    <br>
    <div class="mapa" id="mapa" ></div>
  </div>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDb-EOuDpEW26-ToL5tD55CsLhSmI9y7ig&callback=initMap">
  </script>


  <br>
  <br>
  <br>
  <br>

</div>