
<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/alquileres/alquileres.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/alquileres/alquileres.js"></script>





<div class="contenedoralquileres">

      <br>
      <br>

      <input type="hidden" id="idalquilersede" value="">
      <div class="row">
        <div class="text-center">
          <h1 id="labelEstadoAlquiler" style="color:white">Alquiler Actual</h1>
        </div>
      </div>
      <br>
      <br>

      <div id="divAlquilerActual" class="divalquileractual row text-center borde" style="">

        <br>
        <label class="labelAlquilerActual" id="labelNombreAlquiler">Nombre: </label>
        <br>
        <label class="labelAlquilerActual" id="labelPrecioAlquiler">Precio: </label>
        <br>
        <label class="labelAlquilerActual" id="labelEstadoPrecioEspecialAlquiler">Precio Especial: </label>
        <br>
        <label class="labelAlquilerActual" id="labelFechaInicioAlquiler">Fecha Inicio: </label>
        <br>
        <label class="labelAlquilerActual">Productos</label>
        <br>
        <div class="row" id="divProductosAlquiler">
        </div>
        <br>
        <label class="labelAlquilerActual">Maquinas</label>
        <br>
        <div class="row" id="divMaquinasAlquiler">
        </div>
        <br>

      </div>

      <br>
      <br>
      <br>
      <br>

      <div class="row" style="width:90%;margin-left:5%" >
        <ul class="nav nav-tabs">
          <li name="liAlquileres" class="active"><a class="items"  onclick="seleccionarTabAlquileres(0)">Seleccionar Alquiler</a></li>
          <li name="liAlquileres" class="li"><a class="items"  onclick="seleccionarTabAlquileres(1)">Establecer Precio Especial</a></li>
        </ul>
      </div>

      <br>

      <div name="tabAlquileres" class="row divTabAlquileres" style="display:block">
        <?php  require('seleccionaralquiler/seleccionaralquiler.php'); ?>
      </div>
      <div name="tabAlquileres" class="row divTabAlquileres">
        <br>
        <br>

      <div class="row" style="width:80%;margin:auto">
        <div class="col-50">
          <input style="color:black" type="text" id="precioespecialalquiler" name="precioespecialalquiler" placeholder="Precio Especial">
        </div>
        <div class="col-50">
          <input type="button" class="btn btn-primary botontema" id="" name="" onclick="establecerPrecioEspecial()" style="height:50px;font-size:18px" value="Establecer">
        </div>
      </div>
      <br>
      <div class="row alerta" id="alertaPrecioEspecialAlquiler"></div>
      <br>
      <br>
      <br>
      <br>
      <br>












      </div>


    </div>
