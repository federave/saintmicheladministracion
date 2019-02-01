

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/sedes.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/sedes.js"></script>

<?php

$sedesId = array();
$sedesId[0] = 1;
$sedesId[1] = 2;

$sedesNombre = array();
$sedesNombre[0] = "Casa";
$sedesNombre[1] = "Oficina";


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

<div class="contenedorsedes">
  <br>
  <br>
  <div class="row text-center">
    <h2>Lista de Sedes</h2>
  </div>
  <br>
  <br>


    <ul class="list-group">
      <?php
      $k=0;
      while($k<count($sedesId))
          {
          ?>
          <li class="list-group-item">
            <div class="row">
              <div class="col-60 text-center">
                <label id="sedeNombre<?php echo $sedesId[$k];?>" style="font-size:20px;color:black"><?php echo $sedesNombre[$k];?></label>
              </div>
              <div class="col-40">
                <button class="btn btn-primary" id="" name="" onclick="modificarSede(<?php echo $sedesId[$k];?>)" style="height:50px;font-size:18px;margin-left:5%;width:90%;">Modificar</button>
              </div>
            </div>
           </li>
        <?php
          $k++;
          }
      ?>
   </ul>

  <br>
  <br>


    <div id="datossede" class="contenedordatossede">
      <br>
      <br>
      <div class="row text-center">
        <h2>Datos de la Sede</h2>
      </div>
      <br>
      <br>

      <!-- Calle -->
      <div class="row">
        <div class="col-30 text-center">
          <label id="calle" style="font-size:20px">Calle: 484</label>
        </div>
        <div class="col-40">
          <input style="color:black" type="text" id="calleNueva" name="calleNueva" placeholder="Nueva Calle">
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
          <input style="color:black" type="text" id="numeroNuevo" name="numeroNuevo" placeholder="Nuevo Numero">
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

          <select class="form-control text-center" id="partidoNuevo" name="partidoNuevo"  placeholder="Nuevo Partido" style="height:50px;width:100%;font-size:20px;text-align-last:center">
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
        <div class="col-30 text-center">
          <input type="button" class="btn btn-primary" id="" name="" onclick="nuevoPartido()" style="height:50px;font-size:18px" value="Modificar">
        </div>
      </div>





      <br>
      <br>
      <br>
      <div class="row text-center">
        <h2>Localización</h2>
      </div>
      <br>
      <br>

      <div class="rowloc1">


        <input type="hidden" name="latitud" id="latitud" value="">
        <input type="hidden" name="longitud" id="longitud" value="">
        <input type="hidden" name="estadoLocalizacion" id="estadoLocalizacion" value="">


        <div class="row text-center">
          <label id="latitudValor" style="font-size:20px">Latitud: </label>
        </div>
        <br>
        <div class="row text-center">
          <label id="longitudValor" style="font-size:20px">Longitud: </label>
        </div>
        <br>
        <br>

        <div class="row text-center" >
          <button id="localizar" style="width: 50%;height:50px;font-size:20px" class="btn btn-success" onclick="localizar()">Localizar</button>
        </div>
        <br>
        <br>
        <div class="row text-center" >
          <button id="guardar" style="width: 50%;height:50px;font-size:20px" class="btn btn-primary" onclick="guardarLocalizacion()">Guardar</button>
        </div>



      </div>

      <br>
      <br>
      <br>

      <div class="rowloc2">
        <div class="mapa" id="mapaDireccion" name=id="mapaDireccion" ></div>
      </div>



      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvfC-iOgKDhU6GpnSHCipF-wQEBIWS3-U&callback=iniciarMapaDireccion">
      </script>


      <br>
      <br>




    </div>



</div>
