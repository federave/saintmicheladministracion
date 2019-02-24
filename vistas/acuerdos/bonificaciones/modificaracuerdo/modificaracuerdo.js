

///////////////////////////////////////////////////////////////
//////////////Nuevo Nombre


function nombreNuevoAcuerdoBonificaciones(idProducto)
{
var idAcuerdo = document.getElementById("idAcuerdoBonificaciones").value;
var nombreNuevo = document.getElementById("nombreNuevoAcuerdoBonificaciones").value;

var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificaracuerdo/ajax/nombreNuevo.php");
requerimiento.addParametro("id",idAcuerdo);
requerimiento.addParametro("nombre",nombreNuevo);
requerimiento.addListener(respuestaNombreNuevoAcuerdoBonificaciones);
requerimiento.ejecutar();

}


function respuestaNombreNuevoAcuerdoBonificaciones(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
var idAcuerdo = document.getElementById("idAcuerdoBonificaciones").value;

if(estado)
  {
  var nombreNuevo = document.getElementById("nombreNuevoAcuerdoBonificaciones").value;
  document.getElementById("nombreAcuerdoBonificaciones").innerHTML = "Nombre: " + nombreNuevo;
  document.getElementById("nombreAcuerdoBonificaciones"+idAcuerdo).innerHTML = nombreNuevo;
  document.getElementById("nombreNuevoAcuerdoBonificaciones").value = "";
  document.getElementById("alertaNombreAcuerdoBonificacionesNuevo").innerHTML = crearAlerta("Nombre Acuerdo Modificado!","success");

  }
else
  {
  alert("Error al modificar el Nombre");
  }
}





///////////////////////////////////////////////////////////////
//////////////Quitar Bonificacion


function quitarBonificacionAcuerdo(idBonificacion)
{
var idAcuerdo = document.getElementById("idAcuerdoBonificaciones").value;
idBonificacionQuitada = idBonificacion;

var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificaracuerdo/ajax/quitarBonificacion.php");
requerimiento.addParametro("id",idAcuerdo);
requerimiento.addParametro("idbonificacion",idBonificacion);
requerimiento.addListener(respuestaQuitarBonificacion);
requerimiento.ejecutar();

}

var idBonificacionQuitada;

function respuestaQuitarBonificacion(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  document.getElementById("divBonificacionAcuerdo"+idBonificacionQuitada).innerHTML = "";
  document.getElementById("divAgregarBonificacion"+idBonificacionQuitada).style.display = "block";
  document.getElementById("alertaBonificacion"+idBonificacionQuitada).innerHTML = crearAlerta("Bonificacion Quitada!","success");
  document.getElementById("bonificacion"+idBonificacionQuitada+"AcuerdoBonificacionesAgregar").checked = false;
  document.getElementById("divBonificacion"+idBonificacionQuitada+"AcuerdoBonificacionesAgregar").style.display = "none";

  }
else
  {
  alert("Error al modificar el Nombre");
  }
}





///////////////////////////////////////////////////////////////
//////////////Agregar Bonificacion

function agregarBonificacion(idBonificacion)
{
var idAcuerdo = document.getElementById("idAcuerdoBonificaciones").value;
idBonificacionAgregada = idBonificacion;
nombreBonificacionAgregada = document.getElementById("nombreBonificacion" + idBonificacion +"Agregar").value;

var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificaracuerdo/ajax/agregarBonificacion.php");
requerimiento.addParametro("idAcuerdo",idAcuerdo);
requerimiento.addParametro("idBonificacion",idBonificacion);
requerimiento.addListener(respuestaAgregarBonificacion);
requerimiento.ejecutar();

}

var idBonificacionAgregada;
var nombreBonificacionAgregada;



function respuestaAgregarBonificacion(respuesta)
{


xmlDoc = crearXML(respuesta.target.responseText);


var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  document.getElementById("divAgregarBonificacion"+idBonificacionAgregada).style.display="none";
  document.getElementById("alertaBonificacionAgregada").innerHTML = crearAlerta("Bonificacion Agregada!","success");
  mostrarBonificacion(idBonificacionAgregada,nombreBonificacionAgregada);
  document.getElementById("bonificacion"+idBonificacionAgregada+"AcuerdoBonificacionesAgregar").checked = false;
  document.getElementById("divBonificacion"+idBonificacionAgregada+"AcuerdoBonificacionesAgregar").style.display = "none";

  }
else
  {
  alert("Error al modificar el Nombre");
  }
}
