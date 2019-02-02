
///////////////////////////////////////////////////////////////
//////////////Nueva Asignacion


function nuevaAsignacion()
{
var idCliente = document.getElementById("idCliente").value;
var idAsignacionOld = document.getElementById("idAsignacion").value;
var idAsignacionNew;
var idRepartidorSeleccionado=-1;
var idVendedorSeleccionado=-1;

if(document.getElementById("empresa").checked)
{
idAsignacionNew=1;
if(idAsignacionOld == idAsignacionNew)
  {
  alert("No hay modificaciones para hacer");
  return 0;
  }
}
else if(document.getElementById("repartidor").checked)
{
idAsignacionNew=2;
if(idAsignacionOld == idAsignacionNew)
  {
  alert("No hay modificaciones para hacer");
  return 0;
  }
else
  {
  idRepartidorSeleccionado = document.getElementById("repartidorSeleccionado").value;
  }

}
else
  {
  idAsignacionNew=3;
  if(idAsignacionOld == idAsignacionNew)
    {
    alert("No hay modificaciones para hacer");
    return 0;
    }
  else
    {
    idVendedorSeleccionado = document.getElementById("vendedorSeleccionado").value;
    }
  }


var requerimiento = new RequerimientoGet();
requerimiento.setURL("asignacion/ajax/nuevaAsignacion.php");
requerimiento.addParametro("id",idCliente);
requerimiento.addParametro("idAsignacion",idAsignacionNew);
requerimiento.addParametro("idRepartidor",idRepartidorSeleccionado);
requerimiento.addParametro("idVendedor",idVendedorSeleccionado);
requerimiento.addListener(respuestaNuevaAsignacion);
requerimiento.ejecutar();

document.getElementById("idAsignacion").value = idAsignacionNew;


}





function respuestaNuevaAsignacion(respuesta)
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

  document.getElementById("lunes").checked = false;
  document.getElementById("divLunesEmpresa").style.display = "none";

  document.getElementById("martes").checked = false;
  document.getElementById("divMartesEmpresa").style.display = "none";

  document.getElementById("miercoles").checked = false;
  document.getElementById("divMiercolesEmpresa").style.display = "none";

  document.getElementById("jueves").checked = false;
  document.getElementById("divJuevesEmpresa").style.display = "none";

  document.getElementById("viernes").checked = false;
  document.getElementById("divViernesEmpresa").style.display = "none";

  document.getElementById("sabado").checked = false;
  document.getElementById("divSabadoEmpresa").style.display = "none";

  alert('Asignación Modificada');



  }
else
  {
  alert("Error al modificar el Calle");
  }
}





///////////////////////////////////////////////////////////////
//////////////Nuevo Recorrido



function nuevoRecorrido()
{
var idCliente = document.getElementById("idCliente").value;
var idAsignacion = document.getElementById("idAsignacion").value;
var estadoLunes = document.getElementById("lunes").checked;
var estadoMartes = document.getElementById("martes").checked;
var estadoMiercoles = document.getElementById("miercoles").checked;
var estadoJueves = document.getElementById("jueves").checked;
var estadoViernes = document.getElementById("viernes").checked;
var estadoSabado = document.getElementById("sabado").checked;
var lunesEmpresa = document.getElementById("lunesEmpresa").value;
var martesEmpresa = document.getElementById("martesEmpresa").value;
var miercolesEmpresa = document.getElementById("miercolesEmpresa").value;
var juevesEmpresa = document.getElementById("juevesEmpresa").value;
var viernesEmpresa = document.getElementById("viernesEmpresa").value;
var sabadoEmpresa = document.getElementById("sabadoEmpresa").value;



var xml = new XML();
xml.startTag("Recorrido");

xml.startTag("Lunes");
  xml.addTag("Estado",estadoLunes);
  xml.addTag("Repartidor",lunesEmpresa);
xml.closeTag("Lunes");
xml.startTag("Martes");
  xml.addTag("Estado",estadoMartes);
  xml.addTag("Repartidor",martesEmpresa);
xml.closeTag("Martes");
xml.startTag("Miercoles");
  xml.addTag("Estado",estadoMiercoles);
  xml.addTag("Repartidor",miercolesEmpresa);
xml.closeTag("Miercoles");

xml.startTag("Jueves");
  xml.addTag("Estado",estadoJueves);
  xml.addTag("Repartidor",juevesEmpresa);
xml.closeTag("Jueves");

xml.startTag("Viernes");
  xml.addTag("Estado",estadoViernes);
  xml.addTag("Repartidor",viernesEmpresa);
xml.closeTag("Viernes");

xml.startTag("Sabado");
  xml.addTag("Estado",estadoSabado);
  xml.addTag("Repartidor",sabadoEmpresa);
xml.closeTag("Sabado");
xml.closeTag("Recorrido");


var requerimiento = new RequerimientoGet();
requerimiento.setURL("asignacion/ajax/nuevoRecorrido.php");
requerimiento.addParametro("id",idCliente);
requerimiento.addParametro("idAsignacion",idAsignacion);
requerimiento.addParametro("recorrido",xml.toString());
requerimiento.addListener(respuestaNuevoRecorrido);
requerimiento.ejecutar();


}







function respuestaNuevoRecorrido(respuesta)
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
if(estado=="1")
  {
  alert('Recorrido Guardado');
  }
else
  {
  alert("Error al guardar el recorrido");
  }
}
