







///////////////////////////////////////////////////////////////
//////////////Nuevo nombre


function modificarPrecioProducto(idProducto)
{
var idAcuerdo = document.getElementById("idAcuerdoPreciosProductos").value;
var precioProductoNuevo = document.getElementById("precioProducto" + idProducto +"Nuevo").value;


var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificaracuerdo/ajax/precioProductoNuevo.php");
requerimiento.addParametro("id",idAcuerdo);
requerimiento.addParametro("idProducto",idProducto);
requerimiento.addParametro("precio",precioProductoNuevo);
requerimiento.addListener(respuestaPrecioProductoNuevo);
requerimiento.ejecutar();

}


function respuestaPrecioProductoNuevo(respuesta)
{
  alert(respuesta.target.responseText);

xmlDoc = crearXML(respuesta.target.responseText);


var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
    alert("jajaja");
    /*
  var nombreProductoNuevo = document.getElementById("nombreProductoNuevo").value;
  document.getElementById("nombreProducto").innerHTML = "Nombre: " + nombreProductoNuevo;
  document.getElementById("alertaNombreProductoNuevo").style.display = "block";
*/
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
//////////////Nuevo Telefono 2


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





///////////////////////////////////////////////////////////////
//////////////Nueva Razon Social



function nuevaRazonSocial()
{
var id = document.getElementById("idcliente").value;
var razonsocialNueva = document.getElementById("razonsocialNueva").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("datosprincipales/ajax/nuevaRazonSocial.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("razonsocial",razonsocialNueva);
requerimiento.addListener(respuestaNuevaRazonSocial);
requerimiento.ejecutar();
}


function respuestaNuevaRazonSocial(respuesta)
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
  var nuevaRazonSocial = document.getElementById("razonsocialNueva").value;
  document.getElementById("razonsocial").innerHTML = "Razon Social: " + nuevaRazonSocial;
  document.getElementById("razonsocialNueva").value = "";

  }
else
  {
  alert("Error al modificar la Razon Social");
  }
}



///////////////////////////////////////////////////////////////
//////////////Nuevo CUIT


function nuevoCUIT()
{
var id = document.getElementById("idcliente").value;
var cuitNuevo = document.getElementById("cuitNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("datosprincipales/ajax/nuevoCUIT.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("cuit",cuitNuevo);
requerimiento.addListener(respuestaNuevoCUIT);
requerimiento.ejecutar();
}


function respuestaNuevoCUIT(respuesta)
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
  var nuevoCUIT = document.getElementById("cuitNuevo").value;
  document.getElementById("cuit").innerHTML = "CUIT: " + nuevoCUIT;
  document.getElementById("cuitNuevo").value = "";
  }
else
  {
  alert("Error al modificar el Telefono 2");
  }
}






///////////////////////////////////////////////////////////////
//////////////Nueva Condicion



function nuevaCondicion()
{
var id = document.getElementById("idcliente").value;
var condicionNueva = document.getElementById("condicionNueva").value;

var requerimiento = new RequerimientoGet();
requerimiento.setURL("datosprincipales/ajax/nuevaCondicion.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("condicion",condicionNueva);
requerimiento.addListener(respuestaNuevaCondicion);
requerimiento.ejecutar();
}


function respuestaNuevaCondicion(respuesta)
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
  var nuevaCondicion = document.getElementById("condicionNueva").value;
  document.getElementById("condicion").innerHTML = "Condicion: " + nuevaCondicion;
  }
else
  {
  alert("Error al modificar la Condicion");
  }
}
