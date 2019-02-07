
//Declaramos las variables que vamos a user
var lat = null;
var lng = null;
var mapa = null;
var localizador = null;
var marcador = null;

// Initialize and add the map
function initMap()
{
localizador = new google.maps.Geocoder();
// The location of centro
centro = {lat:-34.912185,lng:-57.957313};
// The map, centered at centro
mapa = new google.maps.Map(document.getElementById('mapa'), {zoom: 15, center: centro});
// The marker, positioned at centro
//var marker = new google.maps.Marker({position: centro, map: map});
agregarMarcador(-34.912185,-57.957313);
}


function agregarMarcador(latitud,longitud)
{
var latLng = new google.maps.LatLng(latitud,longitud);
marcador = new google.maps.Marker({
position: latLng,
map: mapa,
icon: {
path: google.maps.SymbolPath.CIRCLE,
scale: 8.5,
fillColor: "#0F0",
fillOpacity: 0.4,
strokeWeight: 0.4
},
});
marcador.setMap(mapa);
}
