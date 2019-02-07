


function seleccionarTabModificarSede(n)
{
var x = document.getElementsByName("liModificarSede");
var y = document.getElementsByName("divTabModificarSede");

for (i = 0; i < x.length; i++)
  {
  x[i].className -= " active";
  y[i].style.display = "none";
  }

x[n].className += " active";
y[n].style.display = "block";

/*
alert(2);
window.scrollTo(0,1000);
*/

if(n==1)
  {
  cargarMapaSede();
  }


}


///////////////////////////////////////////////////////////////
//////////////Go to Modificar Maquina


function modificarSede(idCliente,idSede)
{

var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/ajax/datosSede.php");
requerimiento.addParametro("idCliente",idCliente);
requerimiento.addParametro("idSede",idSede);

requerimiento.addListener(respuestaDatosSede);
requerimiento.ejecutar();


}



function respuestaDatosSede(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

  var idCliente = xmlDoc.getElementsByTagName("IdCliente")[0].childNodes[0].nodeValue;
  var idSede = xmlDoc.getElementsByTagName("IdSede")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;
  var telefono = xmlDoc.getElementsByTagName("Telefono")[0].childNodes[0].nodeValue;
  var email = xmlDoc.getElementsByTagName("Email")[0].childNodes[0].nodeValue;
  var observacion = xmlDoc.getElementsByTagName("Observacion")[0].childNodes[0].nodeValue;
  var nombreResponsable = xmlDoc.getElementsByTagName("NombreResponsable")[0].childNodes[0].nodeValue;
  var apellidoResponsable = xmlDoc.getElementsByTagName("ApellidoResponsable")[0].childNodes[0].nodeValue;

/*
  var calle = xmlDoc.getElementsByTagName("Calle")[0].childNodes[0].nodeValue;
  var numero = xmlDoc.getElementsByTagName("Numero")[0].childNodes[0].nodeValue;
  var entre1 = xmlDoc.getElementsByTagName("Entre1")[0].childNodes[0].nodeValue;
  var entre2 = xmlDoc.getElementsByTagName("Entre2")[0].childNodes[0].nodeValue;
  var departamento = xmlDoc.getElementsByTagName("Departamento")[0].childNodes[0].nodeValue;
  var piso = xmlDoc.getElementsByTagName("Piso")[0].childNodes[0].nodeValue;
  var estadoLocalizacion = xmlDoc.getElementsByTagName("EstadoLocalizacion")[0].childNodes[0].nodeValue;
  var latitud = xmlDoc.getElementsByTagName("Latitud")[0].childNodes[0].nodeValue;
  var longitud = xmlDoc.getElementsByTagName("Longitud")[0].childNodes[0].nodeValue;
*/

  document.getElementById("idSede").value = idSede;
  document.getElementById("nombre").innerHTML = "Nombre: " + nombre;
  document.getElementById("telefono").innerHTML = "Telefono: " + telefono;
  document.getElementById("email").innerHTML = "Email: " + email;
  document.getElementById("observacion").innerHTML = "Observacion: " + observacion;
  document.getElementById("nombreResponsable").innerHTML = "Nombre Responsable: " + nombreResponsable;
  document.getElementById("apellidoResponsable").innerHTML = "Apellido Responsable: " + apellidoResponsable;

/*
  document.getElementById("calle").innerHTML = "Calle: " + calle;
  document.getElementById("numero").innerHTML = "Numero: " + numero;
  document.getElementById("entre1").innerHTML = "Entre 1: " + entre1;
  document.getElementById("entre2").innerHTML = "Entre 2: " + entre2;
  document.getElementById("departamento").innerHTML = "Departamento: " + departamento;
  document.getElementById("piso").innerHTML = "Piso: " + piso;
*/

  document.getElementById("tituloSede").innerHTML= "Sede: "+nombre;

  document.getElementById("divSede").style.display = "block";





  }
else
  {
  alert("Error al cargar datos de la maquina");
  }

}








///////////////////////////////////////////////////////////////
//////////////Nuevo Calle


function nuevaCalle()
{
  var id = document.getElementById("idDireccion").value;
var calleNueva = document.getElementById("calleNueva").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/ajax/nuevaCalle.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("calle",calleNueva);
requerimiento.addListener(respuestaNuevaCalle);
requerimiento.ejecutar();
}


function respuestaNuevaCalle(respuesta)
{
if (window.DOMParser)
  {
  parser = new DOMParser();
  xmlDoc = parser.parseFromString(respuesta.target.responseText, "text/xml");
  }
else // Internet Explorer
  {
  xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
  xmlDoc.async = false;
  xmlDoc.loadXML(respuesta.target.responseText);
  }
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var calleNueva = document.getElementById("calleNueva").value;
  document.getElementById("calle").innerHTML = "Calle: " + calleNueva;
  document.getElementById("calleNueva").value = "";

  }
else
  {
  alert("Error al modificar el Calle");
  }
}







///////////////////////////////////////////////////////////////
//////////////Nuevo Numero


function nuevoNumero()
{
  var id = document.getElementById("idDireccion").value;
var numeroNuevo = document.getElementById("numeroNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/ajax/nuevoNumero.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("numero",numeroNuevo);
requerimiento.addListener(respuestaNuevoNumero);
requerimiento.ejecutar();
}


function respuestaNuevoNumero(respuesta)
{
if (window.DOMParser)
  {
  parser = new DOMParser();
  xmlDoc = parser.parseFromString(respuesta.target.responseText, "text/xml");
  }
else // Internet Explorer
  {
  xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
  xmlDoc.async = false;
  xmlDoc.loadXML(respuesta.target.responseText);
  }
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var numeroNuevo = document.getElementById("numeroNuevo").value;
  document.getElementById("numero").innerHTML = "Numero: " + numeroNuevo;
  document.getElementById("numeroNuevo").value = "";
  }
else
  {
  alert("Error al modificar el Numero");
  }
}








///////////////////////////////////////////////////////////////
//////////////Nuevo Entre1


function nuevoEntre1()
{
  var id = document.getElementById("idDireccion").value;
var entre1Nuevo = document.getElementById("entre1Nuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/ajax/nuevoEntre1.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("entre1",entre1Nuevo);
requerimiento.addListener(respuestaNuevoEntre1);
requerimiento.ejecutar();
}


function respuestaNuevoEntre1(respuesta)
{
if (window.DOMParser)
  {
  parser = new DOMParser();
  xmlDoc = parser.parseFromString(respuesta.target.responseText, "text/xml");
  }
else // Internet Explorer
  {
  xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
  xmlDoc.async = false;
  xmlDoc.loadXML(respuesta.target.responseText);
  }
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var entre1Nuevo = document.getElementById("entre1Nuevo").value;
  document.getElementById("entre1").innerHTML = "Entre 1: " + entre1Nuevo;
  document.getElementById("entre1Nuevo").value = "";
  }
else
  {
  alert("Error al modificar Entre 1");
  }
}




///////////////////////////////////////////////////////////////
//////////////Nuevo Entre2


function nuevoEntre2()
{
  var id = document.getElementById("idDireccion").value;
var entre1Nuevo = document.getElementById("entre2Nuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/ajax/nuevoEntre2.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("entre2",entre2Nuevo);
requerimiento.addListener(respuestaNuevoEntre2);
requerimiento.ejecutar();
}


function respuestaNuevoEntre2(respuesta)
{
if (window.DOMParser)
  {
  parser = new DOMParser();
  xmlDoc = parser.parseFromString(respuesta.target.responseText, "text/xml");
  }
else // Internet Explorer
  {
  xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
  xmlDoc.async = false;
  xmlDoc.loadXML(respuesta.target.responseText);
  }
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var entre2Nuevo = document.getElementById("entre2Nuevo").value;
  document.getElementById("entre2").innerHTML = "Entre 2: " + entre2Nuevo;
  document.getElementById("entre2Nuevo").value = "";
  }
else
  {
  alert("Error al modificar Entre 2");
  }
}





///////////////////////////////////////////////////////////////
//////////////Nuevo Departamento


function nuevoDepartamento()
{
  var id = document.getElementById("idDireccion").value;
var departamentoNuevo = document.getElementById("departamentoNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/ajax/nuevoDepartamento.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("departamento",departamentoNuevo);
requerimiento.addListener(respuestaNuevoDepartamento);
requerimiento.ejecutar();
}


function respuestaNuevoDepartamento(respuesta)
{
if (window.DOMParser)
  {
  parser = new DOMParser();
  xmlDoc = parser.parseFromString(respuesta.target.responseText, "text/xml");
  }
else // Internet Explorer
  {
  xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
  xmlDoc.async = false;
  xmlDoc.loadXML(respuesta.target.responseText);
  }
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var departamentoNuevo = document.getElementById("departamentoNuevo").value;
  document.getElementById("departamento").innerHTML = "Departamento: " + departamentoNuevo;
  document.getElementById("departamentoNuevo").value = "";
  }
else
  {
  alert("Error al modificar Departamento");
  }
}



///////////////////////////////////////////////////////////////
//////////////Nuevo Piso


function nuevoPiso()
{
  var id = document.getElementById("idDireccion").value;
var pisoNuevo = document.getElementById("pisoNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/ajax/nuevoPiso.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("piso",pisoNuevo);
requerimiento.addListener(respuestaNuevoPiso);
requerimiento.ejecutar();
}


function respuestaNuevoPiso(respuesta)
{
if (window.DOMParser)
  {
  parser = new DOMParser();
  xmlDoc = parser.parseFromString(respuesta.target.responseText, "text/xml");
  }
else // Internet Explorer
  {
  xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
  xmlDoc.async = false;
  xmlDoc.loadXML(respuesta.target.responseText);
  }
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var pisoNuevo = document.getElementById("pisoNuevo").value;
  document.getElementById("piso").innerHTML = "Piso: " + pisoNuevo;
  document.getElementById("pisoNuevo").value = "";
  }
else
  {
  alert("Error al modificar Piso");
  }
}





///////////////////////////////////////////////////////////////
//////////////Nuevo Partido


function nuevoPartido()
{
var id = document.getElementById("idDireccion").value;
var partidoNuevo = document.getElementById("partidoNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/ajax/nuevoPartido.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("partido",partidoNuevo);
requerimiento.addListener(respuestaNuevoPartido);
requerimiento.ejecutar();
}


function respuestaNuevoPartido(respuesta)
{
if (window.DOMParser)
  {
  parser = new DOMParser();
  xmlDoc = parser.parseFromString(respuesta.target.responseText, "text/xml");
  }
else // Internet Explorer
  {
  xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
  xmlDoc.async = false;
  xmlDoc.loadXML(respuesta.target.responseText);
  }
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var partidoNuevo = document.getElementById("partidoNuevo").value;
  document.getElementById("partido").innerHTML = "Partido: " + partidoNuevo;

  }
else
  {
  alert("Error al modificar Partido");
  }
}




////////////////////////////////////////////////////////////////////////////////
////////////////MAPA

//Declaramos las variables que vamos a user
var lat = null;
var lng = null;
var map = null;
var geocoder = null;
var marker = null;

// Initialize and add the map
function iniciarMapaDireccion() {

  geocoder = new google.maps.Geocoder();


  // The location of centro
  centro = {lat:-34.912185, lng:  -57.957313};
  // The map, centered at centro
  map = new google.maps.Map(
  document.getElementById('mapaDireccion'), {zoom: 15, center: centro});


  //alert(map);


  // The marker, positioned at centro
  //var marker = new google.maps.Marker({position: centro, map: map});
  var latitud = document.getElementById('latitud').value;
  var longitud = document.getElementById('longitud').value;
  var estado = document.getElementById('estadoLocalizacion').value;



  if (estado=="1")
    {
    addMarker(latitud,longitud);
    }
  else
    {
    addMarker(-34.912185,-57.957313);
    }

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
function localizar() {



  //obtengo la direccion del formulario

  var calle =  document.getElementById("calle").innerHTML;
  var numero =  document.getElementById("numero").innerHTML;
  var partido =  document.getElementById("partido").innerHTML;


  if(calle.length > 0 && numero.length > 0)
  {

  var direccion = calle + " " + numero + " " + partido + " , Buenos Aires, Argentina";

      //hago la llamada al geodecoder
      geocoder.geocode( { 'address': direccion}, function(results, status) {
      //si el estado de la llamado es OK
      if (status == google.maps.GeocoderStatus.OK) {
          //centro el mapa en las coordenadas obtenidas
          map.setCenter(results[0].geometry.location);
          //coloco el marcador en dichas coordenadas
          marker.setPosition(results[0].geometry.location);

          document.getElementById("longitud").value = results[0].geometry.location.lng();
          document.getElementById("latitud").value = results[0].geometry.location.lat();
          document.getElementById("estadoLocalizacion").value = "1";
          document.getElementById("latitudValor").innerHTML = "Latitud: "+results[0].geometry.location.lat();
          document.getElementById("longitudValor").innerHTML = "Longitud: "+results[0].geometry.location.lng();






        }
     else
        {

        document.getElementById("estadoLocalizacion").value = "0";

        alert("No podemos localizar la dirección ingresada");
        }
      });

  }
  else {

  document.getElementById("estadoLocalizacion").value = "0";
  //si no es OK devuelvo error
  }
}











function guardarLocalizacion()
{
  var id = document.getElementById("idDireccion").value;

var latitud = document.getElementById('latitud').value;
var longitud = document.getElementById('longitud').value;
var estado = document.getElementById('estadoLocalizacion').value;

var requerimiento = new RequerimientoGet();
requerimiento.setURL("direccion/ajax/nuevaLocalizacion.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("latitud",latitud);
requerimiento.addParametro("longitud",longitud);
requerimiento.addParametro("estado",estado);
requerimiento.addListener(respuestaNuevaLocalizacion);
requerimiento.ejecutar();
}








function respuestaNuevaLocalizacion(respuesta)
{
if (window.DOMParser)
  {
  parser = new DOMParser();
  xmlDoc = parser.parseFromString(respuesta.target.responseText, "text/xml");
  }
else // Internet Explorer
  {
  xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
  xmlDoc.async = false;
  xmlDoc.loadXML(respuesta.target.responseText);
  }
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  alert("Localización Almacenada");
  }
else
  {
  alert("Error al modificar la localizacion");
  }
}
