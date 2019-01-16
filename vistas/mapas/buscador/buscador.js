
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
  document.getElementById('mapa'), {zoom: 15, center: centro});
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
function buscar() {



  //obtengo la direccion del formulario
  var address = document.getElementById("direccion").value;


  if(address.length > 0)
  {

      address += " , " + document.getElementById("partido").value + " , Buenos Aires, Argentina";

      //hago la llamada al geodecoder
      geocoder.geocode( { 'address': address}, function(results, status) {
      //si el estado de la llamado es OK
      if (status == google.maps.GeocoderStatus.OK) {
          //centro el mapa en las coordenadas obtenidas
          map.setCenter(results[0].geometry.location);
          //coloco el marcador en dichas coordenadas
          marker.setPosition(results[0].geometry.location);

          document.getElementById("longitud").value = results[0].geometry.location.lng();
          document.getElementById("latitud").value = results[0].geometry.location.lat();
          document.getElementById("estadodireccion").value = "1";
          document.getElementById("direccioningresada").innerHTML = "Dir: "+address;






        } else {

          document.getElementById("direccioningresada").innerHTML = "Dir: ";


        document.getElementById("estadodireccion").value = "0";
        //si no es OK devuelvo error
        alert("No podemos encontrar la dirección ingresada");
        }
      });

  }
  else {

  document.getElementById("direccioningresada").innerHTML = "Dir: ";
  document.getElementById("estadodireccion").value = "0";
  //si no es OK devuelvo error
  }
}
