


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/radiobutton.css">

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/maquinas/nuevamaquina/nuevamaquina.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/maquinas/nuevamaquina/nuevamaquina.js"></script>

<?php require $_SESSION["raiz"] . '/modelo/maquinas/tiposmaquina.php'?>

<?php
$errornuevamaquina="";
if(isset($_SESSION["errornuevamaquina"]))
  $errornuevamaquina=$_SESSION["errornuevamaquina"];
 ?>

  <div class="contenedor">
    <br>
    <br>
    <div class="row text-center">
      <h2>Nueva Maquina</h2>
    </div>
    <br>
    <br>

    <input type="hidden" name="numeroTiposMaquina" id="numeroTiposMaquina" value=<?php echo $numeroTiposMaquina;?>>

    <div id="alertaerrornuevamaquina">
      <?php if($errornuevamaquina!="") echo "<script>insertarAlerta('alertaerrornuevamaquina','$errornuevamaquina','danger');</script>"; ?>
    </div>


    <div class="row" style="width:100%">

      <form class="formularioMaquina" id="formularioMaquina" action="../../controladores/maquinas/maquinanueva.php">

        <input type="hidden" name="maquinaNueva" id="maquinaNueva" value="">


        <div class="tabMaquina">

          <div class="text-center">
            <h1 style="color:black">Datos De la Maquina</h1>
          </div>

          <br>
          <br>

          <div class="row text-center">
            <label for="nombre" style="color:black;font-size:18px">Ingresar Nombre</label>
            <input style="color:black" placeholder="Nombre" type="text" oninput="this.className = ''" name="nombre" id="nombre">
          </div>
          <br>
          <br>

          <div class="row text-center">
            <label for="marca" style="color:black;font-size:18px">Ingresar Marca</label>
            <input style="color:black" placeholder="Marca" type="text" oninput="this.className = ''" name="marca" id="marca">
          </div>
          <br>
          <br>

          <div class="row text-center">
            <label for="capacidad" style="color:black;font-size:18px">Ingresar Marca</label>
            <input name="capacidad" id="capacidad" class="text-center" style="color:black;" type="number" min="0" value="" step="0.1" placeholder="Capacidad" oninput="this.className = ''" >
          </div>
          <br>
          <br>


          <div class="text-center">
            <h3 style="color:black">Tipo de Maquina</h3>
          </div>


            <div class="funkyradio">

              <?php
              $k=0;
              while($k<count($tiposMaquinaId))
                  {
                  ?>

                 <div class="funkyradio-info text-center">
                     <input <?php if($k==0) echo "checked"; ?> type="radio" name="tipomaquina" id="tipomaquina<?php echo $k; ?>" value="<?php echo $tiposMaquinaId[$k]; ?>"/>
                     <label for="tipomaquina<?php echo $k; ?>" style="color:black;font-size:18px"><?php echo $tiposMaquinaNombre[$k]; ?></label>
                 </div>


               <?php
                 $k++;
                 }
             ?>
           </div>

         <br>


        </div>








        <div style="overflow:auto;">
          <div style="float:right;">
            <button type="button" id="prevBtnMaquina" onclick="nextPrevMaquina(-1)">Anterior</button>
            <button type="button" id="nextBtnMaquina" onclick="nextPrevMaquina(1)">Siguiente</button>
          </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <span class="stepMaquina"></span>
        </div>
      </form>
    </div>



    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTabMaquina(currentTab); // Display the crurrent tab
    </script>



  </div>
