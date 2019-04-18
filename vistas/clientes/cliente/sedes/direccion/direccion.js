




//funcion que traduce la direccion en coordenadas
function localizarNuevo()
{
//obtengo la direccion del formulario

var calle = document.getElementById("calleNueva").value;
var numero = document.getElementById("numeroNuevo").value;

if(calle!="" && numero!="")
  {
  var partidoId = document.getElementById("partidoNuevo").value;
  var partido = document.getElementById("partido"+partidoId).innerHTML;
  var direccion = calle + " " + numero + " " + partido + " , Buenos Aires, Argentina";
  //hago la llamada al geodecoder
  localizador.geocode( { 'address': direccion} ,listenerLocalizarNuevo);
  }
else
  {
  limpiarLocalizacionNuevo();
  alert("No podemos encontrar la dirección ingresada");
  }

}




function listenerLocalizarNuevo(results, status)
{
//si el estado de la llamado es OK
if (status == google.maps.GeocoderStatus.OK)
  {
  //centro el mapa en las coordenadas obtenidas
  mapa.setCenter(results[0].geometry.location);
  //coloco el marcador en dichas coordenadas
  marcador.setPosition(results[0].geometry.location);
  document.getElementById("longitudNueva").value = results[0].geometry.location.lng();
  document.getElementById("latitudNueva").value = results[0].geometry.location.lat();
  document.getElementById("estadoLocalizacionNuevo").value = "1";
  document.getElementById("localizacionNueva").innerHTML = "Dirección Localizada";
  document.getElementById("etiquetaLatitudNueva").innerHTML = "Latitud: " + results[0].geometry.location.lat();
  document.getElementById("etiquetaLongitudNueva").innerHTML = "Longitud: " + results[0].geometry.location.lng();
  }
else
  {
  limpiarLocalizacionNuevo();
  //si no es OK devuelvo error
  alert("No podemos encontrar la dirección ingresada");
  }
}



function limpiarLocalizacionNuevo()
{
document.getElementById("longitudNueva").value = 0;
document.getElementById("latitudNueva").value = 0;
document.getElementById("estadoLocalizacionNuevo").value = "0";
document.getElementById("localizacionNueva").innerHTML = "Dirección No Localizada";
document.getElementById("etiquetaLatitudNueva").innerHTML = "Latitud: ";
document.getElementById("etiquetaLongitudNueva").innerHTML = "Longitud: ";
}






function guardarLocalizacion()
{
if(document.getElementById("estadoLocalizacionNuevo").value == "0")
  {
  if (confirm("La direccion no está localizada, quiere almacenarla igual ?"))
    {
    var idCliente = document.getElementById("idCliente").value;
    var idSede = document.getElementById("idSede").value;
    var estadoLocalizacion = document.getElementById("estadoLocalizacionNuevo").value;
    var latitudNueva = document.getElementById("latitudNueva").value;
    var longitudNueva = document.getElementById("longitudNueva").value;
    var calleNueva = document.getElementById("calleNueva").value;
    var numeroNuevo = document.getElementById("numeroNuevo").value;

    var requerimiento = new RequerimientoGet();
    requerimiento.setURL("sedes/direccion/ajax/nuevaLocalizacion.php");
    requerimiento.addParametro("idsede",idSede);
    requerimiento.addParametro("estadoLocalizacion",estadoLocalizacion);
    requerimiento.addParametro("latitud",latitudNueva);
    requerimiento.addParametro("longitud",longitudNueva);
    requerimiento.addParametro("calle",calleNueva);
    requerimiento.addParametro("numero",numeroNuevo);

    requerimiento.addListener(respuestaNuevaLocalizacion);
    requerimiento.ejecutar();
    }
  }
else
  {
  var idCliente = document.getElementById("idCliente").value;
  var idSede = document.getElementById("idSede").value;
  var estadoLocalizacion = document.getElementById("estadoLocalizacionNuevo").value;
  var latitudNueva = document.getElementById("latitudNueva").value;
  var longitudNueva = document.getElementById("longitudNueva").value;
  var calleNueva = document.getElementById("calleNueva").value;
  var numeroNuevo = document.getElementById("numeroNuevo").value;

  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("sedes/direccion/ajax/nuevaLocalizacion.php");
  requerimiento.addParametro("idsede",idSede);
  requerimiento.addParametro("estadoLocalizacion",estadoLocalizacion);
  requerimiento.addParametro("latitud",latitudNueva);
  requerimiento.addParametro("longitud",longitudNueva);
  requerimiento.addParametro("calle",calleNueva);
  requerimiento.addParametro("numero",numeroNuevo);

  requerimiento.addListener(respuestaNuevaLocalizacion);
  requerimiento.ejecutar();
  }
}

function respuestaNuevaLocalizacion(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
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








///////////////////////////////////////////////////////////////
//////////////Nuevo Calle

function nuevaCalle()
{

if(document.getElementById("estadoLocalizacionNuevo").value == "0")
  {
  if (confirm("La direccion no está localizada, quiere almacenarla igual ?"))
    {
    var idsede = document.getElementById("idSede").value;
    var calleNueva = document.getElementById("calleNueva").value;
    var estadoLocalizacion = document.getElementById("estadoLocalizacionNuevo").value;
    var latitudNueva = document.getElementById("latitudNueva").value;
    var longitudNueva = document.getElementById("longitudNueva").value;
    var requerimiento = new RequerimientoGet();
    requerimiento.setURL("sedes/direccion/ajax/nuevaCalle.php");
    requerimiento.addParametro("idsede",idsede);
    requerimiento.addParametro("calle",calleNueva);
    requerimiento.addParametro("estadoLocalizacion",estadoLocalizacion);
    requerimiento.addParametro("latitud",latitudNueva);
    requerimiento.addParametro("longitud",longitudNueva);
    requerimiento.addListener(respuestaNuevaCalle);
    requerimiento.ejecutar();
    }
  }
else
  {
    var idsede = document.getElementById("idSede").value;
    var calleNueva = document.getElementById("calleNueva").value;
    var estadoLocalizacion = document.getElementById("estadoLocalizacionNuevo").value;
    var latitudNueva = document.getElementById("latitudNueva").value;
    var longitudNueva = document.getElementById("longitudNueva").value;
    var requerimiento = new RequerimientoGet();
    requerimiento.setURL("direccion/ajax/nuevaCalle.php");
    requerimiento.addParametro("idsede",idsede);
    requerimiento.addParametro("calle",calleNueva);
    requerimiento.addParametro("estadoLocalizacion",estadoLocalizacion);
    requerimiento.addParametro("latitud",latitudNueva);
    requerimiento.addParametro("longitud",longitudNueva);
    requerimiento.addListener(respuestaNuevaCalle);
    requerimiento.ejecutar();
  }
}


function respuestaNuevaCalle(respuesta)
{

alert(respuesta.target.responseText);

xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var calleNueva = document.getElementById("calleNueva").value;
  document.getElementById("calle").innerHTML = "Calle: " + calleNueva;
  document.getElementById("calleNueva").value = "";
  document.getElementById("alertaCalleNuevaSede").innerHTML = crearAlerta("Calle Modificado!","success");


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
if(document.getElementById("estadoLocalizacionNuevo").value == "0")
  {
  if (confirm("La direccion no está localizada, quiere almacenarla igual ?"))
    {
    var idSede = document.getElementById("idSede").value;
    var numeroNuevo = document.getElementById("numeroNuevo").value;
    var estadoLocalizacion = document.getElementById("estadoLocalizacionNuevo").value;
    var latitudNueva = document.getElementById("latitudNueva").value;
    var longitudNueva = document.getElementById("longitudNueva").value;
    var requerimiento = new RequerimientoGet();
    requerimiento.setURL("sedes/direccion/ajax/nuevoNumero.php");
    requerimiento.addParametro("idsede",idSede);
    requerimiento.addParametro("numero",numeroNuevo);
    requerimiento.addParametro("estadoLocalizacion",estadoLocalizacion);
    requerimiento.addParametro("latitud",latitudNueva);
    requerimiento.addParametro("longitud",longitudNueva);
    requerimiento.addListener(respuestaNuevoNumero);
    requerimiento.ejecutar();
    }
  }
else
  {
  var idSede = document.getElementById("idSede").value;
  var numeroNuevo = document.getElementById("numeroNuevo").value;
  var estadoLocalizacion = document.getElementById("estadoLocalizacionNuevo").value;
  var latitudNueva = document.getElementById("latitudNueva").value;
  var longitudNueva = document.getElementById("longitudNueva").value;
  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("sedes/direccion/ajax/nuevoNumero.php");
  requerimiento.addParametro("idsede",idSede);
  requerimiento.addParametro("numero",numeroNuevo);
  requerimiento.addParametro("estadoLocalizacion",estadoLocalizacion);
  requerimiento.addParametro("latitud",latitudNueva);
  requerimiento.addParametro("longitud",longitudNueva);
  requerimiento.addListener(respuestaNuevoNumero);
  requerimiento.ejecutar();
  }
}


function respuestaNuevoNumero(respuesta)
{
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var numeroNuevo = document.getElementById("numeroNuevo").value;
  document.getElementById("numero").innerHTML = "Numero: " + numeroNuevo;
  document.getElementById("numeroNuevo").value = "";
  document.getElementById("alertaNumeroNuevoSede").innerHTML = crearAlerta("Numero Modificado!","success");

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
var idSede = document.getElementById("idSede").value;
var entre1Nuevo = document.getElementById("entre1Nuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/direccion/ajax/nuevoEntre1.php");
requerimiento.addParametro("idsede",idSede);
requerimiento.addParametro("entre1",entre1Nuevo);
requerimiento.addListener(respuestaNuevoEntre1);
requerimiento.ejecutar();
}


function respuestaNuevoEntre1(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var entre1Nuevo = document.getElementById("entre1Nuevo").value;
  document.getElementById("entre1").innerHTML = "Entre 1: " + entre1Nuevo;
  document.getElementById("entre1Nuevo").value = "";
  document.getElementById("alertaEntre1NuevoSede").innerHTML = crearAlerta("Entre 1 Modificado!","success");

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
var idSede = document.getElementById("idSede").value;
var entre2Nuevo = document.getElementById("entre2Nuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/direccion/ajax/nuevoEntre2.php");
requerimiento.addParametro("idsede",idSede);
requerimiento.addParametro("entre2",entre2Nuevo);
requerimiento.addListener(respuestaNuevoEntre2);
requerimiento.ejecutar();
}


function respuestaNuevoEntre2(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var entre2Nuevo = document.getElementById("entre2Nuevo").value;
  document.getElementById("entre2").innerHTML = "Entre 2: " + entre2Nuevo;
  document.getElementById("entre2Nuevo").value = "";
  document.getElementById("alertaEntre2NuevoSede").innerHTML = crearAlerta("Entre 2 Modificado!","success");

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
var idSede = document.getElementById("idSede").value;
var departamentoNuevo = document.getElementById("departamentoNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/direccion/ajax/nuevoDepartamento.php");
requerimiento.addParametro("idsede",idSede);
requerimiento.addParametro("departamento",departamentoNuevo);
requerimiento.addListener(respuestaNuevoDepartamento);
requerimiento.ejecutar();
}


function respuestaNuevoDepartamento(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var departamentoNuevo = document.getElementById("departamentoNuevo").value;
  document.getElementById("departamento").innerHTML = "Departamento: " + departamentoNuevo;
  document.getElementById("departamentoNuevo").value = "";
  document.getElementById("alertaDepartamentoNuevoSede").innerHTML = crearAlerta("Departamento Modificado!","success");

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
var idSede = document.getElementById("idSede").value;
var pisoNuevo = document.getElementById("pisoNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/direccion/ajax/nuevoPiso.php");
requerimiento.addParametro("idsede",idSede);
requerimiento.addParametro("piso",pisoNuevo);
requerimiento.addListener(respuestaNuevoPiso);
requerimiento.ejecutar();
}


function respuestaNuevoPiso(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var pisoNuevo = document.getElementById("pisoNuevo").value;
  document.getElementById("piso").innerHTML = "Piso: " + pisoNuevo;
  document.getElementById("pisoNuevo").value = "";
  document.getElementById("alertaPisoNuevoSede").innerHTML = crearAlerta("Piso Modificado!","success");

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
var idSede = document.getElementById("idSede").value;
var partidoNuevo = document.getElementById("partidoNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/direccion/ajax/nuevoPartido.php");
requerimiento.addParametro("idsede",idSede);
requerimiento.addParametro("idpartido",partidoNuevo);
requerimiento.addListener(respuestaNuevoPartido);
requerimiento.ejecutar();
}


function respuestaNuevoPartido(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  document.getElementById("alertaPartidoNuevoSede").innerHTML = crearAlerta("Partido Modificado!","success");
  }
else
  {
  alert("Error al modificar Partido");
  }
}




///////////////////////////////////////////////////////////////
//////////////Nuevo Partido


function nuevaZona()
{
var idSede = document.getElementById("idSede").value;
var idzona = document.getElementById("zonaNueva").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/direccion/ajax/nuevaZona.php");
requerimiento.addParametro("idsede",idSede);
requerimiento.addParametro("idzona",idzona);
requerimiento.addListener(respuestaNuevaZona);
requerimiento.ejecutar();
}


function respuestaNuevaZona(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  document.getElementById("alertaZonaNuevaSede").innerHTML = crearAlerta("Zona Modificada!","success");

  }
else
  {
  alert("Error al modificar la zona");
  }
}
