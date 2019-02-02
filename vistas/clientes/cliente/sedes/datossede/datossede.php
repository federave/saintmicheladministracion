



<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/datossede/datossede.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/datossede/datossede.js"></script>


<div class="contenedordatossede">

  <!-- Nombre -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="nombre" style="font-size:20px">Nombre:</label>
    </div>
    <div class="col-40">
      <input style="color:black" type="text" id="nombreNuevo" name="nombreNuevo" placeholder="Nuevo Nombre">
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary" id="" name="" onclick="nombreNuevo()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>
  <br>

  <!-- Telefono -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="telefono" style="font-size:20px">Telefono:</label>
    </div>
    <div class="col-40">
      <input style="color:black" type="text" id="telefonoNuevo" name="telefonoNuevo" placeholder="Nuevo Telefono">
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary" id="" name="" onclick="telefonoNuevo()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>
  <br>
  <!-- Email -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="email" style="font-size:20px">Email:</label>
    </div>
    <div class="col-40">
      <input style="color:black" type="text" id="emailNuevo" name="emailNuevo" placeholder="Nuevo Email">
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary" id="" name="" onclick="emailNuevo()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>
  <br>
  <!-- Observacion -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="observacion" style="font-size:20px">Observacion:</label>
    </div>
    <div class="col-40">
      <input style="color:black" type="text" id="observacionNueva" name="observacionNueva" placeholder="Nueva Observacion">
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary" id="" name="" onclick="observacionNueva()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>
  <br>
  <!-- Nombre Responsable -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="nombreResponsable" style="font-size:20px">Nombre Responsable:</label>
    </div>
    <div class="col-40">
      <input style="color:black" type="text" id="nombreResponsableNuevo" name="nombreResponsableNuevo" placeholder="Nuevo Nombre Responsable">
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary" id="" name="" onclick="nombreResponsableNuevo()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>
  <br>
  <!-- Apellido Responsable -->
  <div class="row">
    <div class="col-30 text-center">
      <label id="apellidoResponsable" style="font-size:20px">Apellido Responsable:</label>
    </div>
    <div class="col-40">
      <input style="color:black" type="text" id="apellidoResponsableNuevo" name="apellidoResponsableNuevo" placeholder="Nuevo Apellido Responsable">
    </div>
    <div class="col-30 text-center">
      <input type="button" class="btn btn-primary" id="" name="" onclick="apellidoResponsableNuevo()" style="height:50px;font-size:18px" value="Modificar">
    </div>
  </div>
  <br>

</div>
