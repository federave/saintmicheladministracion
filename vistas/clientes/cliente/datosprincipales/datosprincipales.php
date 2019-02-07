



<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/datosprincipales/datosprincipales.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/datosprincipales/datosprincipales.js"></script>

  <?php
  $idcliente=1;


  $condicionesIVAId = array();
  $condicionesIVAId[0] = 1;
  $condicionesIVAId[1] = 2;
  $condicionesIVAId[2] = 3;

  $condicionesIVANombre = array();
  $condicionesIVANombre[0] = "Responsable Inscripto";
  $condicionesIVANombre[1] = "Monotributista";
  $condicionesIVANombre[2] = "Consumidor Final";


  $tiposClienteId = array();
  $tiposClienteId[0] = 1;
  $tiposClienteId[1] = 2;
  $tiposClienteId[2] = 3;
  $tiposClienteId[3] = 4;
  $tiposClienteId[4] = 5;
  $tiposClienteId[5] = 6;

  $tiposClienteNombre = array();
  $tiposClienteNombre[0] = "Domicilio";
  $tiposClienteNombre[1] = "Supermercado";
  $tiposClienteNombre[2] = "Supermercado Chino";
  $tiposClienteNombre[3] = "Autoservicio";
  $tiposClienteNombre[4] = "Almacen";
  $tiposClienteNombre[5] = "Verduleria";


  $razonesDeCompraId = array();
  $razonesDeCompraId[0] = 1;
  $razonesDeCompraId[1] = 2;
  $razonesDeCompraId[2] = 3;
  $razonesDeCompraId[3] = 4;
  $razonesDeCompraId[4] = 5;
  $razonesDeCompraId[5] = 6;

  $razonesDeCompraNombre = array();
  $razonesDeCompraNombre[0] = "Pagina Web";
  $razonesDeCompraNombre[1] = "Facebook";
  $razonesDeCompraNombre[2] = "Instagram";
  $razonesDeCompraNombre[3] = "Por Recomendacion";
  $razonesDeCompraNombre[4] = "Por Ver Los Camiones,Camionetas";
  $razonesDeCompraNombre[5] = "Ninguno";


  ?>



  <input type="hidden" name="idcliente" id="idcliente" value="<?php echo $idcliente; ?>">

  <div class="contenedordatosprincipales">
    <br>
    <br>
    <div class="row text-center">
      <h2>Datos Básicos</h2>
    </div>
    <br>
    <br>

    <!-- Nombre -->
    <div class="row">
      <div class="col-30 text-center">
        <label id="nombre" style="font-size:20px">Nombre: Carlos</label>
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
        <label id="email" style="font-size:20px">Email: auraro@gmail.com</label>
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
        <label id="telefono" style="font-size:20px">Telefono: 2215658895</label>
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
        <label id="razonsocial" style="font-size:20px">Razon Social: </label>
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
        <label id="cuit" style="font-size:20px">CUIT: </label>
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
        <label id="condicion" style="font-size:20px">Condicion Iva: </label>
      </div>
      <div class="col-40 ">

        <select class="form-control text-center" id="condicionNueva" name="condicionNueva" style="height:50px;width:100%;font-size:20px;text-align-last:center">
          <?php
          $k=0;
          while($k<count($condicionesIVAId))
              {
              ?>
              <option value="<?php echo $condicionesIVAId[$k];?>" style="color:black;font-size:20px;">
                <?php echo $condicionesIVANombre[$k];?>
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
        <label id="tipoCliente" style="font-size:20px">Tipo de Cliente: </label>
      </div>
      <div class="col-40 ">

        <select class="form-control text-center" id="tipoClienteNuevo" name="tipoClienteNuevo" style="height:50px;width:100%;font-size:20px;text-align-last:center">
          <?php
          $k=0;
          while($k<count($tiposClienteId))
              {
              ?>
              <option value="<?php echo $tiposClienteId[$k];?>" style="color:black;font-size:20px;">
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
        <label id="razonDeCompra" style="font-size:20px">Razón de Compra: </label>
      </div>
      <div class="col-40 ">

        <select class="form-control text-center" id="razonDeCompraNueva" name="razonDeCompraNueva" style="height:50px;width:100%;font-size:20px;text-align-last:center">
          <?php
          $k=0;
          while($k<count($razonesDeCompraId))
              {
              ?>
              <option value="<?php echo $razonesDeCompraId[$k];?>" style="color:black;font-size:20px;">
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

  </div>
