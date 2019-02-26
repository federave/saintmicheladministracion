

///////////////////////////////////////////////////////////////
//////////////Nuevo Nombre


function nombreNuevoComodato(nombre)
{
var idAlquiler = document.getElementById("idComodato").value;
var nombreNuevo = document.getElementById("nombreNuevoComodato").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificarcomodato/ajax/nombreNuevo.php");
requerimiento.addParametro("id",idComodato);
requerimiento.addParametro("nombre",nombreNuevo);
requerimiento.addListener(respuestaNombreNuevoComodato);
requerimiento.ejecutar();

}


function respuestaNombreNuevoComodato(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var nombreNuevo = document.getElementById("nombreNuevoComodato").value;
  document.getElementById("nombreComodato").innerHTML = "Nombre: " + nombreNuevo;
  document.getElementById("nombreNuevoComodato").value = "";
  document.getElementById("alertaNombreNuevoComodato").innerHTML = crearAlerta("Nombre Comodato Modificado!","success");
  }
else
  {
  alert("Error al modificar el Nombre");
  }
}



///////////////////////////////////////////////////////////////
//////////////Quitar Condicion

function quitarCondicion(idCondicion)
{
idCondicionQuitada = idCondicion;
var idComodato = document.getElementById("idComodato").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificarcomodato/ajax/quitarCondicion.php");
requerimiento.addParametro("id",idComodato);
requerimiento.addParametro("idCondicion",idCondicion);
requerimiento.addListener(respuestaQuitarCondicion);
requerimiento.ejecutar();
}

var idCondicionQuitada;

function respuestaQuitarCondicion(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var numero = document.getElementById("numeroCondicion"+idCondicionQuitada+"Quitar").value;
  document.getElementById("divCondicion"+numero+"Quitar").style.display = "none";
  document.getElementById("divCondicion"+numero+"Agregar").style.display = "block";
  document.getElementById("condicion"+idCondicionQuitada+"ComodatoQuitar").checked=false;
  document.getElementById("divCondicion"+idCondicionQuitada+"ComodatoQuitar").style.display = "none";
  }
else
  {
  alert("Error al quitar la condicion");
  }
}





///////////////////////////////////////////////////////////////
//////////////Agregar Condicion

function agregarCondicion(idCondicion)
{
idCondicionAgregada = idCondicion;
var idComodato = document.getElementById("idComodato").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificarcomodato/ajax/agregarCondicion.php");
requerimiento.addParametro("id",idComodato);
requerimiento.addParametro("idCondicion",idCondicion);
requerimiento.addListener(respuestaAgregarCondicion);
requerimiento.ejecutar();
}

var idCondicionAgregada;

function respuestaAgregarCondicion(respuesta)
{
alert(respuesta.target.responseText);

xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var numero = document.getElementById("numeroCondicion"+idCondicionAgregada+"Agregar").value;
  document.getElementById("divCondicion"+numero+"Quitar").style.display = "block";
  document.getElementById("divCondicion"+numero+"Agregar").style.display = "none";
  document.getElementById("condicion"+idCondicionAgregada+"ComodatoAgregar").checked=false;
  document.getElementById("divCondicion"+idCondicionAgregada+"ComodatoAgregar").style.display = "none";
  }
else
  {
  alert("Error al agregar la condicion");
  }
}


///////////////////////////////////////////////////////////////
//////////////Agregar Maquina

function agregarMaquina(idMaquina)
{
idMaquinaAgregada = idMaquina;
var idComodato = document.getElementById("idComodato").value;
var cantidad = document.getElementById("cantidadMaquina"+idMaquina+"ComodatoAgregar").value;

var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificarcomodato/ajax/agregarMaquina.php");
requerimiento.addParametro("id",idComodato);
requerimiento.addParametro("idMaquina",idMaquina);
requerimiento.addParametro("cantidad",cantidad);

requerimiento.addListener(respuestaAgregarMaquina);
requerimiento.ejecutar();
}

var idMaquinaAgregada;

function respuestaAgregarMaquina(respuesta)
{
alert(respuesta.target.responseText);

xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var numero = document.getElementById("numeroMaquina"+idMaquinaAgregada+"Agregar").value;
  document.getElementById("labelCantidadMaquina"+idMaquinaAgregada+"ComodatoModificar").innerHTML = "Cantidad Actual: " + document.getElementById("cantidadMaquina"+idMaquinaAgregada+"ComodatoAgregar").value;
  document.getElementById("divMaquina"+numero+"Modificar").style.display = "block";
  document.getElementById("divMaquina"+numero+"Agregar").style.display = "none";
  document.getElementById("maquina"+idMaquinaAgregada+"ComodatoAgregar").checked=false;
  document.getElementById("divMaquina"+idMaquinaAgregada+"ComodatoAgregar").style.display = "none";

  }
else
  {
  alert("Error al agregar la maquina");
  }
}


///////////////////////////////////////////////////////////////
//////////////Modificar Maquina

function modificarCantidadMaquina(idMaquina)
{
idMaquinaModificada = idMaquina;
var idComodato = document.getElementById("idComodato").value;
var cantidad = document.getElementById("cantidadMaquina"+idMaquina+"ComodatoModificar").value;

var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificarcomodato/ajax/modificarMaquina.php");
requerimiento.addParametro("id",idComodato);
requerimiento.addParametro("idMaquina",idMaquina);
requerimiento.addParametro("cantidad",cantidad);

requerimiento.addListener(respuestaModificarMaquina);
requerimiento.ejecutar();
}

var idMaquinaModificada;

function respuestaModificarMaquina(respuesta)
{
alert(respuesta.target.responseText);

xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  document.getElementById("labelCantidadMaquina"+idMaquinaModificada+"ComodatoModificar").innerHTML = "Cantidad Actual: " + document.getElementById("cantidadMaquina"+idMaquinaModificada+"ComodatoModificar").value;
  }
else
  {
  alert("Error al agregar la maquina");
  }
}

///////////////////////////////////////////////////////////////
//////////////Quitar Maquina

function quitarMaquina(idMaquina)
{
idMaquinaQuitada = idMaquina;
var idComodato = document.getElementById("idComodato").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificarcomodato/ajax/quitarMaquina.php");
requerimiento.addParametro("id",idComodato);
requerimiento.addParametro("idMaquina",idMaquina);
requerimiento.addListener(respuestaQuitarMaquina);
requerimiento.ejecutar();
}

var idMaquinaQuitada;

function respuestaQuitarMaquina(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var numero = document.getElementById("numeroMaquina"+idMaquinaQuitada+"Quitar").value;
  document.getElementById("divMaquina"+numero+"Modificar").style.display = "none";
  document.getElementById("divMaquina"+numero+"Agregar").style.display = "block";
  document.getElementById("maquina"+idCondicionMaquina+"ComodatoModificar").checked=false;
  document.getElementById("divMaquina"+idCondicionMaquina+"ComodatoModificar").style.display = "none";
  }
else
  {
  alert("Error al quitar la maquina");
  }
}
