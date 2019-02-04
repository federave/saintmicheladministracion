

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/asignacion/asignacion.css">
<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/radiobutton.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/sedes/asignacion/asignacion.js"></script>

  <?php

  $idAsignacion=1;
  $idRepartidorAsignado=2;
  $idVendedorAsignado=2;

  $estadoDia = array();
  $estadoDia[0] = true;
  $estadoDia[1] = false;
  $estadoDia[2] = false;
  $estadoDia[3] = true;
  $estadoDia[4] = false;
  $estadoDia[5] = false;

  $idRepartidorDia = array();
  $idRepartidorDia[0] = 2;
  $idRepartidorDia[1] = 2;
  $idRepartidorDia[2] = -1;
  $idRepartidorDia[3] = 2;
  $idRepartidorDia[4] = -1;
  $idRepartidorDia[5] = -1;


  $repartidoresVendedoresId = array();
  $repartidoresVendedoresId[0] = 1;
  $repartidoresVendedoresId[1] = 2;
  $repartidoresVendedoresId[2] = 3;
  $repartidoresVendedoresId[3] = 4;
  $repartidoresVendedoresNombre = array();
  $repartidoresVendedoresNombre[0] = "Narciso";
  $repartidoresVendedoresNombre[1] = "Javier";
  $repartidoresVendedoresNombre[2] = "Mariano";
  $repartidoresVendedoresNombre[3] = "Gustavo";

  $repartidoresId = array();
  $repartidoresId[0] = 1;
  $repartidoresId[1] = 2;
  $repartidoresId[2] = 3;
  $repartidoresNombre = array();
  $repartidoresNombre[0] = "Emanuel";
  $repartidoresNombre[1] = "Osmar";
  $repartidoresNombre[2] = "Matias";


  $vendedoresId = array();
  $vendedoresId[0] = 1;
  $vendedoresId[1] = 2;
  $vendedoresNombre = array();
  $vendedoresNombre[0] = "Ricardo";
  $vendedoresNombre[1] = "Marilina";


  $diasId = array();
  $diasId[0] = 1;
  $diasId[1] = 2;
  $diasId[2] = 3;
  $diasId[3] = 4;
  $diasId[4] = 5;
  $diasId[5] = 6;

  $diasNombre = array();
  $diasNombre[0] = "Lunes";
  $diasNombre[1] = "Martes";
  $diasNombre[2] = "Miercoles";
  $diasNombre[3] = "Jueves";
  $diasNombre[4] = "Viernes";
  $diasNombre[5] = "Sabados";

  ?>


  <input type="hidden" name="idAsignacion" id="idAsignacion" value="<?php echo $idAsignacion; ?>">

  <div class="contenedorasignacion">
    <br>
    <br>

    <br>
    <br>

    <!--  -->

    <div class="rowAsignacion">
      <div class="row text-center">
        <h2 style="color:black">Asignacion</h2>
      </div>
    <div class="funkyradio">
     <div class="funkyradio-info">
         <input <?php if($idAsignacion==1) echo "checked"; ?> type="radio" name="asignacion" id="empresa" value="1" onclick="mostrarDiv(empresa.value)"/>
         <label for="empresa" style="color:black">Empresa</label>
     </div>
     <div class="funkyradio-info">
         <input <?php if($idAsignacion==2) echo "checked"; ?> type="radio" name="asignacion" id="repartidor" value="2" onclick="mostrarDiv(repartidor.value)"/>
         <label for="repartidor" style="color:black">Repartidor</label>
         <?php  if($idAsignacion==2) $display="block";else $display="none";?>
         <div class="form-group" id="divRepartidores" style="margin-top:10px;display:<?php echo $display; ?>">
           <label style="text-align:center;font-size:20px;color:black">Seleccionar Repartidor</label>
           <select placeholder="" class="form-control" id="repartidorSeleccionado" style="height:50px;width:100%;font-size:20px;text-align-last:center">
             <?php
             $k=0;
             while($k<count($repartidoresVendedoresId))
                 {
                 ?>
                 <option value="<?php echo $repartidoresVendedoresId[$k];?>" <?php if($idRepartidorAsignado == $repartidoresVendedoresId[$k]) echo "selected";?> style="color:black;font-size:20px;text-align-last:center">
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
         <input <?php if($idAsignacion==3) echo "checked"; ?> type="radio" name="asignacion" id="vendedor" value="3" onclick="mostrarDiv(vendedor.value)"/>
         <label for="vendedor" style="color:black">Vendedor</label>
         <?php  if($idAsignacion==3) $display="block";else $display="none";?>
         <div class="form-group" id="divVendedores" style="margin-top:10px;display:<?php echo $display;?>">
           <label style="text-align:center;font-size:20px;color:black">Seleccionar Repartidor</label>
           <select placeholder="" class="form-control" id="vendedorSeleccionado" style="height:50px;width:100%;font-size:20px;text-align-last:center">
             <?php
             $k=0;
             while($k<count($vendedoresId))
                 {
                 ?>
                 <option value="<?php echo $vendedoresId[$k];?>" <?php if($idVendedorAsignado == $vendedoresId[$k]) echo "selected";?> style="color:black;font-size:20px;text-align-last:center">
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
      <h2 style="color:black">Recorrido</h2>
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

              <input <?php if($estadoDia[$k]) echo "checked";?> onchange="mostrarDivRepartidoresDia(<?php echo $diasId[$k];?>)" type="checkbox" name="dias" id="dia<?php echo $diasId[$k];?>"/>
              <label for="dia<?php echo $diasId[$k];?>" style="color:black"><?php echo $diasNombre[$k];?></label>
              <?php  if($estadoDia[$k] && $idAsignacion==1) $display="block";else $display="none";?>
              <div class="form-group" id="divRepartidoresDia<?php echo $diasId[$k];?>" style="margin-top:10px;display:<?php echo $display ?>">
              <label for="repartidoresDia<?php echo $diasId[$k];?>" style="color:black">Seleccionar</label>
              <select class="form-control text-center" id="repartidoresDia<?php echo $diasId[$k];?>" name="repartidoresDia<?php echo $diasId[$k];?>" style="height:50px;width:100%;font-size:20px;text-align-last:center">
                <?php
                $k2=0;
                while($k2<count($repartidoresId))
                    {
                    ?>
                    <option <?php if($idRepartidorDia[$k] == $repartidoresId[$k2]) echo "selected"; ?> value="<?php echo $repartidoresId[$k2];?>" style="color:black;font-size:20px;">
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


    <div class="row text-center">
      <button style="font-size:20px; width:50%;height:50px" type="button" class="btn btn-success" onclick="nuevaAsignacion()" >Guardar</button>
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
