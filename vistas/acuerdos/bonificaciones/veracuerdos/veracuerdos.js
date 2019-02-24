

///////////////////////////////////////////////////////////////
//////////////Ver Producto


function verAcuerdoBonificacion(id)
{
if(document.getElementById("divAcuerdoBonificacion"+id).style.display=="block")
  {
  document.getElementById("divAcuerdoBonificacion"+id).style.display="none";
  document.getElementById("buttonVerAcuerdoBonificacion"+id).innerHTML="Ver";
  }
else
  {


  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("veracuerdos/ajax/datosAcuerdoBonificaciones.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosAcuerdoBonificaciones);
  requerimiento.ejecutar();


  }

}


function respuestaVerDatosAcuerdoBonificaciones(respuesta)
{



xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;

  document.getElementById("nombreAcuerdoBonificacion"+id).innerHTML="Nombre: "+nombre;
  var numero = xmlDoc.getElementsByTagName("NumeroBonificaciones")[0].childNodes[0].nodeValue;
  document.getElementById("bonificacionesAcuerdoBonificacion"+id).innerHTML="Bonificaciones<br>";
  for(i=0;i<numero;i++)
  {
  var nombreBonificacion=xmlDoc.getElementsByTagName("NombreBonificacion")[i].childNodes[0].nodeValue;
  document.getElementById("bonificacionesAcuerdoBonificacion"+id).innerHTML += "<br>" + nombreBonificacion;
  }

  document.getElementById("divAcuerdoBonificacion"+id).style.display="block";
  document.getElementById("buttonVerAcuerdoBonificacion"+id).innerHTML="Ocultar";
  }
else
  {
  alert("Error al cargar datos del acuerdo bonificaciones");
  }

}






///////////////////////////////////////////////////////////////
//////////////Modificar Acuerdo Precios Productos



function modificarAcuerdoBonificaciones(id)
{
  idacuerdo = id;
actualizarDivAgregarBonificaciones();


}

var idacuerdo;


function actualizarDivAgregarBonificaciones()
{
var requerimiento = new RequerimientoGet();
requerimiento.setURL("veracuerdos/ajax/datosBonificaciones.php");
requerimiento.addListener(respuestaDatosBonificaciones);
requerimiento.ejecutar();
}


function respuestaDatosBonificaciones(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {

  var numero = xmlDoc.getElementsByTagName("NumeroBonificaciones")[0].childNodes[0].nodeValue;

  for(i=0;i<numero;i++)
  {
  idBonificacion = xmlDoc.getElementsByTagName("IdBonificacion")[i].childNodes[0].nodeValue;
  document.getElementById("divAgregarBonificacion"+idBonificacion).style.display = "block";


  }

  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("veracuerdos/ajax/datosAcuerdoBonificaciones.php");
  requerimiento.addParametro("id",idacuerdo);
  requerimiento.addListener(respuestaDatosBonificacionesModificar);
  requerimiento.ejecutar();

  }
else
  {
  alert("Error al cargar datos del acuerdo bonificaciones");
  }

}


function respuestaDatosBonificacionesModificar(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {


  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;

  document.getElementById("idAcuerdoBonificaciones").value = id;
  document.getElementById("nombreAcuerdoBonificaciones").innerHTML = "Nombre: " + nombre;
  document.getElementById("divBonificacionesAcuerdo").innerHTML = "";




  var numero = xmlDoc.getElementsByTagName("NumeroBonificaciones")[0].childNodes[0].nodeValue;

  for(i=0;i<numero;i++)
  {

  var idBonificacion=xmlDoc.getElementsByTagName("IdBonificacion")[i].childNodes[0].nodeValue;
  var nombreBonificacion=xmlDoc.getElementsByTagName("NombreBonificacion")[i].childNodes[0].nodeValue;

  mostrarBonificacion(idBonificacion,nombreBonificacion);
  quitarBonificacion(idBonificacion);

  }

  seleccionarTabBonificaciones(2);

  }
else
  {
  alert("Error al cargar datos del acuerdo bonificaciones");
  }

}


function mostrarBonificacion(idBonificacion,nombreBonificacion)
{


var labelNombre="<label class=\"etiquetaBlanca\">"+nombreBonificacion+"</label>";

var button = "<button class=\"btn btn-primary\" onclick=\"quitarBonificacionAcuerdo("+idBonificacion+")\" style=\"height:50px;font-size:18px;width:60%;\">Quitar</button>";
var divAlerta = "<div id=\"alertaBonificacion"+idBonificacion+"\"></div>";
var div = "<div id=\"divBonificacionAcuerdo"+idBonificacion+"\" class=\"row text-center\">"+labelNombre+"<br>"+"<br>"+button+"<br>"+"<br>"+"<br>"+"</div>"+"<br>"+"<br>";

document.getElementById("divBonificacionesAcuerdo").innerHTML += div + divAlerta;


}


function quitarBonificacion(idBonificacion)
{
document.getElementById("divAgregarBonificacion"+idBonificacion).style.display = "none";
}
