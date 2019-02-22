

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
  requerimiento.setURL("veracuerdos/ajax/datosAcuerdoBonificacion.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosAcuerdoBonificacion);
  requerimiento.ejecutar();


  }

}


function respuestaVerDatosAcuerdoBonificacion(respuesta)
{



xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;


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
