

///////////////////////////////////////////////////////////////
//////////////Ver Alquiler


function verCondicion(id)
{
if(document.getElementById("divCondicion"+id).style.display=="block")
  {
  document.getElementById("divCondicion"+id).style.display="none";
  document.getElementById("buttonVerCondicion"+id).innerHTML="Ver";
  }
else
  {
  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("vercondiciones/ajax/datosCondicion.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosCondicion);
  requerimiento.ejecutar();
  }

}


function respuestaVerDatosCondicion(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {


  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;
  var minimototal = xmlDoc.getElementsByTagName("MinimoTotal")[0].childNodes[0].nodeValue;

  var divCondicion = document.getElementById("divCondicion"+id);

  var labelNombre="<label class=\"etiqueta\" >"+ nombre  +  "</label>";
  var labelMinimoTotal="<label class=\"etiqueta\" >"+"Minimo Total: "+ minimototal  +  "</label>";
  var br="<br>";
  divCondicion.innerHTML="";
  divCondicion.innerHTML += labelNombre + br +  labelMinimoTotal +br;

  var numeroProductos = xmlDoc.getElementsByTagName("NumeroProductos")[0].childNodes[0].nodeValue;
  var labelProductos="<label class=\"etiqueta\" >"+"Productos"+"</label>";
  divCondicion.innerHTML += labelProductos + br;

  for(i=0;i<numeroProductos;i++)
  {
  var nombreProducto=xmlDoc.getElementsByTagName("NombreProducto")[i].childNodes[0].nodeValue;
  var cantidadMinima=xmlDoc.getElementsByTagName("Minimo")[i].childNodes[0].nodeValue;
  var labelNombreProducto="<label class=\"etiqueta\" >"+ "Producto: " + nombreProducto  +  "</label>";
  var labelCantidadMinima="<label class=\"etiqueta\" >"+ "Cantidad Minima: " + cantidadMinima  +  "</label>";
  divCondicion.innerHTML += labelNombreProducto +br+ labelCantidadMinima+br+br;
  }


  document.getElementById("divCondicion"+id).style.display="block";
  document.getElementById("buttonVerCondicion"+id).innerHTML="Ocultar";
  }
else
  {
  alert("Error al cargar datos de la condicion");
  }

}
