


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/nuevo/sede/sede.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/nuevo/sede/sede.js"></script>

<?php require $_SESSION["raiz"] . '/modelo/clientes/sedes/partidos.php'?>
<?php require $_SESSION["raiz"] . '/modelo/clientes/sedes/tipossede.php'?>
<?php require $_SESSION["raiz"] . '/modelo/clientes/sedes/zonas.php'?>



<div class="tabClienteNuevo">

  <div class="text-center">
    <h1 style="color:black">Sede</h1>
  </div>

  <br>

  <div class="row text-center">
    <label for="nombreSede" style="color:black;font-size:18px">Nombre Sede</label>
    <input style="color:black" placeholder="Nombre" type="text" oninput="this.className = ''" name="nombreSede" id="nombreSede" value="b">
  </div>
  <br>
  <div class="row text-center">
    <label for="telefonoSede" style="color:black;font-size:18px">Telefono</label>
    <input style="color:black" placeholder="Telefono" type="text" oninput="this.className = ''" name="telefonoSede" id="telefonoSede" value="">
  </div>
  <br>
  <div class="row text-center">
    <label for="emailSede" style="color:black;font-size:18px">Email</label>
    <input style="color:black" placeholder="Email" type="text" oninput="this.className = ''" name="emailSede" id="emailSede" value="">
  </div>
  <br>
  <div class="row text-center">
    <label for="observacionSede" style="color:black;font-size:18px">Observacion</label>
    <input style="color:black" placeholder="Observacion" type="text" oninput="this.className = ''" name="observacionSede" id="observacionSede" value="">
  </div>

  <br>
  <div class="row text-center">
    <label for="tipoSede" style="color:black;font-size:18px">Tipo Sede</label>
    <select class="form-control text-center" id="tipoSede" name="tipoSede" style="height:50px;width:100%;font-size:20px;text-align-last:center">
      <?php

      $k=0;
      while($k<count($tiposSedeId))
          {
          ?>
          <option id="tipoSede<?php echo $tiposSedeId[$k];?>" value="<?php echo $tiposSedeId[$k];?>" style="color:black;font-size:20px;">
            <?php echo $tiposSedeNombre[$k];?>
          </option>
        <?php
          $k++;
          }
      ?>
    </select>
  </div>

  <br>


  <div class="text-center">
    <h2 style="color:black">Responsable Sede</h2>
  </div>
  <br>
  <div class="row text-center">
    <label for="nombreResponsableSede" style="color:black;font-size:18px">Nombre</label>
    <input style="color:black" placeholder="Nombre" type="text" oninput="this.className = ''" name="nombreResponsableSede" id="nombreResponsableSede" value="c">
  </div>
  <br>
  <div class="row text-center">
    <label for="apellidoResponsableSede" style="color:black;font-size:18px">Apellido</label>
    <input style="color:black" placeholder="Apellido" type="text" oninput="this.className = ''" name="apellidoResponsableSede" id="apellidoResponsableSede">
  </div>

  <br>
  <br>

  <div class="text-center">
    <h2 style="color:black">Horarios Sede</h2>
  </div>
  <br>
  <div class="row">
    <h4 style="color:black">Lista de Horarios</h4>
    <input type="hidden" name="numeroHorarios" id="numeroHorarios" value="0">
    <ul id="listaHorarios" class="list-group">

    </ul>
  </div>
  <br>
  <div class="row text-center">
    <h4 style="color:black">Nuevo Horario</h4>
    <br>
    <label for="horaInicio" style="color:black;font-size:18px">Hora de Inicio</label>
    <input style="color:black" placeholder="Hora de Inicio" type="time" min="08:00:00" max="21:00:00" step="60" value="08:00:00" oninput="this.className = ''" name="horaInicio" id="horaInicio">
    <br>
    <label for="horaFin" style="color:black;font-size:18px">Hora de Fin</label>
    <input style="color:black" placeholder="Hora de Fin" type="time" min="08:00:00" max="21:00:00" step="60" value="09:00:00" oninput="this.className = ''" name="horaFin" id="horaFin">
    <br>
    <br>
    <input type="button" class="boton btn btn-primary" id="" name="" onclick="nuevoHorario()" style="height:50px;font-size:18px;width:80%;margin:auto" value="Agregar">
    <br>
    <br>
    <input type="button" class="boton btn btn-primary" id="" name="" onclick="borrarHorarios()" style="height:50px;font-size:18px;width:80%;margin:auto" value="Borrar Horarios">
    <br>
    <br>
    <br>

  </div>





</div>




<div class="tabClienteNuevo">

  <br>
  <div class="text-center">
    <h2 style="color:black">Dirección Sede</h2>
  </div>

  <br>
  <div class="row text-center">
    <label for="calleSede" style="color:black;font-size:18px">Calle</label>
    <input onchange="limpiarLocalizacion()" style="color:black" placeholder="Calle" type="text" oninput="this.className = ''" name="calleSede" id="calleSede" value="489">
  </div>
  <br>
  <div class="row text-center">
    <label for="numeroSede" style="color:black;font-size:18px">Numero</label>
    <input onchange="limpiarLocalizacion()" style="color:black" placeholder="Numero" type="text" oninput="this.className = ''" name="numeroSede" id="numeroSede" value="3150">
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
    <label for="partidoSede" style="color:black;font-size:18px">Partido</label>
    <select class="form-control text-center" id="partidoSede" name="partidoSede" style="height:50px;width:100%;font-size:20px;text-align-last:center">
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

  <br>

  <div class="row text-center">
    <label for="zonaSede" style="color:black;font-size:18px">Zona</label>
    <select class="form-control text-center" id="zonaSede" name="zonaSede" style="height:50px;width:100%;font-size:20px;text-align-last:center">
      <?php

      $k=0;
      while($k<count($zonasId))
          {
          ?>
          <option id="zona<?php echo $zonasId[$k];?>" value="<?php echo $zonasId[$k];?>" style="color:black;font-size:20px;">
            <?php echo $zonasNombre[$k];?>
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
    <label id="localizacionSede" class="etiqueta">Estado: </label>
    <input type="hidden" name="estadoLocalizacionSede" id="estadoLocalizacionSede" value="0">
    <br>
    <br>
    <label id="etiquetaLatitudSede" class="etiqueta">Latitud: </label>
    <input type="hidden" name="latitudSede" id="latitudSede" value=0>
    <br>
    <br>
    <label id="etiquetaLongitudSede" class="etiqueta">Longitud: </label>
    <input type="hidden" name="longitudSede" id="longitudSede" value=0>
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
