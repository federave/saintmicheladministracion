

<?php require $_SESSION["raiz"] . '/modelo/trabajadores/repartidores.php'?>
<?php require $_SESSION["raiz"] . '/modelo/trabajadores/vendedores.php'?>
<?php require $_SESSION["raiz"] . '/modelo/clientes/sedes/asignaciones.php'?>


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
