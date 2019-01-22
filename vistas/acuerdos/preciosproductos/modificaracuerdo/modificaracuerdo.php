


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/preciosproductos/modificaracuerdo/modificaracuerdo.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/preciosproductos/modificaracuerdo/modificaracuerdo.js"></script>

  <?php



    $productosId = array();
    $productosId[0] = 1;
    $productosId[1] = 5;
    $productosId[2] = 3;


    $productosNombre = array();
    $productosNombre[0] = "Bidon 10L";
    $productosNombre[1] = "Bidon 8L";
    $productosNombre[2] = "Bidon 5L";

    $numeroProductos = 3;



  ?>

  <input type="hidden" name="idAcuerdoPreciosProductos" id="idAcuerdoPreciosProductos" value="">

  <div class="contenedormodificaracuerdo">
    <br>
    <br>
    <div class="row text-center">
      <h2>Datos Del Acuerdo</h2>
    </div>
    <br>
    <br>


        <div class="row text-center">
          <label id="nombreAcuerdoPreciosProductos" style="font-size:20px">Nombre: </label>
          <br>
          <input style="color:black;width:60%" type="text" id="nombreNuevoAcuerdoPreciosProductos" name="nombreNuevoAcuerdoPreciosProductos" placeholder="Nuevo Nombre">
          <br>
          <br>
          <button class="boton btn btn-primary" id="" name="" onclick="nombreNuevoAcuerdoPreciosProductos()" style="height:50px;font-size:18px;width:60%">Modificar</button>
        </div>
        <br>
        <br>
        <div class="row text-center">
          <h2>Precios Productos</h2>
        </div>
        <br>
        <br>
        <style media="screen">
          .etiquetaBlanca{font-size:20px;color:white;}
        </style>
        <div class="row" id="divProductosAcuerdoPreciosProductos">

        </div>




        <br>
        <br>

  </div>
