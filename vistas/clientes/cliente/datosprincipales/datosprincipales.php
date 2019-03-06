



<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/datosprincipales/datosprincipales.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/datosprincipales/datosprincipales.js"></script>



<?php require $_SESSION["raiz"] . '/modelo/clientes/tiposcliente.php'?>
<?php require $_SESSION["raiz"] . '/modelo/clientes/razonesdecompra.php'?>
<?php require $_SESSION["raiz"] . '/modelo/clientes/condicionesiva.php'?>

<?php require $_SESSION["raiz"] . '/modelo/clientes/cliente/datosprincipales.php'?>


<input type="hidden" name="idsede" id="idsede" value="<?php echo $idsede; ?>">

  <input type="hidden" name="idcliente" id="idcliente" value="<?php echo $idcliente; ?>">
  <br>
  <br>

  <div class="contenedordatosprincipales">
    <br>
    <br>
    <div class="row text-center">
      <h2>Datos Básicos</h2>
    </div>
    <br>
    <br>
    <br>
    <!-- Nombre -->
    <div class="row">
      <div class="col-30 text-center">
        <label id="nombre" style="font-size:20px">Nombre: <?php echo $nombre; ?></label>
      </div>
      <div class="col-40">
        <input style="color:black" type="text" id="nombreNuevo" name="nombreNuevo" placeholder="Nuevo Nombre">
      </div>
      <div class="col-30 text-center">
        <input type="button" class="botonmodificar btn btn-primary" id="" name="" onclick="nuevoNombre()" style="height:50px;font-size:18px" value="Modificar">
      </div>

    </div>
    <br>
    <div class="row alerta" id="alertaNombreNuevo"></div>
    <br>

    <!-- Email -->
    <div class="row">
      <div class="col-30 text-center">
        <label id="email" style="font-size:20px">Email: <?php echo $email; ?></label>
      </div>
      <div class="col-40 ">
        <input style="color:black" type="text" id="emailNuevo" name="emailNuevo" placeholder="Nuevo Email">
      </div>
      <div class="col-30 text-center">
        <input type="button" class="botonmodificar btn btn-primary" id="" name="" onclick="nuevoEmail()" style="height:50px;font-size:18px" value="Modificar">
      </div>

    </div>
    <br>
    <div id="alertaEmailNuevo"></div>
    <br>
    <!-- Telefono  -->
    <div class="row">
      <div class="col-30 text-center">
        <label id="telefono" style="font-size:20px">Telefono: <?php echo $telefono; ?></label>
      </div>
      <div class="col-40 ">
        <input style="color:black" type="text" id="telefonoNuevo" name="telefonoNuevo" placeholder="Nuevo Telefono">
      </div>
      <div class="col-30 text-center">
        <input type="button" class="botonmodificar btn btn-primary" id="" name="" onclick="nuevoTelefono()" style="height:50px;font-size:18px" value="Modificar">
      </div>

    </div>
    <br>
    <div id="alertaTelefonoNuevo"></div>
    <br>



    <!-- Razon Social -->
    <div class="row">
      <div class="col-30 text-center">
        <label id="razonsocial" style="font-size:20px">Razon Social: <?php echo $razonsocial; ?></label>
      </div>
      <div class="col-40 ">
        <input style="color:black" type="text" id="razonsocialNueva" name="razonsocialNueva" placeholder="Nueva Razon Social">
      </div>
      <div class="col-30 text-center">
        <input type="button" class="botonmodificar btn btn-primary" id="" name="" onclick="nuevaRazonSocial()" style="height:50px;font-size:18px" value="Modificar">
      </div>

    </div>

    <br>
    <div id="alertaRazonSocialNueva"></div>
    <br>

    <!-- CUIT -->
    <div class="row">
      <div class="col-30 text-center">
        <label id="cuit" style="font-size:20px">CUIT: <?php echo $cuit; ?></label>
      </div>
      <div class="col-40 ">
        <input style="color:black" type="text" id="cuitNuevo" name="cuitNuevo" placeholder="Nuevo CUIT">
      </div>
      <div class="col-30 text-center">
        <input type="button" class="botonmodificar btn btn-primary" id="" name="" onclick="nuevoCUIT()" style="height:50px;font-size:18px" value="Modificar">
      </div>

    </div>


    <br>
    <div id="alertaCuitNuevo">
    </div>
    <br>

    <!-- Condicion -->
    <div class="row">
      <div class="col-30 text-center">
        <label id="condicion" style="font-size:20px">Condicion Iva</label>
      </div>
      <div class="col-40 ">

        <select class="form-control text-center" id="condicionNueva" name="condicionNueva" style="height:50px;width:100%;font-size:20px;text-align-last:center">
          <?php
          $k=0;
          while($k<count($condicionesIvaId))
              {
              ?>
              <option <?php if($condicionesIvaId[$k]==$idcondicioniva) echo "selected";?> value="<?php echo $condicionesIvaId[$k];?>" style="color:black;font-size:20px;">
                <?php echo $condicionesIvaNombre[$k];?>
              </option>
            <?php
              $k++;
              }
          ?>
        </select>

      </div>
      <div class="col-30 text-center">
        <input type="button" class="botonmodificar btn btn-primary" id="" name="" onclick="nuevaCondicion()" style="height:50px;font-size:18px" value="Modificar">
      </div>

    </div>

    <br>
    <div id="alertaCondicionNueva">

    </div>
    <!-- Tipo de Cliente -->
    <div class="row">
      <div class="col-30 text-center">
        <label id="tipoCliente" style="font-size:20px">Tipo de Cliente </label>
      </div>
      <div class="col-40 ">

        <select class="form-control text-center" id="tipoClienteNuevo" name="tipoClienteNuevo" style="height:50px;width:100%;font-size:20px;text-align-last:center">
          <?php
          $k=0;
          while($k<count($tiposClienteId))
              {
              ?>
              <option <?php if($tiposClienteId[$k]==$idtipocliente) echo "selected";?> value="<?php echo $tiposClienteId[$k];?>" style="color:black;font-size:20px;">
                <?php echo $tiposClienteNombre[$k];?>
              </option>
            <?php
              $k++;
              }
          ?>
        </select>

      </div>
      <div class="col-30 text-center">
        <input type="button" class="botonmodificar btn btn-primary" id="" name="" onclick="tipoClienteNuevo()" style="height:50px;font-size:18px" value="Modificar">
      </div>

    </div>

    <br>
    <div id="alertaTipoClienteNuevo">

    </div>
    <br>

    <!-- Razón de Compra -->
    <div class="row">
      <div class="col-30 text-center">
        <label id="razonDeCompra" style="font-size:20px">Razón de Compra </label>
      </div>
      <div class="col-40 ">

        <select class="form-control text-center" id="razonDeCompraNueva" name="razonDeCompraNueva" style="height:50px;width:100%;font-size:20px;text-align-last:center">
          <?php
          $k=0;
          while($k<count($razonesDeCompraId))
              {
              ?>
              <option <?php if($razonesDeCompraId[$k]==$idrazondecompra) echo "selected";?> value="<?php echo $razonesDeCompraId[$k];?>" style="color:black;font-size:20px;">
                <?php echo $razonesDeCompraNombre[$k];?>
              </option>
            <?php
              $k++;
              }
          ?>
        </select>

      </div>
      <div class="col-30 text-center">
        <input type="button" class="botonmodificar btn btn-primary" id="" name="" onclick="razonDeCompraNueva()" style="height:50px;font-size:18px" value="Modificar">
      </div>
    </div>
    <br>
    <div id="alertaRazonDeCompraNueva">

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>

  </div>
