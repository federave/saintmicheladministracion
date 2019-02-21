

///////////////////////////////////////////////////////////////
//////////////Ver Producto


function verMaquina(id)
{

if(document.getElementById("divMaquina"+id).style.display=="block")
  {
  document.getElementById("divMaquina"+id).style.display="none";
  document.getElementById("buttonVerMaquina"+id).innerHTML="Ver";
  }
else
  {


  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("vermaquinas/ajax/datosMaquina.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosMaquina);
  requerimiento.ejecutar();


  }

}


function respuestaVerDatosMaquina(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;
  var marca = xmlDoc.getElementsByTagName("Marca")[0].childNodes[0].nodeValue;
  var capacidad = xmlDoc.getElementsByTagName("Capacidad")[0].childNodes[0].nodeValue;
  var tipoMaquina = xmlDoc.getElementsByTagName("TipoMaquina")[0].childNodes[0].nodeValue;

  document.getElementById("nombreMaquina"+id).innerHTML = "Nombre: " + nombre;
  document.getElementById("marcaMaquina"+id).innerHTML = "Marca: " + marca;
  document.getElementById("capacidadMaquina"+id).innerHTML = "Capacidad: " + capacidad;
  document.getElementById("tipoMaquina"+id).innerHTML = "Tipo Maquina: " + tipoMaquina;



  document.getElementById("divMaquina"+id).style.display="block";
  document.getElementById("buttonVerMaquina"+id).innerHTML="Ocultar";
  }
else
  {
  alert("Error al cargar datos de la maquina");
  }

}




///////////////////////////////////////////////////////////////
//////////////Go to Modificar Maquina


function modificarMaquina(id)
{

var requerimiento = new RequerimientoGet();
requerimiento.setURL("vermaquinas/ajax/datosMaquina.php");
requerimiento.addParametro("id",id);
requerimiento.addListener(respuestaDatosMaquina);
requerimiento.ejecutar();

}



function respuestaDatosMaquina(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;
  var marca = xmlDoc.getElementsByTagName("Marca")[0].childNodes[0].nodeValue;
  var capacidad = xmlDoc.getElementsByTagName("Capacidad")[0].childNodes[0].nodeValue;
  var tipoMaquina = xmlDoc.getElementsByTagName("TipoMaquina")[0].childNodes[0].nodeValue;
  var idTipoMaquina = xmlDoc.getElementsByTagName("IdTipoMaquina")[0].childNodes[0].nodeValue;

  document.getElementById("nombreMaquina").innerHTML = "Nombre: " + nombre;
  document.getElementById("marcaMaquina").innerHTML = "Marca: " + marca;
  document.getElementById("capacidadMaquina").innerHTML = "Capacidad: " + capacidad;
  document.getElementById("tipoMaquina").innerHTML = "Tipo Maquina";
  document.getElementById("tipoMaquinaNuevo"+idTipoMaquina).selected=true;

  document.getElementById("idMaquina").value = id;




  seleccionarTabMaquinas(2);

  }
else
  {
  alert("Error al cargar datos de la maquina");
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
