

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/asignacion/asignacion.css">
<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/radiobutton.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/asignacion/asignacion.js"></script>

<?php require $_SESSION["raiz"] . '/modelo/trabajadores/vendedores.php'?>
<?php require $_SESSION["raiz"] . '/modelo/trabajadores/repartidoresvendedores.php'?>
<?php require $_SESSION["raiz"] . '/modelo/trabajadores/repartidores.php'?>
<?php require $_SESSION["raiz"] . '/modelo/clientes/sedes/dias.php'?>



  <input type="hidden" name="idAsignacion" id="idAsignacion" value="<?php echo $idAsignacion; ?>">

  <div class="contenedorasignacion">
    <br>
    <br>

    <br>
    <br>

    <!--  -->

    <div class="rowasignacion">

        <div class="row text-center">
          <h2 style="color:white">Asignacion</h2>
        </div>
        <div class="funkyradio">
           <div class="funkyradio-info">
               <input type="radio" name="asignacion" id="empresa" value="1" onclick="mostrarDiv(empresa.value)"/>
               <label for="empresa" style="color:white">Empresa</label>
           </div>
         <div class="funkyradio-info">
             <input  type="radio" name="asignacion" id="repartidor" value="2" onclick="mostrarDiv(repartidor.value)"/>
             <label for="repartidor" style="color:white">Repartidor</label>
             <div class="form-group" id="divRepartidores" style="margin-top:10px;display:none">
               <label style="text-align:center;font-size:20px;color:white">Seleccionar Repartidor</label>
               <select placeholder="" class="form-control" id="repartidorSeleccionado" style="height:50px;width:100%;font-size:20px;text-align-last:center">
                 <?php
                 $k=0;
                 while($k<count($repartidoresVendedoresId))
                     {
                     ?>
                     <option value="<?php echo $repartidoresVendedoresId[$k];?>" id="repartidorAsignadoId<?php echo $repartidoresVendedoresId[$k];?>" style="color:black;font-size:20px;text-align-last:center">
                       <?php echo $repartidoresVendedoresNombre[$k];?>
                     </option>
                   <?php
                     $k++;
                     }
                 ?>
               </select>
             </div>
         </div>
         <div class="funkyradio-info" >
             <input type="radio" name="asignacion" id="vendedor" value="3" onclick="mostrarDiv(vendedor.value)"/>
             <label for="vendedor" style="color:white">Vendedor</label>
             <div class="form-group" id="divVendedores" style="margin-top:10px;display:none">
               <label style="text-align:center;font-size:20px;color:white">Seleccionar Vendedor</label>
               <select placeholder="" class="form-control" id="vendedorSeleccionado" style="height:50px;width:100%;font-size:20px;text-align-last:center">
                 <?php
                 $k=0;
                 while($k<count($vendedoresId))
                     {
                     ?>
                     <option value="<?php echo $vendedoresId[$k];?>" id="vendedorAsignadoId<?php echo $vendedoresId[$k];?>" style="color:black;font-size:20px;text-align-last:center">
                       <?php echo $vendedoresNombre[$k];?>
                     </option>
                   <?php
                     $k++;
                     }
                 ?>
               </select>
             </div>
         </div>

        </div>
      <br>
      <br>
        <script type="text/javascript">
        function mostrarDiv(valor)
        {
        if(valor == 1)
         {
         document.getElementById("divRepartidores").style.display = "none";
         document.getElementById("divVendedores").style.display = "none";
         document.getElementById("estadoDivRepartidoresDia").value = "1";
         for(i=1;i<7;i++)
           {
           if(document.getElementById("dia"+i).checked)
            document.getElementById("divRepartidoresDia"+i).style.display="block";
           }
         }
       else if(valor == 2)
         {
         document.getElementById("divRepartidores").style.display = "block";
         document.getElementById("divVendedores").style.display = "none";
         document.getElementById("estadoDivRepartidoresDia").value = "0";
         for(i=1;i<7;i++){document.getElementById("divRepartidoresDia"+i).style.display="none";}
         }
        else if(valor == 3)
         {
         document.getElementById("divRepartidores").style.display = "none";
         document.getElementById("divVendedores").style.display = "block";
         document.getElementById("estadoDivRepartidoresDia").value = "0";
         for(i=1;i<7;i++){document.getElementById("divRepartidoresDia"+i).style.display="none";}
         }
        else{}
        }
        </script>

    <div class="row text-center">
      <h2 style="color:white">Recorrido</h2>
    </div>
    <br>

    <div class="funkyradio">


      <script type="text/javascript">
      function mostrarDivRepartidoresDia(n)
      {
      if(document.getElementById("estadoDivRepartidoresDia").value == "1")
        {
        if(document.getElementById("divRepartidoresDia"+n).style.display == "none")
          document.getElementById("divRepartidoresDia"+n).style.display = "block";
        else
          document.getElementById("divRepartidoresDia"+n).style.display = "none";
        }
      }
      </script>

      <?php
      $k=0;
      while($k<count($diasId))
          {
          ?>
          <div class="funkyradio-info">

              <input type="hidden" name="estadoDivRepartidoresDia" id="estadoDivRepartidoresDia" value="">

              <input onchange="mostrarDivRepartidoresDia(<?php echo $diasId[$k];?>)" type="checkbox" name="dias" id="dia<?php echo $diasId[$k];?>"/>
              <label for="dia<?php echo $diasId[$k];?>" style="color:white"><?php echo $diasNombre[$k];?></label>
              <div class="form-group" id="divRepartidoresDia<?php echo $diasId[$k];?>" style="margin-top:10px;display:none">
              <label for="repartidoresDia<?php echo $diasId[$k];?>" style="text-align:center;color:white">Seleccionar</label>
              <select class="form-control text-center" id="repartidoresDia<?php echo $diasId[$k];?>" name="repartidoresDia<?php echo $diasId[$k];?>" style="height:50px;width:100%;font-size:20px;text-align-last:center">
                <?php
                $k2=0;
                while($k2<count($repartidoresId))
                    {
                    ?>
                    <option id="repartidorId<?php echo $repartidoresId[$k2];?>DiaId<?php echo $diasId[$k];?>" value="<?php echo $repartidoresId[$k2];?>" style="color:black;font-size:20px;">
                      <?php echo $repartidoresNombre[$k2];?>
                    </option>
                  <?php
                    $k2++;
                    }
                ?>
              </select>
            </div>
          </div>

        <?php
          $k++;
          }
      ?>
      <br>
      <br>

    </div>



    </div>


  <div class="row text-center">
    <button style="font-size:20px; width:50%;height:50px" type="button" class="btn btn-success botontema" onclick="nuevaAsignacion()" >Guardar</button>
  </div>
  <br>
  <br>
  <div id="alertaAsignacionNueva">

  </div>
  <br>
  <br>

</div>


    <br>
    <br>
    <br>
    <br>


  </div>
