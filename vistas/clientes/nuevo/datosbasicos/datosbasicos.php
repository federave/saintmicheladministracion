



<?php


$condiciones = array();
$condiciones[0] = "Responsable Inscripto";
$condiciones[1] = "Monotributista";
$condiciones[2] = "Consumidor Final";

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


<!-- One "tab" for each step in the form: -->
<div class="tabClienteNuevo">

  <h4>Datos Básicos</h4>
  <br>
  <div class="row text-center">
    <label for="nombre" style="color:black;font-size:18px">Nombre</label>
    <input name="nombre" id="nombre" style="color:black" placeholder="Telefono" type="text" oninput="this.className = ''" >
  </div>
  <br>

  <div class="row text-center">
    <label for="telefono" style="color:black;font-size:18px">Telefono</label>
    <input name="telefono" id="telefono" style="color:black" placeholder="Telefono" type="text" oninput="this.className = ''" >
  </div>
  <br>

  <div class="row text-center">
    <label for="email" style="color:black;font-size:18px">Email</label>
    <input name="email" id="email" style="color:black" placeholder="Email" type="text" oninput="this.className = ''" >
  </div>
  <br>

  <div class="row text-center">
    <label for="razonsocial" style="color:black;font-size:18px">Razon Social</label>
    <input name="razonsocial" id="razonsocial" style="color:black" placeholder="Razon Social" type="text" oninput="this.className = ''" >
  </div>
  <br>
  <div class="row text-center">
    <label for="cuit" style="color:black;font-size:18px">Cuit</label>
    <input name="cuit" id="cuit" style="color:black" placeholder="Cuit" type="text" oninput="this.className = ''" >
  </div>
  <br>
  <div class="row text-center">
    <label for="condicion" style="color:black;font-size:18px">Condición</label>
    <select class="form-control text-center" id="condicion" name="condicion" style="height:50px;width:100%;font-size:20px;text-align-last:center">
      <?php
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
  <br>
  <div class="row text-center">
    <label for="tipoCliente" style="color:black;font-size:18px">Tipo Cliente</label>
    <select class="form-control text-center" id="tipoCliente" name="tipoCliente" style="height:50px;width:100%;font-size:20px;text-align-last:center">
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
  <br>
  <div class="row text-center">
    <label for="razonDeCompra" style="color:black;font-size:18px">Razón de Compra</label>
    <select class="form-control text-center" id="razonDeCompra" name="razonDeCompra" style="height:50px;width:100%;font-size:20px;text-align-last:center">
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
  <br>
  <br>

</div>
