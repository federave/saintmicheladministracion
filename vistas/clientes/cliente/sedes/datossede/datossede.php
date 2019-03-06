



<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/datossede/datossede.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/datossede/datossede.js"></script>



<?php


$nombreSede="";
$telefonoSede="";
$emailSede="";
// ...

$horariosId = array();
$horariosId[0] = 1;
$horariosId[1] = 2;

$horariosHoraInicio = array();
$horariosHoraInicio[0] = "08:00:00";
$horariosHoraInicio[1] = "14:00:00";

$horariosHoraFin = array();
$horariosHoraFin[0] = "13:00:00";
$horariosHoraFin[1] = "18:00:00";






?>

<div class="contenedordatossede">

  <div class="text-center">
    <h2 style="color:white">Datos Sede</h2>
  </div>
  <br>
  <br>
  <br>
  <!-- Nombre -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="nombreSede" style="font-size:20px">Nombre:</label>
    </div>
    <div class="col-40">
      <input style="color:black" type="text" id="nombreNuevoSede" name="nombreNuevoSede" placeholder="Nuevo Nombre">
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary botonmodificar" id="" name="" onclick="nombreNuevoSede()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>
  <br>

  <!-- Telefono -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="telefonoSede" style="font-size:20px">Telefono:</label>
    </div>
    <div class="col-40">
      <input style="color:black" type="text" id="telefonoNuevoSede" name="telefonoNuevoSede" placeholder="Nuevo Telefono">
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary botonmodificar" id="" name="" onclick="telefonoNuevoSede()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>
  <br>
  <!-- Email -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="emailSede" style="font-size:20px">Email:</label>
    </div>
    <div class="col-40">
      <input style="color:black" type="text" id="emailNuevoSede" name="emailNuevoSede" placeholder="Nuevo Email">
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary botonmodificar" id="" name="" onclick="emailNuevoSede()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>
  <br>
  <!-- Observacion -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="observacionSede" style="font-size:20px">Observacion:</label>
    </div>
    <div class="col-40">
      <input style="color:black" type="text" id="observacionNuevaSede" name="observacionNuevaSede" placeholder="Nueva Observacion">
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary botonmodificar" id="" name="" onclick="observacionNuevaSede()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>
  <br>
  <!-- Nombre Responsable -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="nombreResponsableSede" style="font-size:20px">Nombre Responsable:</label>
    </div>
    <div class="col-40">
      <input style="color:black" type="text" id="nombreResponsableNuevoSede" name="nombreResponsableNuevoSede" placeholder="Nuevo Nombre Responsable">
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary botonmodificar" id="" name="" onclick="nombreResponsableNuevoSede()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>
  <br>
  <!-- Apellido Responsable -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="apellidoResponsableSede" style="font-size:20px">Apellido Responsable:</label>
    </div>
    <div class="col-40">
      <input style="color:black" type="text" id="apellidoResponsableNuevoSede" name="apellidoResponsableNuevoSede" placeholder="Nuevo Apellido Responsable">
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary botonmodificar" id="" name="" onclick="apellidoResponsableNuevoSede()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>
  <br>


  <div class="row contenedorhorariossede">
    <br>
    <br>
    <br>

  <div class="text-center">
    <h2 style="color:white">Horarios Sede</h2>
  </div>
  <br>

  <div class="row">
    <h4 style="color:white">Lista de Horarios</h4>
    <br>
    <input type="hidden" name="numeroHorarios" id="numeroHorarios" value=<?php echo count($horariosId); ?>>

    <ul id="listaHorarios" class="list-group">
      <?php

      $k=0;
      while($k<count($horariosId))
          {
          ?>

          <li id="horario<?php echo $horariosId[$k];?>" class="list-group-item">
            <div class="row">
              <div class="col-60 text-center">
                <label style="font-size:20px;color:black">Hora Inicio: <?php echo $horariosHoraInicio[$k];?></label>
                <br>
                <label style="font-size:20px;color:black">Hora Fin: <?php echo $horariosHoraFin[$k];?></label>
              </div>
              <div class="col-40">
                <br>
                <button class="btn btn-primary" onclick="darDeBajaHorario(<?php echo $horariosId[$k];?>)" style="height:50px;font-size:18px;margin:auto;width:90%;">Dar de Baja</button>
              </div>
            </div>
          </li>


        <?php
          $k++;
          }
      ?>
    </ul>
  </div>
  <br>
  <div class="row text-center" style="width:90%;margin:auto">
    <h4 style="color:white">Nuevo Horario</h4>
    <br>
    <label for="horaInicio" style="color:white;font-size:18px">Hora de Inicio</label>
    <input style="color:black" placeholder="Hora de Inicio" type="time" min="08:00:00" max="21:00:00" step="60" value="08:00:00" oninput="this.className = ''" name="horaInicio" id="horaInicio">
    <br>
    <label for="horaFin" style="color:white;font-size:18px">Hora de Fin</label>
    <input style="color:black" placeholder="Hora de Fin" type="time" min="08:00:00" max="21:00:00" step="60" value="08:00:00" oninput="this.className = ''" name="horaFin" id="horaFin">
    <br>
    <br>
    <input type="button" class="boton btn btn-primary" id="" name="" onclick="agregarHorario()" style="height:50px;font-size:18px;width:80%;margin:auto" value="Agregar">
    <br>
    <br>
    <br>

  </div>


</div>







</div>
