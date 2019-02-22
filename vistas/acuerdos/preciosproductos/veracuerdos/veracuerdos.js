

///////////////////////////////////////////////////////////////
//////////////Ver Acuerdo Precios Productos


function verAcuerdoPreciosProductos(id)
{
if(document.getElementById("divAcuerdoPreciosProductos"+id).style.display=="block")
  {
  document.getElementById("divAcuerdoPreciosProductos"+id).style.display="none";
  document.getElementById("buttonVerAcuerdoPreciosProductos"+id).innerHTML="Ver";
  }
else
  {
  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("veracuerdos/ajax/datosAcuerdoPreciosProductosActual.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosAcuerdoPreciosProductos);
  requerimiento.ejecutar();
  }

}


function respuestaVerDatosAcuerdoPreciosProductos(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;
  var fechacreacion = xmlDoc.getElementsByTagName("FechaCreacion")[0].childNodes[0].nodeValue;

  document.getElementById("nombreAcuerdoPreciosProductosDatos"+id).innerHTML=nombre;
  document.getElementById("fechaCreacionAcuerdoPreciosProductos"+id).innerHTML="Fecha de Creción: " + fechacreacion;

  var numero = xmlDoc.getElementsByTagName("NumeroProductos")[0].childNodes[0].nodeValue;
  var divDescripcion = document.getElementById("preciosAcuerdoPreciosProductos"+id);
  var br = "<br>";
  divDescripcion.innerHTML = "<label class=\"etiqueta\" >" + "Datos Actuales" + "</label>" + br;


  for(i=0;i<numero;i++)
  {
  var nombreProducto=xmlDoc.getElementsByTagName("NombreProducto")[i].childNodes[0].nodeValue;
  var precioProducto=xmlDoc.getElementsByTagName("PrecioProducto")[i].childNodes[0].nodeValue;
  var fechaInicioProducto=xmlDoc.getElementsByTagName("FechaInicioProducto")[i].childNodes[0].nodeValue;

  var labelProducto = "<label class=\"etiqueta\" >" + nombreProducto +  "</label>";
  var labelPrecio = "<label class=\"etiqueta\" >" + " Precio: " + precioProducto +" $"+  "</label>";
  var labelFechaInicio = "<label class=\"etiqueta\" >" + " Fecha de Inicio: " + fechaInicioProducto+  "</label>";
  divDescripcion.innerHTML += br + labelProducto+br+labelPrecio+br+labelFechaInicio+br;
  }

  document.getElementById("divAcuerdoPreciosProductos"+id).style.display="block";
  document.getElementById("buttonVerAcuerdoPreciosProductos"+id).innerHTML="Ocultar";
  }
else
  {
  alert("Error al cargar datos del acuerdo bonificaciones");
  }

}


///////////////////////////////////////////////////////////////
//////////////Modificar Acuerdo Precios Productos



function modificarAcuerdoPreciosProductos(id)
{

var requerimiento = new RequerimientoGet();
requerimiento.setURL("veracuerdos/ajax/datosAcuerdoPreciosProductosActual.php");
requerimiento.addParametro("id",id);
requerimiento.addListener(respuestaDatosAcuerdoPreciosProductos);
requerimiento.ejecutar();

}


function respuestaDatosAcuerdoPreciosProductos(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {


  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;

  document.getElementById("idAcuerdoPreciosProductos").value = id;
  document.getElementById("nombreAcuerdoPreciosProductos").innerHTML = "Nombre: " + nombre;
  document.getElementById("divProductosAcuerdoPreciosProductos").innerHTML = "";

  var numero = xmlDoc.getElementsByTagName("NumeroProductos")[0].childNodes[0].nodeValue;

  for(i=0;i<numero;i++)
  {

  var idProducto=xmlDoc.getElementsByTagName("IdProducto")[i].childNodes[0].nodeValue;
  var nombreProducto=xmlDoc.getElementsByTagName("NombreProducto")[i].childNodes[0].nodeValue;
  var precioProducto=xmlDoc.getElementsByTagName("PrecioProducto")[i].childNodes[0].nodeValue;

  mostrarModificarProducto(idProducto,nombreProducto,precioProducto);
  quitarModificarProducto(idProducto);

  }

  seleccionarTabPreciosProductos(2);

  }
else
  {
  alert("Error al cargar datos del producto");
  }

}


function mostrarModificarProducto(idProducto,nombreProducto,precioProducto)
{


var labelNombre="<label class=\"etiquetaBlanca\">"+"Nombre: "+nombreProducto+"</label>";
var labelPrecio="<label id=\"precioProducto"+idProducto+"\" class=\"etiquetaBlanca\">"+"Precio: "+precioProducto+" $"+"</label>";

var input="<input id=\"precioProducto" + idProducto +"Nuevo\" class=\"text-center\" style=\"color:black;width:60%;\" type=\"number\" min=\"0\" value=\"\" step=\"0.1\" placeholder=\"Precio Nuevo\" >"
var button = "<button class=\"btn btn-primary\" onclick=\"modificarPrecioProducto("+idProducto+")\" style=\"height:50px;font-size:18px;width:60%;\">Modificar</button>";
var divAlerta = "<div id=\"alertaPrecioProducto"+idProducto+"Nuevo\"></div>";
var div = "<div class=\"row text-center\">"+labelNombre+"<br>"+labelPrecio+"<br>"+input+"<br>"+"<br>"+button+"<br>"+"<br>"+divAlerta+"</div>"+"<br>"+"<br>";

document.getElementById("divProductosAcuerdoPreciosProductos").innerHTML += div;


}


function quitarModificarProducto(idProducto)
{
document.getElementById("divAgregarProducto"+idProducto).style.display = "none";
}
