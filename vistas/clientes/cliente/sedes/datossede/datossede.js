

///////////////////////////////////////////////////////////////
//////////////Nuevo Horario

function agregarHorario()
{
var idCliente = document.getElementById("idCliente").value;
var idSede = document.getElementById("idSede").value;
var horaInicio = document.getElementById("horaInicio").value;
var horaFin = document.getElementById("horaFin").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/datossede/ajax/nuevoHorario.php");
requerimiento.addParametro("idCliente",idCliente);
requerimiento.addParametro("idSede",idSede);
requerimiento.addParametro("horaInicio",horaInicio);
requerimiento.addParametro("horaFin",horaFin);
requerimiento.addListener(respuestaNuevoHorario);
requerimiento.ejecutar();
}


function respuestaNuevoHorario(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
var idHorario = xmlDoc.getElementsByTagName("IdHorario")[0].childNodes[0].nodeValue;

if(estado)
  {
  document.getElementById("numeroHorarios").value = document.getElementById("numeroHorarios").value +1;


  var horaInicio= document.getElementById("horaInicio").value;
  var horaFin = document.getElementById("horaFin").value;


  var labelHoraInicio = "<label style=\"font-size:20px;color:black\">Hora Inicio:"+horaInicio+"</label>";
  var br = "<br>";
  var labelHoraFin = "<label style=\"font-size:20px;color:black\">Hora Fin:"+horaFin+"</label>";
  var divCol60 = "<div class=\"col-60 text-center\">" + labelHoraInicio + br + labelHoraFin + "</div>";
  var boton = "<button class=\"btn btn-primary\" onclick=darDeBajaHorario(" +idHorario+ ") style=\"height:50px;font-size:18px;margin:auto;width:90%;\">Dar de Baja</button>";
  var divCol40 = "<div class=\"col-40\">" + br + boton + "</div>";
  var divRow = "<div class=\"row\">" + divCol60 + divCol40 + "</div>";
  var item = "<li id=\"horario"+idHorario+"\" class=\"list-group-item\">" +divRow+ "</li>";

  document.getElementById("listaHorarios").innerHTML+=item;


  }
else
  {
  alert("Error al dar de baja el horario");
  }
}












///////////////////////////////////////////////////////////////
//////////////Nuevo nombre


function darDeBajaHorario(idHorario)
{
var numeroHorarios = document.getElementById("numeroHorarios").value;
if(numeroHorarios>1)
  {
  var idCliente = document.getElementById("idCliente").value;
  var idSede = document.getElementById("idSede").value;
  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("sedes/datossede/ajax/darDeBajaHorario.php");
  requerimiento.addParametro("idCliente",idCliente);
  requerimiento.addParametro("idSede",idSede);
  requerimiento.addParametro("idHorario",idHorario);
  requerimiento.addListener(respuestaDarDeBajaHorario);
  requerimiento.ejecutar();
  }
else
  {
  alert("La sede no puede quedarse sin horarios");
  }
}


function respuestaDarDeBajaHorario(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);


var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
var idHorario = xmlDoc.getElementsByTagName("IdHorario")[0].childNodes[0].nodeValue;
if(estado)
  {
  document.getElementById("horario"+idHorario).style.display="none";
  document.getElementById("numeroHorarios").value = document.getElementById("numeroHorarios").value -1;
  }
else
  {
  alert("Error al dar de baja el horario");
  }
}





///////////////////////////////////////////////////////////////
//////////////Nuevo nombre

function nuevoNombreSede()
{
var id = document.getElementById("idcliente").value;
var nombreNuevo = document.getElementById("nombreNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("datosprincipales/ajax/nuevoNombre.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("nombre",nombreNuevo);
requerimiento.addListener(respuestaNuevoNombreSede);
requerimiento.ejecutar();
}

function respuestaNuevoNombreSede(respuesta)
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
  var nuevoNombre = document.getElementById("nombreNuevo").value;
  document.getElementById("nombre").innerHTML = "Nombre: " + nuevoNombre;
  document.getElementById("nombreNuevo").value = "";

  }
else
  {
  alert("Error al modificar el Nombre");
  }
}



///////////////////////////////////////////////////////////////
//////////////Nuevo Apellido


function nuevoApellidoSede()
{
var id = document.getElementById("idcliente").value;
var apellidoNuevo = document.getElementById("apellidoNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("datosprincipales/ajax/nuevoApellido.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("apellido",apellidoNuevo);
requerimiento.addListener(respuestaNuevoApellidoSede);
requerimiento.ejecutar();
}


function respuestaNuevoApellidoSede(respuesta)
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
  var nuevoApellido = document.getElementById("apellidoNuevo").value;
  document.getElementById("apellido").innerHTML = "Apellido: " + nuevoApellido;
  document.getElementById("apellidoNuevo").value = "";

  }
else
  {
  alert("Error al modificar el Apellido");
  }
}




///////////////////////////////////////////////////////////////
//////////////Nuevo Email


function nuevoEmailSede()
{
var id = document.getElementById("idcliente").value;
var emailNuevo = document.getElementById("emailNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("datosprincipales/ajax/nuevoEmail.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("email",emailNuevo);
requerimiento.addListener(respuestaNuevoEmailSede);
requerimiento.ejecutar();
}


function respuestaNuevoEmailSede(respuesta)
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
  var nuevoEmail = document.getElementById("emailNuevo").value;
  document.getElementById("email").innerHTML = "Email: " + nuevoEmail;
  document.getElementById("emailNuevo").value = "";

  }
else
  {
  alert("Error al modificar el Email");
  }
}



///////////////////////////////////////////////////////////////
//////////////Nuevo Telefono 1


function nuevoTelefonoSede()
{
var id = document.getElementById("idcliente").value;
var telefono1Nuevo = document.getElementById("telefono1Nuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("datosprincipales/ajax/nuevoTelefono1.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("telefono",telefono1Nuevo);
requerimiento.addListener(respuestaNuevoTelefono1);
requerimiento.ejecutar();
}


function respuestaNuevoTelefonoSede(respuesta)
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
  var nuevoTelefono1 = document.getElementById("telefono1Nuevo").value;
  document.getElementById("telefono1").innerHTML = "Telefono 1: " + nuevoTelefono1;
  document.getElementById("telefono1Nuevo").value = "";

  }
else
  {
  alert("Error al modificar el Telefono 1");
  }
}
