

<?php require $_SESSION["raiz"] . '/modelo/clientes/tiposcliente.php'?>
<?php require $_SESSION["raiz"] . '/modelo/clientes/tipossede.php'?>
<?php require $_SESSION["raiz"] . '/modelo/clientes/razonesdecompra.php'?>
<?php require $_SESSION["raiz"] . '/modelo/clientes/condicionesiva.php'?>



<!-- One "tab" for each step in the form: -->
<div class="tabClienteNuevo">

  <h4>Datos Básicos</h4>
  <br>
  <div class="row text-center">
    <label for="nombre" style="color:black;font-size:18px">Nombre</label>
    <input name="nombre" id="nombre" style="color:black" placeholder="Nombre" type="text" oninput="this.className = ''" >
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
    <select class="form-control text-center" id="condicioniva" name="condicioniva" style="height:50px;width:100%;font-size:20px;text-align-last:center">
      <?php
      $k=0;
      while($k<count($condicionesIvaId))
          {
          ?>
          <option value="<?php echo $condicionesIvaId[$k];?>" style="color:black;font-size:20px;">
            <?php echo $condicionesIvaNombre[$k];?>
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
