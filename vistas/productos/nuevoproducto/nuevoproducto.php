



<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/productos/nuevoproducto/nuevoproducto.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/productos/nuevoproducto/nuevoproducto..js"></script>

  <?php $idcliente=1; ?>
  <input type="hidden" name="idcliente" id="idcliente" value="<?php echo $idcliente; ?>">

  <div class="contenedordp">
    <br>
    <br>
    <div class="row text-center">
      <h2>Datos Básicos</h2>
    </div>
    <br>
    <br>

    <!-- Nombre -->
    <div class="rowdp">
      <div class="col-30 text-center">
        <label id="nombre" style="font-size:20px">Nombre: Carlos</label>
      </div>
      <div class="col-40">
        <input style="color:black" type="text" id="nombreNuevo" name="nombreNuevo" placeholder="Nuevo Nombre">
      </div>
      <div class="col-30 text-center">
        <input type="button" class="btn btn-primary" id="" name="" onclick="nuevoNombre()" style="height:50px;font-size:18px" value="Modificar">
      </div>
    </div>
    <br>

    <!-- Apellido -->
    <div class="rowdp">
      <div class="col-30 text-center">
        <label id="apellido" style="font-size:20px">Apellido: Cesar</label>
      </div>
      <div class="col-40">
        <input style="color:black" type="text" id="apellidoNuevo" name="apellidoNuevo" placeholder="Nuevo Apellido">
      </div>
      <div class="col-30 text-center">
        <input type="button" class="btn btn-primary" id="" name="" onclick="nuevoApellido()" style="height:50px;font-size:18px" value="Modificar">
      </div>
    </div>
    <br>
    <!-- Email -->
    <div class="rowdp">
      <div class="col-30 text-center">
        <label id="email" style="font-size:20px">Email: auraro@gmail.com</label>
      </div>
      <div class="col-40 ">
        <input style="color:black" type="text" id="emailNuevo" name="emailNuevo" placeholder="Nuevo Email">
      </div>
      <div class="col-30 text-center">
        <input type="button" class="btn btn-primary" id="" name="" onclick="nuevoEmail()" style="height:50px;font-size:18px" value="Modificar">
      </div>
    </div>
    <br>
    <!-- Telefono 1 -->
    <div class="rowdp">
      <div class="col-30 text-center">
        <label id="telefono1" style="font-size:20px">Telefono 1: 2215658895</label>
      </div>
      <div class="col-40 ">
        <input style="color:black" type="text" id="telefono1Nuevo" name="telefono1Nuevo" placeholder="Nuevo Telefono 1">
      </div>
      <div class="col-30 text-center">
        <input type="button" class="btn btn-primary" id="" name="" onclick="nuevoTelefono1()" style="height:50px;font-size:18px" value="Modificar">
      </div>
    </div>
    <br>
    <!-- Telefono 2 -->
    <div class="rowdp">
      <div class="col-30 text-center">
        <label id="telefono2" style="font-size:20px">Telefono 2: 2215658895</label>
      </div>
      <div class="col-40 ">
        <input style="color:black" type="text" id="telefono2Nuevo" name="telefono2Nuevo" placeholder="Nuevo Telefono 2">
      </div>
      <div class="col-30 text-center">
        <input type="button" class="btn btn-primary" id="" name="" onclick="nuevoTelefono2()" style="height:50px;font-size:18px" value="Modificar">
      </div>
    </div>


    <br>
    <br>
    <br>
    <div class="row text-center">
      <h2>Condición IVA</h2>
    </div>
    <br>
    <br>

    <!-- Razon Social -->
    <div class="rowdp">
      <div class="col-30 text-center">
        <label id="razonsocial" style="font-size:20px">Razon Social: </label>
      </div>
      <div class="col-40 ">
        <input style="color:black" type="text" id="razonsocialNueva" name="razonsocialNueva" placeholder="Nueva Razon Social">
      </div>
      <div class="col-30 text-center">
        <input type="button" class="btn btn-primary" id="" name="" onclick="nuevaRazonSocial()" style="height:50px;font-size:18px" value="Modificar">
      </div>
    </div>
    <br>

    <!-- CUIT -->
    <div class="rowdp">
      <div class="col-30 text-center">
        <label id="cuit" style="font-size:20px">CUIT: </label>
      </div>
      <div class="col-40 ">
        <input style="color:black" type="text" id="cuitNuevo" name="cuitNuevo" placeholder="Nuevo CUIT">
      </div>
      <div class="col-30 text-center">
        <input type="button" class="btn btn-primary" id="" name="" onclick="nuevoCUIT()" style="height:50px;font-size:18px" value="Modificar">
      </div>
    </div>

    <br>


    <!-- Condicion -->
    <div class="rowdp">
      <div class="col-30 text-center">
        <label id="condicion" style="font-size:20px">Condicion: </label>
      </div>
      <div class="col-40 ">

        <select class="form-control text-center" id="condicionNueva" name="condicionNueva" style="height:50px;width:100%;font-size:20px;text-align-last:center">
          <?php
          $condiciones = array();
          $condiciones[0] = "Responsable Inscripto";
          $condiciones[1] = "Monotributista";
          $condiciones[2] = "Consumidor Final";
          $k=0;
          while($k<count($condiciones))
              {
              ?>
              <option value="<?php echo $condiciones[$k];?>" style="color:black;font-size:20px;">
                <?php echo $condiciones[$k];?>
              </option>
            <?php
              $k++;
              }
          ?>
        </select>

      </div>
      <div class="col-30 text-center">
        <input type="button" class="btn btn-primary" id="" name="" onclick="nuevaCondicion()" style="height:50px;font-size:18px" value="Modificar">
      </div>
    </div>




    <br>
    <br>
    <br>
    <br>

  </div>
