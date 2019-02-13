

///////////////////////////////////////////////////////////////
//////////////Ver Promocion


function verPromocion(id)
{
if(document.getElementById("divPromocion"+id).style.display=="block")
  {
  document.getElementById("divPromocion"+id).style.display="none";
  document.getElementById("buttonVerPromocion"+id).innerHTML="Ver";
  }
else
  {
  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("verpromociones/ajax/datosPromocion.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosPromocion);
  requerimiento.ejecutar();
  }

}


function respuestaVerDatosPromocion(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;

  var divPromocion = document.getElementById("divPromocion"+id);
  /*
  var labelNombre =

  document.getElementById("nombreAcuerdoPreciosProductos"+id).innerHTML=nombre;

  var numero = xmlDoc.getElementsByTagName("NumeroProductos")[0].childNodes[0].nodeValue;
  for(i=0;i<numero;i++)
  {
  var nombreProducto=xmlDoc.getElementsByTagName("NombreProducto")[i].childNodes[0].nodeValue;
  var precioProducto=xmlDoc.getElementsByTagName("PrecioProducto")[i].childNodes[0].nodeValue;
  divDescripcion.innerHTML += "<label class=\"etiqueta\" >" + "Producto: " + nombreProducto +  "</label><br>" +"<label class=\"etiqueta\" >" + " Precio: " + precioProducto +" $"+  "</label><br><br>";
  }
  */

  divPromocion.style.display="block";
  document.getElementById("buttonVerPromocion"+id).innerHTML="Ocultar";
  }
else
  {
  alert("Error al cargar datos de la promoción");
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
