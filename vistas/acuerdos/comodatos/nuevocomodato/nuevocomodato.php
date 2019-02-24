


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/radiobutton.css">
<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/formulario.css">
<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/comodatos/nuevocomodato/nuevocomodato.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/comodatos/nuevocomodato/nuevocomodato.js"></script>
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/javascript/formulario.js"></script>

<?php require $_SESSION["raiz"] . '/modelo/acuerdos/comodatos/condiciones.php'?>
<?php require $_SESSION["raiz"] . '/modelo/maquinas/maquinas.php'?>



<div class="contenedorcomodatonuevo">
  <br>
  <br>
  <div class="row text-center">
    <h1 style="color:white">Nuevo Comodato</h1>
  </div>
  <br>
  <br>





    <form id="formularioComodatoNuevo" class="formulario"  action="../../../controladores/acuerdos/comodatos/comodatonuevo.php">

      <input type="hidden" name="numeroCondiciones" id="numeroCondiciones" value=<?php echo $numeroCondiciones; ?>>
      <input type="hidden" name="numeroMaquinas" id="numeroMaquinas" value=<?php echo $numeroMaquinas; ?>>
      <input type="hidden" name="comodatoNuevo" id="comodatoNuevo" value="">

      <div class="tabFormulario" name="tabComodatoNuevo" >

        <div class="text-center">
          <h1 style="color:black">Datos Del Comodato</h1>
        </div>

        <br>
        <br>
        <br>

        <div class="row text-center">
          <label for="nombreComodatoNuevo" style="color:black;font-size:18px">Ingresar Nombre</label>
          <input style="color:black" placeholder="Nombre" type="text" oninput="this.className = ''" name="nombreComodatoNuevo" id="nombreComodatoNuevo">
        </div>
        <br>




        <br>
        <br>
        <br>

        <div class="text-center">
          <h1>Condiciones</h1>
        </div>

        <div style="height:500px; overflow-y: scroll;">
          <div class="funkyradio">
            <?php
            $k=0;
            while($k<count($condicionesId))
                {
                ?>
               <div class="funkyradio-info text-center">
                 <input type="checkbox" name="condicionesComodatoNuevo" id="condicion<?php echo $k; ?>ComodatoNuevo" value="<?php echo $condicionesId[$k]; ?>"/>
                 <label for="condicion<?php echo $k; ?>ComodatoNuevo" style="color:black;font-size:18px"><?php echo $condicionesNombre[$k]; ?></label>
               </div>
               <br>
             <?php
               $k++;
               }
             ?>
        </div>
      </div>


        <br>
        <br>


        <div class="text-center">
          <h1>Maquinas</h1>
        </div>

        <div style="height:500px; overflow-y: scroll;">

          <script type="text/javascript">
            function mostrarInputCantidadMaquinas(n)
            {
            if(document.getElementById("maquina"+n+"ComodatoNuevo").checked)
              document.getElementById("divCantidadMaquina"+n+"ComodatoNuevo").style.display="block";
            else
              document.getElementById("divCantidadMaquina"+n+"ComodatoNuevo").style.display="none";
            }
          </script>


        <div class="funkyradio">

          <?php
          $k=0;
          while($k<count($maquinasId))
              {
              ?>
             <div class="funkyradio-info text-center">
                 <input onchange="mostrarInputCantidadMaquinas(<?php echo $k;?>)" type="checkbox" name="maquinasComodatoNuevo" id="maquina<?php echo $k; ?>ComodatoNuevo" value="<?php echo $maquinasId[$k]; ?>"/>
                 <label for="maquina<?php echo $k; ?>ComodatoNuevo" style="color:black;font-size:18px"><?php echo $maquinasNombre[$k]; ?></label>
             </div>
             <br>
             <div class="text-center "style="display:none" id="divCantidadMaquina<?php echo $k;?>ComodatoNuevo">
               <p class="etiqueta ">Ingrese Cantidad</p>
               <input name="cantidadMaquina<?php echo $k;?>ComodatoNuevo" id="cantidadMaquina<?php echo $k; ?>ComodatoNuevo" class="text-center" style="color:black" type="number" min="1" value="" step="1" placeholder="Cantidad" oninput="this.className = ''" >
               <br>
               <br>
             </div>
           <?php
             $k++;
             }
           ?>
        </div>
        </div>


      <div style="overflow:auto;">
        <div style="float:right;">
          <button type="button" class="previousbutton" id="prevBtnComodatoNuevo" onclick="nextTabComodatoNuevo(-1)">Siguiente</button>
          <button type="button" id="nextBtnComodatoNuevo" onclick="nextTabComodatoNuevo(1)">Anterior</button>
        </div>
      </div>
      <!-- Circles which indicates the steps of the form: -->
      <div style="text-align:center;margin-top:40px;">
        <span class="step" name="stepComodatoNuevo" ></span>
      </div>
    </form>



  <script>
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab,"ComodatoNuevo"); // Display the crurrent tab
  </script>



</div>
</div>
