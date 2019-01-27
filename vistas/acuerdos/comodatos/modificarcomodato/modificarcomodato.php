


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/comodatos/modificarcomodato/modificarcomodato.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/comodatos/modificarcomodato/modificarcomodato.js"></script>


  <?php

  ?>

  <input type="hidden" name="idComodato" id="idComodato" value="">

  <div class="contenedormodificarcomodato">
        <br>
        <br>
        <div class="row text-center">
          <h2>Datos Del Comodato</h2>
        </div>
        <br>
        <br>


        <!-- Nombre -->
        <div class="row">
          <div class="col-30 text-center">
            <label id="nombreComodato" style="font-size:20px">Nombre: </label>
          </div>
          <div class="col-40">
            <input style="color:black" type="text" id="nombreNuevoComodato" name="nombreNuevoComodato" placeholder="Nuevo Nombre">
          </div>
          <div class="col-30 text-center">
            <input type="button" class="btn btn-primary botonmodificar" id="" name="" onclick="nombreNuevoComodato()" value="Modificar">
          </div>
        </div>
        <br>
        <div class="row" id="alertaNombreNuevoComodato">

        </div>

        <br>
        <br>

    

  </div>
