
<html lang="es">


    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../general.css">

        <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
        <script src="mapa.js"></script>
        <link rel="stylesheet" href="mapa.css">

    </head>

    <body>


      <?php require '../../header/header.php' ?>





          <div class="row" style="margin-left:5%;margin-right:5%;width:90%;">
              <label>Direccion</label>
              <input style="color:black" type="text" id="direccion" name="direccion" value="Luro 1200, Mar del Plata, Buenos Aires, Argentina"/>
              <button id="pasar" onclick="pasar()">Pasar al mapa</button>
          </div>

          <div class="row" style="margin-left:5%;margin-right:5%;width:90%;">
            <?php require('../buscador/buscador.php'); ?>
          </div>






              <script>

              //Declaramos las variables que vamos a user
              var lat = null;
              var lng = null;
              var map = null;
              var geocoder = null;
              var marker = null;

              // Initialize and add the map
              function initMap() {

                geocoder = new google.maps.Geocoder();


                // The location of centro
                centro = {lat:-34.912185, lng:  -57.957313};
                // The map, centered at centro
                map = new google.maps.Map(
                document.getElementById('map'), {zoom: 15, center: centro});
                // The marker, positioned at centro
                //var marker = new google.maps.Marker({position: centro, map: map});


                addMarker(-34.912185,-57.957313);

              }

              function addMarker(latitud,longitud)
              {

                var latLng = new google.maps.LatLng(latitud,longitud);


                marker = new google.maps.Marker({
                              position: latLng,
                              map: map,
                              icon: {
                               path: google.maps.SymbolPath.CIRCLE,
                               scale: 8.5,
                               fillColor: "#0F0",
                               fillOpacity: 0.4,
                               strokeWeight: 0.4
                              },
                            });
                marker.setMap(map);

              }



              //funcion que traduce la direccion en coordenadas
    function pasar() {

        //obtengo la direccion del formulario
        var address = document.getElementById("direccion").value;
        //hago la llamada al geodecoder
        geocoder.geocode( { 'address': address}, function(results, status) {

        //si el estado de la llamado es OK
        if (status == google.maps.GeocoderStatus.OK) {
            //centro el mapa en las coordenadas obtenidas
            map.setCenter(results[0].geometry.location);
            //coloco el marcador en dichas coordenadas
            marker.setPosition(results[0].geometry.location);


      } else {
          //si no es OK devuelvo error
          alert("No podemos encontrar la direcci&oacute;n, error: " + status);
      }
    });
  }





              </script>

              <script async defer
              src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDb-EOuDpEW26-ToL5tD55CsLhSmI9y7ig&callback=initMap">
              </script>










              <footer  style="height:500px">
              </footer>










    </body>

</html>
