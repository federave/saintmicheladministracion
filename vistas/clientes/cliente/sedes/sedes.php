

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/sedes.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/sedes.js"></script>


<?php require $_SESSION["raiz"] . '/modelo/clientes/cliente/sedes.php'?>




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
                <button class="btn btn-primary" id="" name="" onclick="modificarSede(<?php echo $sedesId[$k];?>,<?php echo $idcliente;?>)" style="height:50px;font-size:18px;margin-left:5%;width:90%;">Modificar</button>
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

</div>



<br>

<div id="divSede" class="row" style="display:none">
  <div class="text-center">
    <h1 id="tituloSede">Sede:  </h1>
  </div>
  <br>
  <br>

  <input type="hidden" name="idSede" id="idSede" value="">


  <div class="row" style="width:90%;margin-left:5%" >


    <ul class="nav nav-tabs">
      <li name="liModificarSede" class="active"><a class="items" onclick="seleccionarTabModificarSede(0)">Datos</a></li>
      <li name="liModificarSede" class="li"><a class="items" onclick="seleccionarTabModificarSede(1)">Direccion</a></li>
      <li name="liModificarSede" class="li"><a class="items" onclick="seleccionarTabModificarSede(2)">Asignación</a></li>
      <li name="liModificarSede" class="li"><a class="items" onclick="seleccionarTabModificarSede(3)">Alquileres</a></li>
      <li name="liModificarSede" class="li"><a class="items" onclick="seleccionarTabModificarSede(4)">Comodatos</a></li>

    </ul>


  </div>

  <br>
  <br>
  <br>

  <div name="divTabModificarSede" class="row divTabModificarSede" style="display:block">
    <?php require('datossede/datossede.php'); ?>
  </div>
  <div name="divTabModificarSede" class="row divTabModificarSede">
    <?php require('direccion/direccion.php'); ?>
  </div>

  <div name="divTabModificarSede" class="row divTabModificarSede">
    <?php require('asignacion/asignacion.php'); ?>
  </div>

  <div name="divTabModificarSede" class="row divTabModificarSede">
    <?php require('alquileres/alquileres.php'); ?>
  </div>

  <div name="divTabModificarSede" class="row divTabModificarSede">
    <?php require('comodatos/comodatos.php'); ?>
  </div>


</div>
