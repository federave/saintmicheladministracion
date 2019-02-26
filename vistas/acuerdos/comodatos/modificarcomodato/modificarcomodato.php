


<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/comodatos/modificarcomodato/modificarcomodato.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/comodatos/modificarcomodato/modificarcomodato.js"></script>


<?php require $_SESSION["raiz"] . '/modelo/acuerdos/comodatos/condiciones.php'?>
<?php require $_SESSION["raiz"] . '/modelo/maquinas/maquinas.php'?>


  <input type="hidden" name="idComodato" id="idComodato" value="">

  <div class="contenedormodificarcomodato">
        <div class="row text-center">
          <h1 style="color:white">Datos Del Comodato</h1>
        </div>
        <br>
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
        <br>
        <br>

        <div class="text-center">
          <h1 style="color:white">Condiciones Actuales</h1>
        </div>
        <br>
        <br>
        <div class="contenedoritems actuales">
          <script type="text/javascript">
            function mostrarInputQuitarCondicion(n)
            {
            if(document.getElementById("condicion"+n+"ComodatoQuitar").checked)
              document.getElementById("divCondicion"+n+"ComodatoQuitar").style.display="block";
            else
              document.getElementById("divCondicion"+n+"ComodatoQuitar").style.display="none";
            }
          </script>
          <div class="funkyradio">
            <?php
            $k=0;
            while($k<count($condicionesId))
                {
                ?>
               <div id="divCondicion<?php echo $k; ?>Quitar">
                 <input type="hidden" id="numeroCondicion<?php echo $condicionesId[$k]; ?>Quitar" value="<?php echo $k; ?>">
                 <div  class="funkyradio-info text-center">
                   <input onchange="mostrarInputQuitarCondicion(<?php echo $condicionesId[$k];?>)" type="checkbox" name="condicionesComodatoQuitar" id="condicion<?php echo $condicionesId[$k]; ?>ComodatoQuitar" value="<?php echo $condicionesId[$k]; ?>"/>
                   <label style="background-color:white;color:black"  for="condicion<?php echo $condicionesId[$k]; ?>ComodatoQuitar" style="color:black;font-size:18px"><?php echo $condicionesNombre[$k]; ?></label>
                 </div>
                 <br>
                 <div class="text-center"style="display:none" id="divCondicion<?php echo $condicionesId[$k];?>ComodatoQuitar" >
                   <button class="btn btn-primary" onclick="quitarCondicion(<?php echo $condicionesId[$k]; ?>)" style="height:50px;font-size:18px;width:60%;">Quitar</button>;
                 </div>
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


        <br>
        <br>
        <br>
        <br>

        <div class="text-center">
          <h1 style="color:white">Maquinas Actuales</h1>
        </div>
        <br>
        <br>
        <div class="contenedoritems actuales">

          <script type="text/javascript">
            function mostrarInputModificarMaquina(n)
            {
            if(document.getElementById("maquina"+n+"ComodatoModificar").checked)
              document.getElementById("divMaquina"+n+"ComodatoModificar").style.display="block";
            else
              document.getElementById("divMaquina"+n+"ComodatoModificar").style.display="none";
            }
          </script>


          <div class="funkyradio">

            <?php
            $k=0;
            while($k<count($maquinasId))
                {
                ?>
               <div id="divMaquina<?php echo $k; ?>Modificar">
                 <input type="hidden" id="numeroMaquina<?php echo $maquinasId[$k]; ?>Quitar" value="<?php echo $k; ?>">
                 <div class="funkyradio-info text-center">
                     <input onchange="mostrarInputModificarMaquina(<?php echo $maquinasId[$k];?>)" type="checkbox" name="maquinasComodatoModificar" id="maquina<?php echo $maquinasId[$k]; ?>ComodatoModificar" value="<?php echo $maquinasId[$k]; ?>"/>
                     <label style="background-color:white;color:black" for="maquina<?php echo $maquinasId[$k]; ?>ComodatoModificar" style="color:black;font-size:18px"><?php echo $maquinasNombre[$k]; ?></label>
                 </div>
                 <br>
                 <div class="text-center "style="display:none" id="divMaquina<?php echo $maquinasId[$k];?>ComodatoModificar">
                   <p id="labelCantidadMaquina<?php echo $maquinasId[$k];;?>ComodatoModificar" class="etiqueta ">Cantidad Actual: </p>
                   <input name="cantidadMaquina<?php echo $maquinasId[$k];;?>ComodatoModificar" id="cantidadMaquina<?php echo $maquinasId[$k]; ?>ComodatoModificar" class="text-center" style="color:black" type="number" min="1" value="" step="1" placeholder="Nueva Cantidad" oninput="this.className = ''" >
                   <br>
                   <br>
                   <button class="btn btn-primary" onclick="modificarCantidadMaquina(<?php echo $maquinasId[$k]; ?>)" style="height:50px;font-size:18px;width:60%;">Modificar</button>;
                   <br>
                   <br>
                   <button class="btn btn-primary" onclick="quitarMaquina(<?php echo $maquinasId[$k]; ?>)" style="height:50px;font-size:18px;width:60%;">Quitar</button>;
                 </div>
               </div>

             <?php
               $k++;
               }
             ?>
          </div>
        </div>



        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="borde" style="width:100%"></div>
        <br>
        <br>
        <br>



        <div class="text-center">
          <h1 style="color:white">Agregar Condiciones</h1>
        </div>
        <br>
        <br>
        <div class="contenedoritems">
          <script type="text/javascript">
            function mostrarInputAgregarCondicion(n)
            {
            if(document.getElementById("condicion"+n+"ComodatoAgregar").checked)
              document.getElementById("divCondicion"+n+"ComodatoAgregar").style.display="block";
            else
              document.getElementById("divCondicion"+n+"ComodatoAgregar").style.display="none";
            }
          </script>
          <div class="funkyradio">
            <?php
            $k=0;
            while($k<count($condicionesId))
                {
                ?>
               <div id="divCondicion<?php echo $k; ?>Agregar">
                 <input type="hidden" id="numeroCondicion<?php echo $condicionesId[$k]; ?>Agregar" value="<?php echo $k; ?>">
                 <div class="funkyradio-info text-center">
                   <input onchange="mostrarInputAgregarCondicion(<?php echo $condicionesId[$k];?>)" type="checkbox" name="condicionesComodatoAgregar" id="condicion<?php echo $condicionesId[$k]; ?>ComodatoAgregar" value="<?php echo $condicionesId[$k]; ?>"/>
                   <label for="condicion<?php echo $condicionesId[$k]; ?>ComodatoAgregar" style="color:black;font-size:18px"><?php echo $condicionesNombre[$k]; ?></label>
                 </div>
                 <br>
                 <div class="text-center"style="display:none" id="divCondicion<?php echo $condicionesId[$k];?>ComodatoAgregar" >
                   <button class="btn btn-primary" onclick="agregarCondicion(<?php echo $condicionesId[$k]; ?>)" style="height:50px;font-size:18px;width:60%;">Agregar</button>;
                 </div>
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
        <br>
        <br>

        <div class="text-center">
          <h1 style="color:white">Maquinas</h1>
        </div>
        <br>
        <br>
        <div class="contenedoritems">

          <script type="text/javascript">
            function mostrarInputCantidadMaquinasAgregar(n)
            {
            if(document.getElementById("maquina"+n+"ComodatoAgregar").checked)
              document.getElementById("divCantidadMaquina"+n+"ComodatoAgregar").style.display="block";
            else
              document.getElementById("divCantidadMaquina"+n+"ComodatoAgregar").style.display="none";
            }
          </script>


          <div class="funkyradio">

            <?php
            $k=0;
            while($k<count($maquinasId))
                {
                ?>
               <div id="divMaquina<?php echo $k; ?>Agregar">
                 <input type="hidden" id="numeroMaquina<?php echo $maquinasId[$k]; ?>Agregar" value="<?php echo $k; ?>">
                 <div class="funkyradio-info text-center">
                     <input onchange="mostrarInputCantidadMaquinasAgregar(<?php echo $maquinasId[$k];?>)" type="checkbox" name="maquinasComodatoAgregar" id="maquina<?php echo $maquinasId[$k]; ?>ComodatoAgregar" value="<?php echo $maquinasId[$k]; ?>"/>
                     <label for="maquina<?php echo $maquinasId[$k]; ?>ComodatoAgregar" style="color:black;font-size:18px"><?php echo $maquinasNombre[$k]; ?></label>
                 </div>
                 <br>
                 <div class="text-center "style="display:none" id="divCantidadMaquina<?php echo $maquinasId[$k];?>ComodatoAgregar">
                   <p class="etiqueta ">Ingrese Cantidad</p>
                   <input name="cantidadMaquina<?php echo $maquinasId[$k];;?>ComodatoAgregar" id="cantidadMaquina<?php echo $maquinasId[$k]; ?>ComodatoAgregar" class="text-center" style="color:black" type="number" min="1" value="" step="1" placeholder="Cantidad" oninput="this.className = ''" >
                   <br>
                   <br>
                   <button class="btn btn-primary" onclick="agregarMaquina(<?php echo $maquinasId[$k]; ?>)" style="height:50px;font-size:18px;width:60%;">Agregar</button>;
                   <br>
                 </div>
               </div>

             <?php
               $k++;
               }
             ?>
          </div>
        </div>






  </div>
