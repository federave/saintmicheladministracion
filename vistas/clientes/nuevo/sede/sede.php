


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/nuevo/sede/sede.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/nuevo/sede/sede.js"></script>


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



<div class="tabClienteNuevo">

  <div class="text-center">
    <h1 style="color:black">Sede</h1>
  </div>

  <br>

  <div class="row text-center">
    <label for="nombreSede" style="color:black;font-size:18px">Nombre Sede</label>
    <input style="color:black" placeholder="Nombre" type="text" oninput="this.className = ''" name="nombreSede" id="nombreSede">
  </div>
  <br>
  <div class="text-center">
    <h2 style="color:black">Responsable Sede</h2>
  </div>
  <br>
  <div class="row text-center">
    <label for="nombreResponsableSede" style="color:black;font-size:18px">Nombre</label>
    <input style="color:black" placeholder="Nombre" type="text" oninput="this.className = ''" name="nombreResponsableSede" id="nombreResponsableSede">
  </div>
  <br>
  <div class="row text-center">
    <label for="apellidoResponsableSede" style="color:black;font-size:18px">Apellido</label>
    <input style="color:black" placeholder="Apellido" type="text" oninput="this.className = ''" name="apellidoResponsableSede" id="apellidoResponsableSede">
  </div>


  <br>
  <div class="text-center">
    <h2 style="color:black">Dirección Sede</h2>
  </div>

  <br>
  <div class="row text-center">
    <label for="calleSede" style="color:black;font-size:18px">Calle</label>
    <input style="color:black" placeholder="Calle" type="text" oninput="this.className = ''" name="calleSede" id="calleSede">
  </div>
  <br>
  <div class="row text-center">
    <label for="numeroSede" style="color:black;font-size:18px">Calle</label>
    <input style="color:black" placeholder="Numero" type="text" oninput="this.className = ''" name="numeroSede" id="numeroSede">
  </div>
  <br>
  <div class="row text-center">
    <label for="entre1Sede" style="color:black;font-size:18px">Entre 2</label>
    <input style="color:black" placeholder="Entre 1" type="text" oninput="this.className = ''" name="entre1Sede" id="entre1Sede">
  </div>
  <br>
  <div class="row text-center">
    <label for="entre2Sede" style="color:black;font-size:18px">Entre 1</label>
    <input style="color:black" placeholder="Entre 2" type="text" oninput="this.className = ''" name="entre2Sede" id="entre2Sede">
  </div>
  <br>
  <div class="row text-center">
    <label for="departamentoSede" style="color:black;font-size:18px">Departamento</label>
    <input style="color:black" placeholder="Entre 2" type="text" oninput="this.className = ''" name="departamentoSede" id="departamentoSede">
  </div>
  <br>
  <div class="row text-center">
    <label for="pisoSede" style="color:black;font-size:18px">Piso</label>
    <input style="color:black" placeholder="Entre 2" type="text" oninput="this.className = ''" name="pisoSede" id="pisoSede">
  </div>
  <br>
  <div class="row text-center">
    <label for="partido" style="color:black;font-size:18px">Partido</label>
    <select class="form-control text-center" id="partido" name="partido" style="height:50px;width:100%;font-size:20px;text-align-last:center">
      <?php

      $k=0;
      while($k<count($partidosId))
          {
          ?>
          <option value="<?php echo $partidosId[$k];?>" style="color:black;font-size:20px;">
            <?php echo $partidosNombre[$k];?>
          </option>
        <?php
          $k++;
          }
      ?>
    </select>
  </div>

  <br>
  <div class="row text-center">
    <style media="screen">
      .etiqueta{font-size:20px;color:black}
    </style>
    <button style="height:50px;font-size:18px;width:80%;margin:auto"type="button" class="boton btn btn-primary" id="" name="" onclick="localizar()" >Localizar</button>
    <br>
    <br>
    <label id="localizacion" class="etiqueta">Estado: </label>
    <input type="hidden" name="estadoLocalización" id="estadoLocalización" value="0">
    <br>
    <br>
    <label id="etiquetaLatitud" class="etiqueta">Latitud: </label>
    <input type="hidden" name="latitud" id="latitud" value="">
    <br>
    <br>
    <label id="etiquetaLongitud" class="etiqueta">Longitud: </label>
    <input type="hidden" name="longitud" id="longitud" value="">
  </div>

  <br>
  <br>

  <div class="row" style="margin:auto;width:90%;">
    <div class="mapa" id="mapa" ></div>
  </div>



  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDb-EOuDpEW26-ToL5tD55CsLhSmI9y7ig&callback=initMap">
  </script>


  <br>
  <br>

</div>