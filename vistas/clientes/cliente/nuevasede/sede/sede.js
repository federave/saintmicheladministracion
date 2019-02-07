



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
  localizador.geocode( { 'address': direccion} ,listenerLocalizar);
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
  mapa.setCenter(results[0].geometry.location);
  //coloco el marcador en dichas coordenadas
  marcador.setPosition(results[0].geometry.location);
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
