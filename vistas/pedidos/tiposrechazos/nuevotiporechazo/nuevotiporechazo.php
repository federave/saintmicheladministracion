

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/formulario.css">
<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/radiobutton.css">
<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/pedidos/tiposrechazos/nuevotiporechazo/nuevotiporechazo.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/pedidos/tiposrechazos/nuevotiporechazo/nuevotiporechazo.js"></script>



<div class="contenedornuevotiporechazo">
  <br>
  <br>
  <div class="row text-center">
    <h1 style="color:white">Nuevo Tipo Rechazo</h1>
  </div>
  <br>
  <br>

  <form id="formularioTipoRechazoNuevo" class="formulario"  action="../../../controladores/pedidos/tiposrechazos/tiporechazonuevo.php">


    <div class="tabFormulario" name="tabTipoRechazoNuevo">

      <div class="text-center">
        <h1 class="hFormulario">Datos Del Tipo Rechazo</h1>
      </div>

      <br>
      <br>
      <div class="row text-center" style="width:90%;margin:auto">
        <label class="labelFormulario" for="nombre">Ingresar Nombre</label>
        <input name="nombre" id="nombre" type="text" placeholder="Nombre" oninput="this.className = ''">
      </div>



    </div>


      <br>
      <br>






    <div style="overflow:auto;">
      <div style="float:right;">
        <button type="button" class="previousbutton" id="prevBtnTipoRechazoNuevo" onclick="nextTabTipoRechazoNuevo(-1)">Anterior</button>
        <button type="button" id="nextBtnTipoRechazoNuevo" onclick="nextTabTipoRechazoNuevo(1)">Siguiente</button>
      </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
      <span class="step" name="stepTipoRechazoNuevo"></span>
    </div>

  </form>

  <script>
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTabTipoRechazoNuevo(currentTab); // Display the crurrent tab
  </script>

</div>
