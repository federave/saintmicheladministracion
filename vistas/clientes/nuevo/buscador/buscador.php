



<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/clientes/nuevo/buscador/buscador.css">


<div class="row" style="margin-left:2%;margin-right:2%;width:96%;">

    <div class="buscador">

      <div class="form-group direccion">
        <label for="direccion" style="color:black">Dirección</label>
        <input class="form-control" id="direccion" name="direccion" type="text" placeholder="Dirección"/><br>
      </div>

      <div class="form-group partido">
        <label for="partido" style="color:black">Partido</label>
        <select placeholder="Partido" class="form-control" id="partido">
          <option>La Plata</option>
          <option>Ensenada</option>
          <option>Berisso</option>
          <option>Brandsen</option>
        </select>
      </div>

      <div class="form-group buscar">
        <input type="button" class="btn btn-lg btn-success btn-block" value="Buscar" onclick="buscar()">
      </div>

      <div class="form-group">
        <p style="color:black" id="direccioningresada">Dir: </p>
      </div>

      <input type="hidden" name="latitud" id="latitud" value="">
      <input type="hidden" name="longitud" id="longitud" value="">
      <input type="hidden" name="estadodireccion" id="estadodireccion" value="0">



    </div>

</div>

<br>

<div class="row" style="margin-left:2%;margin-right:2%;width:96%;">
  <div class="mapa" id="mapa" ></div>
</div>


<script src="<?php echo $_SESSION["carpeta"] ?>/vistas/mapas/buscador/buscador.js"></script>


<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDb-EOuDpEW26-ToL5tD55CsLhSmI9y7ig&callback=initMap">
</script>
