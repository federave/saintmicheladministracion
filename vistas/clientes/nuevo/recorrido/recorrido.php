





<?php
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



<div class="tabClienteNuevo">

  <h5>Recorrido</h5>

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
            <label for="dia<?php echo $diasId[$k];?>" style="color:black"><?php echo $diasNombre[$k];?></label>
            <div class="form-group" id="divRepartidoresDia<?php echo $diasId[$k];?>" style="margin-top:10px;display:none">

            <label for="repartidoresDia<?php echo $diasId[$k];?>" style="color:black">Seleccionar</label>
            <select class="form-control text-center" id="repartidoresDia<?php echo $diasId[$k];?>" name="repartidoresDia<?php echo $diasId[$k];?>" style="height:50px;width:100%;font-size:20px;text-align-last:center">
              <?php
              $k2=0;
              while($k2<count($repartidoresId))
                  {
                  ?>
                  <option value="<?php echo $repartidoresId[$k2];?>" style="color:black;font-size:20px;">
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
