

///////////////////////////////////////////////////////////////
//////////////Ver Alquiler


function verComodato(id)
{
if(document.getElementById("divComodato"+id).style.display=="block")
  {
  document.getElementById("divComodato"+id).style.display="none";
  document.getElementById("buttonVerComodato"+id).innerHTML="Ver";
  }
else
  {
  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("vercomodatos/ajax/datosComodato.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosComodato);
  requerimiento.ejecutar();
  }

}


function respuestaVerDatosComodato(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {


  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;

  document.getElementById("nombreComodato"+id).innerHTML="Nombre: "+nombre;

  var numeroProductos = xmlDoc.getElementsByTagName("NumeroProductos")[0].childNodes[0].nodeValue;
  var divProductos = document.getElementById("divProductosComodato"+id);

  for(i=0;i<numeroProductos;i++)
  {
  var nombre=xmlDoc.getElementsByTagName("NombreProducto")[i].childNodes[0].nodeValue;
  var cantidadMinima=xmlDoc.getElementsByTagName("CantidadMinimaProducto")[i].childNodes[0].nodeValue;
  var labelNombre="<label class=\"etiqueta\" >"+ "Producto: " + nombre  +  "</label>";
  var labelCantidadMinima="<label class=\"etiqueta\" >"+ "Cantidad Minima: " + cantidadMinima  +  "</label>";
  var div = "<div class=\"row text-center\" >" + labelNombre + "<br>" + labelCantidadMinima + "<br>" +  "</div>";
  divProductos.innerHTML += div ;
  }

  var numeroMaquinas = xmlDoc.getElementsByTagName("NumeroMaquinas")[0].childNodes[0].nodeValue;
  var divMaquinas = document.getElementById("divMaquinasComodato"+id);

  for(i=0;i<numeroMaquinas;i++)
  {
  var nombre=xmlDoc.getElementsByTagName("NombreMaquina")[i].childNodes[0].nodeValue;
  var cantidad=xmlDoc.getElementsByTagName("CantidadMaquina")[i].childNodes[0].nodeValue;
  var labelNombre="<label class=\"etiqueta\" >"+ "Maquina: " + nombre  +  "</label>";
  var labelCantidad="<label class=\"etiqueta\" >"+ "Cantidad: " + cantidad  +  "</label>";
  var div = "<div class=\"row text-center\" >" + labelNombre + "<br>" + labelCantidad+ "<br>" +  "</div>";
  divMaquinas.innerHTML += div ;
  }



  document.getElementById("divComodato"+id).style.display="block";
  document.getElementById("buttonVerComodato"+id).innerHTML="Ocultar";
  }
else
  {
  alert("Error al cargar datos del comodato");
  }

}


///////////////////////////////////////////////////////////////
//////////////Modificar Alquiler



function modificarComodato(id)
{
var requerimiento = new RequerimientoGet();
requerimiento.setURL("vercomodatos/ajax/datosComodato.php");
requerimiento.addParametro("id",id);
requerimiento.addListener(respuestaDatosComodato);
requerimiento.ejecutar();
}


function respuestaDatosComodato(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;
  document.getElementById("idComodato").value = id;
  document.getElementById("nombreComodato").innerHTML = "Nombre: " + nombre;
  seleccionarTabComodatos(2);
  }
else
  {
  alert("Error al cargar datos del comodato");
  }
}
