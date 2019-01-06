



<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/datosprincipales/datosprincipales.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/datosprincipales/datosprincipales.js"></script>

  <?php $idcliente=1; ?>
  <input type="hidden" name="idcliente" id="idcliente" value="<?php echo $idcliente; ?>">

  <div class="contenedordp">


    <!-- Nombre -->
    <div class="rowdp">
      <div class="col-25 text-center">
        <label id="nombre" style="font-size:20px">Nombre: Carlos</label>
      </div>
      <div class="col-50">
        <input style="color:black" type="text" id="nombreNuevo" name="nombreNuevo" placeholder="Nuevo Nombre">
      </div>
      <div class="col-25 text-center">
        <input type="button" class="btn btn-primary" id="" name="" onclick="nuevoNombre()" style="height:50px;font-size:18px" value="Modificar">
      </div>
    </div>

    <!-- Apellido -->
    <div class="rowdp">
      <div class="col-25 text-center">
        <label id="apellido" style="font-size:20px">Apellido: Cesar</label>
      </div>
      <div class="col-50">
        <input style="color:black" type="text" id="apellidoNuevo" name="apellidoNuevo" placeholder="Nuevo Apellido">
      </div>
      <div class="col-25 text-center">
        <input type="button" class="btn btn-primary" id="" name="" onclick="nuevoApellido()" style="height:50px;font-size:18px" value="Modificar">
      </div>
    </div>

    <!-- Email -->
    <div class="rowdp">
      <div class="col-25 text-center">
        <label id="email" style="font-size:20px">Email: auraro@gmail.com</label>
      </div>
      <div class="col-50">
        <input style="color:black" type="text" id="emailNuevo" name="emailNuevo" placeholder="Nuevo Email">
      </div>
      <div class="col-25 text-center">
        <input type="button" class="btn btn-primary" id="" name="" onclick="nuevoEmail()" style="height:50px;font-size:18px" value="Modificar">
      </div>
    </div>

    <!-- Telefono 1 -->
    <div class="rowdp">
      <div class="col-25 text-center">
        <label id="telefono1" style="font-size:20px">Telefono 1: 2215658895</label>
      </div>
      <div class="col-50">
        <input style="color:black" type="text" id="telefono1Nuevo" name="telefono1Nuevo" placeholder="Nuevo Telefono 1">
      </div>
      <div class="col-25 text-center">
        <input type="button" class="btn btn-primary" id="" name="" onclick="nuevoTelefono1()" style="height:50px;font-size:18px" value="Modificar">
      </div>
    </div>

    <!-- Telefono 2 -->
    <div class="rowdp">
      <div class="col-25 text-center">
        <label id="telefono2" style="font-size:20px">Telefono 2: 2215658895</label>
      </div>
      <div class="col-50">
        <input style="color:black" type="text" id="telefono2Nuevo" name="telefono2Nuevo" placeholder="Nuevo Telefono 2">
      </div>
      <div class="col-25 text-center">
        <input type="button" class="btn btn-primary" id="" name="" onclick="nuevoTelefono2()" style="height:50px;font-size:18px" value="Modificar">
      </div>
    </div>


    <div class="rowdp">
      <div class="col-25">
        <label for="lname">Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Country</label>
      </div>
      <div class="col-75">
        <select id="country" name="country">
          <option value="australia">Australia</option>
          <option value="canada">Canada</option>
          <option value="usa">USA</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Subject</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </div>
