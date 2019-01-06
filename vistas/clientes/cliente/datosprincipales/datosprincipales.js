







///////////////////////////////////////////////////////////////
//////////////Nuevo nombre


function nuevoNombre()
{
var id = document.getElementById("idcliente").value;
var nombreNuevo = document.getElementById("nombreNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("datosprincipales/ajax/nuevoNombre.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("nombre",nombreNuevo);
requerimiento.addListener(respuestaNuevoNombre);
requerimiento.ejecutar();
}


function respuestaNuevoNombre(respuesta)
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


function nuevoApellido()
{
var id = document.getElementById("idcliente").value;
var apellidoNuevo = document.getElementById("apellidoNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("datosprincipales/ajax/nuevoApellido.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("apellido",apellidoNuevo);
requerimiento.addListener(respuestaNuevoApellido);
requerimiento.ejecutar();
}


function respuestaNuevoApellido(respuesta)
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


function nuevoEmail()
{
var id = document.getElementById("idcliente").value;
var emailNuevo = document.getElementById("emailNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("datosprincipales/ajax/nuevoEmail.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("email",emailNuevo);
requerimiento.addListener(respuestaNuevoEmail);
requerimiento.ejecutar();
}


function respuestaNuevoEmail(respuesta)
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


function nuevoTelefono1()
{
var id = document.getElementById("idcliente").value;
var telefono1Nuevo = document.getElementById("telefono1Nuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("datosprincipales/ajax/nuevoTelefono1.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("telefono1",telefono1Nuevo);
requerimiento.addListener(respuestaNuevoTelefono1);
requerimiento.ejecutar();
}


function respuestaNuevoTelefono1(respuesta)
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



///////////////////////////////////////////////////////////////
//////////////Nuevo Telefono 1


function nuevoTelefono2()
{
var id = document.getElementById("idcliente").value;
var telefono2Nuevo = document.getElementById("telefono2Nuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("datosprincipales/ajax/nuevoTelefono2.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("telefono2",telefono2Nuevo);
requerimiento.addListener(respuestaNuevoTelefono2);
requerimiento.ejecutar();
}


function respuestaNuevoTelefono2(respuesta)
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
  var nuevoTelefono2 = document.getElementById("telefono2Nuevo").value;
  document.getElementById("telefono2").innerHTML = "Telefono 2: " + nuevoTelefono2;
  document.getElementById("telefono2Nuevo").value = "";

  }
else
  {
  alert("Error al modificar el Telefono 2");
  }
}
