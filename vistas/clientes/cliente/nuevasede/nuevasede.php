

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/nuevasede/nuevasede.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/nuevasede/nuevasede.js"></script>

<div class="contenedornuevasede">



  <form class="formularioSedeNueva" id="formularioSedeNueva" action="../../../controladores/clientes/sedeNueva.php">
    <h1>Nueva Sede</h1>
    <br>


    <input type="hidden" name="sedeNueva" id="sedeNueva" value="">



    <?php require('sede/sede.php'); ?>
    <?php require('asignacion/asignacion.php'); ?>
    <?php require('recorrido/recorrido.php'); ?>


    <div style="overflow:auto;">
      <div style="float:right;">
        <button type="button" id="prevBtnSedeNueva" onclick="nextPrevSedeNueva(-1)">Anterior</button>
        <button type="button" id="nextBtnSedeNueva" onclick="nextPrevSedeNueva(1)">Siguiente</button>
      </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
      <span class="stepSedeNueva"></span>
      <span class="stepSedeNueva"></span>
      <span class="stepSedeNueva"></span>
      <span class="stepSedeNueva"></span>

    </div>

  </form>




  <script>
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTabSedeNueva(currentTab); // Display the crurrent tab
  </script>

</div>
