



////////////////////////////////////

function borrarHorarios()
{
document.getElementById("numeroHorarios").value=0;
document.getElementById("listaHorarios").innerHTML="";
}


function nuevoHorario()
{
var horaInicio = document.getElementById("horaInicio").value;
var horaFin = document.getElementById("horaFin").value;
if(horaInicio < horaFin)
  {
  agregarNuevoHorario(horaInicio,horaFin);
  }
else
  {
  alert("La hora de inicio no puede ser posterior a la hora de fin");
  }
}

function agregarNuevoHorario(horaInicio,horaFin)
{
var num = document.getElementById("numeroHorarios").value;
num++;
var nhi="horaInicio"+num;
var nhf="horaFin"+num;
var inputHoraInicio = "<input type=\"hidden\" name="+nhi+ " id="+nhi+" value="+horaInicio+">";
var inputHoraFin = "<input type=\"hidden\" name="+nhf+ " id="+nhf+ " value="+horaFin+">";
var labelHorario = "<label style=\"color:black\">" + "Horario " + num + "</label>";
var labelHoraInicio = "<label style=\"color:black\">" + "Hora Inicio: " + horaInicio + "</label>";
var labelHoraFin = "<label style=\"color:black\">" + "Hora Fin: " + horaFin + "</label>";
var br="<br>";
var item="<li class=\"list-group-item text-center\">"+inputHoraInicio+inputHoraFin+labelHorario+br+labelHoraInicio+br+labelHoraFin+"</li>";
document.getElementById("listaHorarios").innerHTML+=item;
document.getElementById("numeroHorarios").value=num;
}










////////////////////////////////////










//Declaramos las variables que vamos a user
var lat = null;
var lng = null;
var map = null;
var geocoder = null;
var marker = null;

// Initialize and add the map
function initMap()
{
geocoder = new google.maps.Geocoder();
// The location of centro
centro = {lat:-34.912185,lng:-57.957313};
// The map, centered at centro
map = new google.maps.Map(document.getElementById('mapa'), {zoom: 15, center: centro});
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
function localizar()
{
//obtengo la direccion del formulario

var calleSede = document.getElementById("calleSede").value;
var numeroSede = document.getElementById("numeroSede").value;

if(calleSede!="" && numeroSede!="")
  {
  var partidoId = document.getElementById("partidoSede").value;
  var partidoSede = document.getElementById("partido"+partidoId).innerHTML;
  var direccion = calleSede + " " + numeroSede + " " + partidoSede + " , Buenos Aires, Argentina";
  //hago la llamada al geodecoder
  geocoder.geocode( { 'address': direccion} ,listenerLocalizar);
  }
else
  {
  limpiarLocalizacion();
  alert("No podemos encontrar la dirección ingresada");
  }

}




function listenerLocalizar(results, status)
{
//si el estado de la llamado es OK
if (status == google.maps.GeocoderStatus.OK)
  {
  //centro el mapa en las coordenadas obtenidas
  map.setCenter(results[0].geometry.location);
  //coloco el marcador en dichas coordenadas
  marker.setPosition(results[0].geometry.location);
  document.getElementById("longitudSede").value = results[0].geometry.location.lng();
  document.getElementById("latitudSede").value = results[0].geometry.location.lat();
  document.getElementById("estadoLocalizacionSede").value = "1";
  document.getElementById("localizacionSede").innerHTML = "Dirección Localizada";
  document.getElementById("etiquetaLatitudSede").innerHTML = "Latitud: " + results[0].geometry.location.lat();
  document.getElementById("etiquetaLongitudSede").innerHTML = "Longitud: " + results[0].geometry.location.lng();
  }
else
  {
  limpiarLocalizacion();
  //si no es OK devuelvo error
  alert("No podemos encontrar la dirección ingresada");
  }
}



function limpiarLocalizacion()
{
document.getElementById("longitudSede").value = 0;
document.getElementById("latitudSede").value = 0;
document.getElementById("estadoLocalizacionSede").value = "0";
document.getElementById("localizacionSede").innerHTML = "Dirección No Localizada";
document.getElementById("etiquetaLatitudSede").innerHTML = "Latitud: ";
document.getElementById("etiquetaLongitudSede").innerHTML = "Longitud: ";
}
