

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/asignacion/asignacion.css">
<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/estilos/radiobutton.css">



<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/cliente/asignacion/asignacion.js"></script>

  <?php
  $idCliente=1;
  $idAsignacion=1;
  $idRepartidorAsignado=-1;
  $estadoLunes=false;
  $idRepartidorLunes=-1;
  $estadoMartes=false;
  $idRepartidorMartes=-1;
  $estadoMiercoles=false;
  $idRepartidorMiercoles=-1;
  $estadoJueves=false;
  $idRepartidorJueves=-1;
  $estadoViernes=false;
  $idRepartidorViernes=-1;
  $estadoSabado=false;
  $idRepartidorSabado=-1;

  $repartidoresVendedores = array();
  $repartidoresVendedores[0] = "Narciso";
  $repartidoresVendedores[1] = "Javier";
  $repartidoresVendedores[2] = "Mariano";
  $repartidoresVendedores[3] = "Gustavo";

  $repartidoresEmpresa = array();
  $repartidoresEmpresa[0] = "Emanuel";
  $repartidoresEmpresa[1] = "Osmar";
  $repartidoresEmpresa[2] = "Matias";


  $vendedores = array();
  $vendedores[0] = "Ricardo";
  $vendedores[1] = "Marilina";
  ?>


  <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $idCliente; ?>">
  <input type="hidden" name="idAsignacion" id="idAsignacion" value="<?php echo $idAsignacion; ?>">

  <div class="contenedorA borde">
    <br>
    <br>
    <div class="row text-center">
      <h2>Asignar Cliente a:</h2>
    </div>
    <br>
    <br>

    <!--  -->

    <div class="rowAsignacion">

    <div class="funkyradio">
     <div class="funkyradio-info">
         <input <?php if($idAsignacion==1) echo "checked"; ?> type="radio" name="asignacion" id="empresa" value="1" onclick="mostrarDiv(empresa.value)"/>
         <label for="empresa" style="color:black">Empresa</label>
     </div>
     <div class="funkyradio-info">
         <input <?php if($idAsignacion==2) echo "checked"; ?> type="radio" name="asignacion" id="repartidor" value="2" onclick="mostrarDiv(repartidor.value)"/>
         <label for="repartidor" style="color:black">Repartidor</label>

         <div class="form-group" id="divRepartidores" style="margin-top:10px;display:none">
           <label style="text-align:center;font-size:20px;color:black">Seleccionar Repartidor</label>
           <select placeholder="" class="form-control" id="repartidorSeleccionado" style="height:50px;width:100%;font-size:20px;text-align-last:center">
             <?php
             $k=0;
             while($k<count($repartidoresVendedores))
                 {
                 ?>
                 <option value="<?php echo $k;?>" style="color:black;font-size:20px;text-align-last:center">
                   <?php echo $repartidoresVendedores[$k];?>
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
         <div class="form-group" id="divVendedores" style="margin-top:10px;display:none">
           <label style="text-align:center;font-size:20px;color:black">Seleccionar Repartidor</label>
           <select placeholder="" class="form-control" id="vendedorSeleccionado" style="height:50px;width:100%;font-size:20px;text-align-last:center">
             <?php
             $k=0;
             while($k<count($vendedores))
                 {
                 ?>
                 <option value="<?php echo $k;?>" style="color:black;font-size:20px;text-align-last:center">
                   <?php echo $vendedores[$k];?>
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
    <div class="row text-center">
      <button style="font-size:20px; width:50%;height:50px" type="button" class="btn btn-primary" onclick="nuevaAsignacion()" >Guardar</button>
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



    <br>
    <br>
    <div class="row text-center">
      <h2>Recorrido</h2>
    </div>
    <br>
    <br>

    <div class="rowAsignacion">

      <div class="funkyradio">


        <script type="text/javascript">
          function mostrarDivLunes()
          {
          if(document.getElementById("idAsignacion").value == 1)
            {
            if(document.getElementById("divLunesEmpresa").style.display=="block")
              document.getElementById("divLunesEmpresa").style.display="none";
            else
              document.getElementById("divLunesEmpresa").style.display="block";
            }
          }
          function mostrarDivMartes()
          {
          if(document.getElementById("idAsignacion").value == 1)
            {
              if(document.getElementById("divMartesEmpresa").style.display=="block")
                document.getElementById("divMartesEmpresa").style.display="none";
              else
                document.getElementById("divMartesEmpresa").style.display="block";            }
          }
          function mostrarDivMiercoles()
          {
          if(document.getElementById("idAsignacion").value == 1)
            {
              if(document.getElementById("divMiercolesEmpresa").style.display=="block")
                document.getElementById("divMiercolesEmpresa").style.display="none";
              else
                document.getElementById("divMiercolesEmpresa").style.display="block";            }
          }
          function mostrarDivJueves()
          {
          if(document.getElementById("idAsignacion").value == 1)
            {
              if(document.getElementById("divJuevesEmpresa").style.display=="block")
                document.getElementById("divJuevesEmpresa").style.display="none";
              else
                document.getElementById("divJuevesEmpresa").style.display="block";            }
          }
          function mostrarDivViernes()
          {
          if(document.getElementById("idAsignacion").value == 1)
            {
              if(document.getElementById("divViernesEmpresa").style.display=="block")
                document.getElementById("divViernesEmpresa").style.display="none";
              else
                document.getElementById("divViernesEmpresa").style.display="block";            }
          }
          function mostrarDivSabado()
          {
          if(document.getElementById("idAsignacion").value == 1)
            {
              if(document.getElementById("divSabadoEmpresa").style.display=="block")
                document.getElementById("divSabadoEmpresa").style.display="none";
              else
                document.getElementById("divSabadoEmpresa").style.display="block";
                          }
          }
        </script>



        <div class="funkyradio-info">

            <input type="checkbox" name="dias" id="lunes" onclick="mostrarDivLunes()" />
            <label for="lunes" style="color:black">Lunes</label>
            <br>
            <div class="form-group" id="divLunesEmpresa" style="display:none">
              <label style="text-align:center;font-size:20px;color:black">Seleccionar Repartidor</label>
              <select placeholder="" class="form-control" id="lunesEmpresa" style="height:50px;width:100%;font-size:20px;text-align-last:center">
                <?php

                $k=0;
                while($k<count($repartidoresEmpresa))
                    {
                    ?>
                    <option value="<?php echo $k;?>" style="color:black;font-size:20px;text-align-last:center">
                      <?php echo $repartidoresEmpresa[$k];?>
                    </option>
                  <?php
                    $k++;
                    }
                ?>
              </select>
            </div>
        </div>
        <div class="funkyradio-info">
            <input type="checkbox" name="dias" id="martes" onclick="mostrarDivMartes()"/>
            <label for="martes" style="color:black">Martes</label>

            <div class="form-group" id="divMartesEmpresa" style="display:none">
              <label style="text-align:center;font-size:20px;color:black">Seleccionar Repartidor</label>
              <select placeholder="" class="form-control" id="martesEmpresa" style="height:50px;width:100%;font-size:20px;text-align-last:center">
                <?php
                $repartidoresEmpresa = array();
                $repartidoresEmpresa[0] = "Emanuel";
                $repartidoresEmpresa[1] = "Osmar";
                $repartidoresEmpresa[2] = "Matias";
                $k=0;
                while($k<count($repartidoresEmpresa))
                    {
                    ?>
                    <option value="<?php echo $k;?>" style="color:black;font-size:20px;text-align-last:center">
                      <?php echo $repartidoresEmpresa[$k];?>
                    </option>
                  <?php
                    $k++;
                    }
                ?>
              </select>
            </div>


        </div>
        <div class="funkyradio-info">
            <input type="checkbox" name="dias" id="miercoles" onclick="mostrarDivMiercoles()"/>
            <label for="miercoles" style="color:black">Miercoles</label>

            <div class="form-group" id="divMiercolesEmpresa" style="display:none">
              <label style="text-align:center;font-size:20px;color:black">Seleccionar Repartidor</label>
              <select placeholder="" class="form-control" id="miercolesEmpresa" style="height:50px;width:100%;font-size:20px;text-align-last:center">
                <?php
                $repartidoresEmpresa = array();
                $repartidoresEmpresa[0] = "Emanuel";
                $repartidoresEmpresa[1] = "Osmar";
                $repartidoresEmpresa[2] = "Matias";
                $k=0;
                while($k<count($repartidoresEmpresa))
                    {
                    ?>
                    <option value="<?php echo $k;?>" style="color:black;font-size:20px;text-align-last:center">
                      <?php echo $repartidoresEmpresa[$k];?>
                    </option>
                  <?php
                    $k++;
                    }
                ?>
              </select>
            </div>





        </div>
        <div class="funkyradio-info">
            <input type="checkbox" name="dias" id="jueves" onclick="mostrarDivJueves()"/>
            <label for="jueves" style="color:black">Jueves</label>

            <div class="form-group" id="divJuevesEmpresa" style="display:none">
              <label style="text-align:center;font-size:20px;color:black">Seleccionar Repartidor</label>
              <select placeholder="" class="form-control" id="juevesEmpresa" style="height:50px;width:100%;font-size:20px;text-align-last:center">
                <?php
                $repartidoresEmpresa = array();
                $repartidoresEmpresa[0] = "Emanuel";
                $repartidoresEmpresa[1] = "Osmar";
                $repartidoresEmpresa[2] = "Matias";
                $k=0;
                while($k<count($repartidoresEmpresa))
                    {
                    ?>
                    <option value="<?php echo $k;?>" style="color:black;font-size:20px;text-align-last:center">
                      <?php echo $repartidoresEmpresa[$k];?>
                    </option>
                  <?php
                    $k++;
                    }
                ?>
              </select>
            </div>




        </div>
        <div class="funkyradio-info">
            <input type="checkbox" name="dias" id="viernes" onclick="mostrarDivViernes()"/>
            <label for="viernes" style="color:black">Viernes</label>

            <div class="form-group" id="divViernesEmpresa" style="display:none">
              <label style="text-align:center;font-size:20px;color:black">Seleccionar Repartidor</label>
              <select placeholder="" class="form-control" id="viernesEmpresa" style="height:50px;width:100%;font-size:20px;text-align-last:center">
                <?php
                $repartidoresEmpresa = array();
                $repartidoresEmpresa[0] = "Emanuel";
                $repartidoresEmpresa[1] = "Osmar";
                $repartidoresEmpresa[2] = "Matias";
                $k=0;
                while($k<count($repartidoresEmpresa))
                    {
                    ?>
                    <option value="<?php echo $k;?>" style="color:black;font-size:20px;text-align-last:center">
                      <?php echo $repartidoresEmpresa[$k];?>
                    </option>
                  <?php
                    $k++;
                    }
                ?>
              </select>
            </div>




        </div>
        <div class="funkyradio-info">
            <input type="checkbox" name="dias" id="sabado" onclick="mostrarDivSabado()"/>
            <label for="sabado" style="color:black">Sábado</label>


            <div class="form-group" id="divSabadoEmpresa" style="display:none">
              <label style="text-align:center;font-size:20px;color:black">Seleccionar Repartidor</label>
              <select placeholder="" class="form-control" id="sabadoEmpresa" style="height:50px;width:100%;font-size:20px;text-align-last:center">
                <?php
                $repartidoresEmpresa = array();
                $repartidoresEmpresa[0] = "Emanuel";
                $repartidoresEmpresa[1] = "Osmar";
                $repartidoresEmpresa[2] = "Matias";
                $k=0;
                while($k<count($repartidoresEmpresa))
                    {
                    ?>
                    <option value="<?php echo $k;?>" style="color:black;font-size:20px;text-align-last:center">
                      <?php echo $repartidoresEmpresa[$k];?>
                    </option>
                  <?php
                    $k++;
                    }
                ?>
              </select>
            </div>




        </div>

        <br>
        <br>

    </div>
    <br>
    <br>
    <div class="row text-center">
      <button style="font-size:20px; width:50%;height:50px" type="button" class="btn btn-primary" onclick="nuevoRecorrido()" >Guardar</button>
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












    <br>
    <br>
    <br>
    <br>


  </div>
