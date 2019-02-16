

///////////////////////////////////////////////////////////////
//////////////Ver Promocion


function verTipoRechazo(id)
{
if(document.getElementById("divTipoRechazo"+id).style.display=="block")
  {
  document.getElementById("divTipoRechazo"+id).style.display="none";
  document.getElementById("buttonVerTipoRechazo"+id).innerHTML="Ver";
  }
else
  {
  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("vertiposrechazos/ajax/datosTipoRechazo.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosTipoRechazo);
  requerimiento.ejecutar();
  }

}


function respuestaVerDatosTipoRechazo(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;

  var br="<br>";
  var divTipoRechazo = document.getElementById("divTipoRechazo"+id);

  var labelNombre = "<label class=\"labelLista\" >" +nombre + "</label>";

  divTipoRechazo.innerHTML += labelNombre +br;

  divTipoRechazo.style.display="block";
  document.getElementById("buttonVerTipoRechazo"+id).innerHTML="Ocultar";
  }
else
  {
  alert("Error al cargar datos del tipo rechazo");
  }

}


///////////////////////////////////////////////////////////////
//////////////Dar de Baja Promocion


function darDeBajaPromocion(id)
{
var requerimiento = new RequerimientoGet();
requerimiento.setURL("verpromociones/ajax/darDeBajaPromocion.php");
requerimiento.addParametro("id",id);
requerimiento.addListener(respuestaDarDeBajaPromocion);
requerimiento.ejecutar();
}

function respuestaDarDeBajaPromocion(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

  }
else
  {
  alert("Error al cargar datos de la promoción");
  }

}
