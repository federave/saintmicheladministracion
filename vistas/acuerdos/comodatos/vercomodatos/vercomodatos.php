

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/comodatos/vercomodatos/vercomodatos.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/comodatos/vercomodatos/vercomodatos.js"></script>

  <?php

  $comodatosId = array();
  $comodatosId[0] = 1;
  $comodatosId[1] = 2;

  $comodatosNombre = array();
  $comodatosNombre[0] = "6 Bidones de 20L";
  $comodatosNombre[1] = "8 Bidones de 20L";


  ?>

  <div class="contenedorvercomodatos">
    <br>
    <br>
    <div class="row text-center">
      <h1 style="color:white">Lista de Comodatos</h1>
    </div>
    <br>
    <br>

    <ul class="list-group">

      <?php
      $k=0;
      while($k<count($comodatosId))
          {
          ?>

          <li class="list-group-item">
            <div class="row">
              <div class="col-60 text-center">
                <label id="" style="font-size:20px;color:black">   <?php echo $comodatosNombre[$k];?></label>
              </div>
              <div class="col-20">
                <button class="btn btn-success" id="buttonVerComodato<?php echo $comodatosId[$k];?>" name="" onclick="verComodato(<?php echo $comodatosId[$k];?>)" style="height:50px;font-size:18px;margin-left:5%;width:90%;">Ver</button>
              </div>
              <div class="col-20">
                <button class="btn btn-primary" id="buttonModificarComodato<?php echo $comodatosId[$k];?>" name="" onclick="modificarComodato(<?php echo $comodatosId[$k];?>)" style="height:50px;font-size:18px;margin-left:5%;width:90%;">Modificar</button>
              </div>
            </div>

             <div class="row text-center" id="divComodato<?php echo $comodatosId[$k];?>" style="display:none">

               <style media="screen">
                 .etiqueta{font-size:20px;color:black;}
               </style>

               <label id="nombreComodato<?php echo $comodatosId[$k];?>" class="etiqueta">Nombre: </label>
               <br>


                <div style="border: 1px solid #000000;border-radius: 4px;width:80%;margin:auto" id="divProductosComodato<?php echo $comodatosId[$k];?>" class="row text-center"></div>
                <br>

                <div style="border: 1px solid #000000;border-radius: 4px;width:80%;margin:auto" id="divMaquinasComodato<?php echo $comodatosId[$k];?>" class="row text-center"></div>
                <br>




             </div>

           </li>
        <?php
          $k++;
          }
      ?>

   </ul>



 <br>
 <br>

</div>
