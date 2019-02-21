







///////////////////////////////////////////////////////////////
//////////////Nuevo nombre


function nombreMaquinaNuevo()
{
var id = document.getElementById("idMaquina").value;
var nombreNuevo = document.getElementById("nombreMaquinaNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificarmaquina/ajax/nombreNuevo.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("nombre",nombreNuevo);
requerimiento.addListener(respuestaNombreMaquinaNuevo);
requerimiento.ejecutar();
}


function respuestaNombreMaquinaNuevo(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
var id = document.getElementById("idMaquina").value;

if(estado)
  {
  var nombreNuevo = document.getElementById("nombreMaquinaNuevo").value;
  document.getElementById("nombreMaquina").innerHTML = "Nombre: " + nombreNuevo;
  document.getElementById("maquinaNombre"+id).innerHTML = "Nombre: " + nombreNuevo;
  document.getElementById("alertaNombreMaquinaNuevo").innerHTML = crearAlerta("Nombre Maquina Modificado!","success");
  }
else
  {
  alert("Error al modificar el Nombre");
  }
}







///////////////////////////////////////////////////////////////
//////////////Nueva Marca


function marcaMaquinaNueva()
{
var id = document.getElementById("idMaquina").value;
var marcaNueva = document.getElementById("marcaMaquinaNueva").value;
alert(document.getElementById("marcaMaquinaNueva").value);
var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificarmaquina/ajax/marcaNueva.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("marca",marcaNueva);
requerimiento.addListener(respuestaMarcaMaquinaNueva);
requerimiento.ejecutar();
}


function respuestaMarcaMaquinaNueva(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {
  var marcaNueva = document.getElementById("marcaMaquinaNueva").value;
  document.getElementById("marcaMaquina").innerHTML = "Marca: " + marcaNueva;

  document.getElementById("alertaMarcaMaquinaNueva").innerHTML = crearAlerta("Marca Maquina Modificada!","success");

  }
else
  {
  alert("Error al modificar la marca");
  }
}






///////////////////////////////////////////////////////////////
//////////////Nueva Capacidad


function capacidadMaquinaNueva()
{
var id = document.getElementById("idMaquina").value;
var capacidadNueva = document.getElementById("capacidadMaquinaNueva").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificarmaquina/ajax/capacidadNueva.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("capacidad",capacidadNueva);
requerimiento.addListener(respuestaCapacidadMaquinaNueva);
requerimiento.ejecutar();
}


function respuestaCapacidadMaquinaNueva(respuesta)
{
alert(respuesta.target.responseText);
xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var capacidadNueva = document.getElementById("capacidadMaquinaNueva").value;
  document.getElementById("capacidadMaquina").innerHTML = "Capacidad: " + capacidadNueva;
  document.getElementById("alertaCapacidadMaquinaNueva").innerHTML = crearAlerta("Capacidad Maquina Modificada!","success");

  }
else
  {
  alert("Error al modificar la capacidad");
  }
}




///////////////////////////////////////////////////////////////
//////////////Tipo Maquina Nuevo


function tipoMaquinaNuevo()
{
var id = document.getElementById("idMaquina").value;
var idTipoMaquinaNuevo = document.getElementById("tipoMaquinaNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificarmaquina/ajax/tipoMaquinaNuevo.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("idTipoMaquina",idTipoMaquinaNuevo);
requerimiento.addListener(respuestaTipoMaquinaNuevo);
requerimiento.ejecutar();
}


function respuestaTipoMaquinaNuevo(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  document.getElementById("alertaTipoMaquinaNuevo").innerHTML = crearAlerta("Tipo Maquina Modificado!","success");
  }
else
  {
  alert("Error al modificar el tipo de maquina");
  }
}
