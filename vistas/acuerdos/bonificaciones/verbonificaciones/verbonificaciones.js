

///////////////////////////////////////////////////////////////
//////////////Ver Producto


function verBonificacion(id)
{

if(document.getElementById("divBonificacion"+id).style.display=="block")
  {
  document.getElementById("divBonificacion"+id).style.display="none";
  document.getElementById("buttonVerBonificacion"+id).innerHTML="Ver";
  }
else
  {


  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("verbonificaciones/ajax/datosBonificacion.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosBonificacion);
  requerimiento.ejecutar();


  }

}


function respuestaVerDatosBonificacion(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;
  var cantidadMinima = xmlDoc.getElementsByTagName("CantidadMinima")[0].childNodes[0].nodeValue;
  var cantidadMaxima = xmlDoc.getElementsByTagName("CantidadMaxima")[0].childNodes[0].nodeValue;
  var porcentaje = xmlDoc.getElementsByTagName("Porcentaje")[0].childNodes[0].nodeValue;

  document.getElementById("nombreBonificacion"+id).innerHTML = "Nombre: " + nombre;
  document.getElementById("cantidadMinimaBonificacion"+id).innerHTML = "Cantidad Minima: " + cantidadMinima;
  if(cantidadMaxima>0)
    document.getElementById("cantidadMaximaBonificacion"+id).innerHTML = "Cantidad Maxima: " + cantidadMaxima;
  else
    document.getElementById("cantidadMaximaBonificacion"+id).innerHTML = "Cantidad Maxima: No Tiene";

  document.getElementById("porcentajeBonificacion"+id).innerHTML = "Porcentaje: " + (porcentaje*100)+"%";


  var numero = xmlDoc.getElementsByTagName("NumeroProductos")[0].childNodes[0].nodeValue;
  document.getElementById("productosBonificacion"+id).innerHTML="Productos:";
  for(i=0;i<numero;i++)
  {
  var nombreProducto=xmlDoc.getElementsByTagName("NombreProducto")[i].childNodes[0].nodeValue;
  document.getElementById("productosBonificacion"+id).innerHTML += " " + nombreProducto;
  }


  document.getElementById("divBonificacion"+id).style.display="block";
  document.getElementById("buttonVerBonificacion"+id).innerHTML="Ocultar";
  }
else
  {
  alert("Error al cargar datos de la bonificacion");
  }

}




///////////////////////////////////////////////////////////////
//////////////Go to Modificar Producto


function modificarProducto(id)
{

var requerimiento = new RequerimientoGet();
requerimiento.setURL("verbonificaciones/ajax/datosBonificacion.php");
requerimiento.addParametro("id",id);
requerimiento.addListener(respuestaDatosProducto);
requerimiento.ejecutar();

}



function respuestaDatosProducto(respuesta)
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

  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;
  var litros = xmlDoc.getElementsByTagName("Litros")[0].childNodes[0].nodeValue;
  var idTipoProducto = xmlDoc.getElementsByTagName("IdTipoProducto")[0].childNodes[0].nodeValue;

  document.getElementById("idProducto").value = id;
  document.getElementById("nombreProducto").innerHTML = "Nombre: " + nombre;
  document.getElementById("litrosProducto").innerHTML = "Litros: " + litros;
  document.getElementById("nombreProductoNuevo").value = nombre;
  document.getElementById("litrosProductoNuevo").value = litros;

  document.getElementById("idTipoProductoNuevo"+id).selected=true;


  var numero = xmlDoc.getElementsByTagName("NumeroInsumos")[0].childNodes[0].nodeValue;

  for(i=0;i<numero;i++)
  {
  var idInsumo=xmlDoc.getElementsByTagName("IdInsumo")[i].childNodes[0].nodeValue;
  document.getElementById("insumoNuevo"+idInsumo).checked=true;
  }

  seleccionarTab(2);

  }
else
  {
  alert("Error al cargar datos del producto");
  }

}










///////////////////////////////////////////////////////////////
//////////////Eliminar Producto

function eliminarProducto(id)
{
//  alert(id);
  var nombre = document.getElementById("productoNombre"+id).innerHTML;
  var r = confirm("Está seguro que desea eliminar el producto: "+nombre+" ?");
  if (r == true) {
// ELIMINAR
}
 else {
  }
}



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
