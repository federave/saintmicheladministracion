
<?php

$repartidoresId = array();
$repartidoresId[0] = 1;
$repartidoresId[1] = 2;
$repartidoresId[2] = 3;
$repartidoresId[3] = 4;
$repartidoresId[4] = 5;

$repartidoresNombre = array();
$repartidoresNombre[0] = "Narciso";
$repartidoresNombre[1] = "Gustavo";
$repartidoresNombre[2] = "Mariano";
$repartidoresNombre[3] = "Javier";
$repartidoresNombre[4] = "Emanuel";

$vendedoresId = array();
$vendedoresId[0] = 1;
$vendedoresId[1] = 2;
$vendedoresId[2] = 3;

$vendedoresNombre = array();
$vendedoresNombre[0] = "Ricardo";
$vendedoresNombre[1] = "Marilina";
$vendedoresNombre[2] = "MyM";

$asignacionesId = array();
$asignacionesId[0] = 1;
$asignacionesId[1] = 2;
$asignacionesId[2] = 3;

$asignacionesNombre = array();
$asignacionesNombre[0] = "Empresa";
$asignacionesNombre[1] = "Repartidor";
$asignacionesNombre[2] = "Vendedor";




?>

<div class="tabClienteNuevo">Asignación:

  <h4>Asignar Cliente a :</h4>

  <div class="funkyradio">
   <div class="funkyradio-info">
       <input checked type="radio" name="asignaciones" id="asignacionEmpresa" value="1" onclick="mostrarDiv(asignacionEmpresa.value)"/>
       <label for="asignacionEmpresa" style="color:black">Empresa</label>
   </div>
   <div class="funkyradio-info">
       <input type="radio" name="asignaciones" id="asignacionRepartidor" value="2" onclick="mostrarDiv(asignacionRepartidor.value)"/>
       <label for="asignacionRepartidor" style="color:black">Repartidor</label>

       <div class="form-group" id="divRepartidores" style="margin-top:10px;display:none">
         <label for="repartidores" style="color:black">Seleccionar</label>
         <select class="form-control text-center" id="repartidores" name="repartidores" style="height:50px;width:100%;font-size:20px;text-align-last:center">
           <?php
           $k=0;
           while($k<count($repartidoresId))
               {
               ?>
               <option value="<?php echo $repartidoresId[$k];?>" style="color:black;font-size:20px;">
                 <?php echo $repartidoresNombre[$k];?>
               </option>
             <?php
               $k++;
               }
           ?>
         </select>
       </div>
   </div>
   <div class="funkyradio-info" >
       <input type="radio" name="asignaciones" id="asignacionVendedor" value="3" onclick="mostrarDiv(asignacionVendedor.value)"/>
       <label for="asignacionVendedor" style="color:black">Vendedor</label>
       <div class="form-group" id="divVendedores" style="margin-top:10px;display:none">
         <label for="sel1" style="color:black">Seleccionar</label>
         <select class="form-control text-center" id="vendedores" name="vendedores" style="height:50px;width:100%;font-size:20px;text-align-last:center">
           <?php
           $k=0;
           while($k<count($vendedoresId))
               {
               ?>
               <option value="<?php echo $vendedoresId[$k];?>" style="color:black;font-size:20px;">
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

  <script type="text/javascript">


  function mostrarDiv(valor)
  {

  if(valor == 1)
   {
   document.getElementById("divRepartidores").style.display = "none";
   document.getElementById("divVendedores").style.display = "none";
   }
 else if(valor == 2)
    {
    document.getElementById("divRepartidores").style.display = "block";
    document.getElementById("divVendedores").style.display = "none";
    }
  else if(valor == 3)
     {
     document.getElementById("divRepartidores").style.display = "none";
     document.getElementById("divVendedores").style.display = "block";
     }
   else{}
  }


  </script>

 <br>
 <br>



</div>
