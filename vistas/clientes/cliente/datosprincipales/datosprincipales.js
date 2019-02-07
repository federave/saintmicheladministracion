







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
xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var nuevoNombre = document.getElementById("nombreNuevo").value;
  document.getElementById("nombre").innerHTML = "Nombre: " + nuevoNombre;
  document.getElementById("nombreNuevo").value = "";
  document.getElementById("alertaNombreNuevo").innerHTML = crearAlerta("Nombre Modificado!","success");

  }
else
  {
  alert("Error al modificar el Nombre");
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
  xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var nuevoEmail = document.getElementById("emailNuevo").value;
  document.getElementById("email").innerHTML = "Email: " + nuevoEmail;
  document.getElementById("emailNuevo").value = "";
  document.getElementById("alertaEmailNuevo").innerHTML = crearAlerta("Nombre Modificado!","success");

  }
else
  {
  alert("Error al modificar el Email");
  }
}



///////////////////////////////////////////////////////////////
//////////////Nuevo Telefono 1


function nuevoTelefono()
{
var id = document.getElementById("idcliente").value;
var telefonoNuevo = document.getElementById("telefonoNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("datosprincipales/ajax/nuevoTelefono.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("telefono",telefonoNuevo);
requerimiento.addListener(respuestaNuevoTelefono);
requerimiento.ejecutar();
}


function respuestaNuevoTelefono(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var nuevoTelefono = document.getElementById("telefonoNuevo").value;
  document.getElementById("telefono").innerHTML = "Telefono: " + nuevoTelefono;
  document.getElementById("telefonoNuevo").value = "";
  document.getElementById("alertaTelefonoNuevo").innerHTML = crearAlerta("Nombre Modificado!","success");

  }
else
  {
  alert("Error al modificar el Telefono 1");
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
  xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var nuevaRazonSocial = document.getElementById("razonsocialNueva").value;
  document.getElementById("razonsocial").innerHTML = "Razon Social: " + nuevaRazonSocial;
  document.getElementById("razonsocialNueva").value = "";
  document.getElementById("alertaRazonSocialNueva").innerHTML = crearAlerta("Nombre Modificado!","success");

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
  xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var nuevoCUIT = document.getElementById("cuitNuevo").value;
  document.getElementById("cuit").innerHTML = "CUIT: " + nuevoCUIT;
  document.getElementById("cuitNuevo").value = "";
  document.getElementById("alertaCuitNuevo").innerHTML = crearAlerta("Nombre Modificado!","success");

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
requerimiento.addParametro("idCondicionIVA",condicionNueva);
requerimiento.addListener(respuestaNuevaCondicion);
requerimiento.ejecutar();
}


function respuestaNuevaCondicion(respuesta)
{
  xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;


if(estado)
  {
  var nuevaCondicion = document.getElementById("condicionNueva").value;
  document.getElementById("condicion").innerHTML = "Condicion: " + nuevaCondicion;
  document.getElementById("alertaCondicionIVANueva").innerHTML = crearAlerta("Nombre Modificado!","success");

  }
else
  {
  alert("Error al modificar la Condicion");
  }
}






///////////////////////////////////////////////////////////////
//////////////Tipo Cliente Nuevo



function tipoClienteNuevo()
{
var id = document.getElementById("idcliente").value;
var tipoClienteNuevo = document.getElementById("tipoClienteNuevo").value;

var requerimiento = new RequerimientoGet();
requerimiento.setURL("datosprincipales/ajax/tipoClienteNuevo.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("idTipoCliente",tipoClienteNuevo);
requerimiento.addListener(respuestaTipoClienteNuevo);
requerimiento.ejecutar();
}


function respuestaTipoClienteNuevo(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;


if(estado)
  {
  var tipoClienteNuevo = document.getElementById("tipoClienteNuevo").value;
  document.getElementById("tipoCliente").innerHTML = "Tipo Cliente: " + tipoClienteNuevo;
  document.getElementById("alertaTipoClienteNuevo").innerHTML = crearAlerta("Nombre Modificado!","success");
  }
else
  {
  alert("Error al modificar el Tipo Cliente");
  }
}





///////////////////////////////////////////////////////////////
//////////////Razon De Compra Nueva



function razonDeCompraNueva()
{
var id = document.getElementById("idcliente").value;
var razonDeCompraNueva = document.getElementById("razonDeCompraNueva").value;

var requerimiento = new RequerimientoGet();
requerimiento.setURL("datosprincipales/ajax/razonDeCompraNueva.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("idRazonDeCompra",razonDeCompraNueva);
requerimiento.addListener(respuestaRazonDeCompraNueva);
requerimiento.ejecutar();
}


function respuestaRazonDeCompraNueva(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;


if(estado)
  {
  var razonDeCompraNueva = document.getElementById("razonDeCompraNueva").value;
  document.getElementById("razonDeCompra").innerHTML = "Razon De Compra: " + razonDeCompraNueva;
  document.getElementById("alertaRazonDeCompraNueva").innerHTML = crearAlerta("Nombre Modificado!","success");
  }
else
  {
  alert("Error al modificar la Razon De Compra");
  }
}
