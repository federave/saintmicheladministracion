

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/comodatos/vercondiciones/vercondiciones.css">
<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/acuerdos/comodatos/vercondiciones/vercondiciones.js"></script>


<?php require $_SESSION["raiz"] . '/modelo/acuerdos/comodatos/condiciones.php'?>



  <div class="contenedorver">
    <br>
    <br>
    <div class="row text-center">
      <h1 style="color:white">Lista de Condiciones Comodatos</h1>
    </div>
    <br>
    <br>

    <ul class="list-group">

      <?php
      $k=0;
      while($k<count($condicionesId))
          {
          ?>

          <li class="list-group-item">
            <div class="row">
              <div class="col-60 text-center">
                <label id="nombreCondicion<?php echo $condicionesId[$k];?>" style="font-size:20px;color:black">   <?php echo $condicionesNombre[$k];?></label>
              </div>
              <div class="col-40">
                <button class="btn btn-success" id="buttonVerCondicion<?php echo $condicionesId[$k];?>" name="" onclick="verCondicion(<?php echo $condicionesId[$k];?>)" style="height:50px;font-size:18px;margin-left:5%;width:90%;">Ver</button>
              </div>
            </div>

           <div class="row text-center" id="divCondicion<?php echo $condicionesId[$k];?>" style="display:none">
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
