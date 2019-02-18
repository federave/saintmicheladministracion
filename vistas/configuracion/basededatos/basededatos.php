

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/configuracion/basededatos/basededatos.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/configuracion/basededatos/basededatos.js"></script>


<div class="contenedorver contenedorbasededatos">
  <br>
  <br>
  <div class="row text-center">
    <h1 class="colorFuente">Menú Base De Datos</h1>
  </div>
  <br>
  <br>

  <div class="contenedormenu">


    <button type="button" class="botonmenu " onclick="crearBaseDeDatos()">Crear Base De Datos</button>
    <br>
    <br>
    <div class="alerta" id="alertaCrearBaseDeDatos">

    </div>
    <br>
    <button type="button" class="botonmenu " onclick="mostrarBackup()">Backup</button>

  </div>


</div>
