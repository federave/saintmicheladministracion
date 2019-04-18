

///////////////////////////////////////////////////////////////
//////////////Ver Alquiler


function verAlquiler(id)
{
if(document.getElementById("divAlquiler"+id).style.display=="block")
  {
  document.getElementById("divAlquiler"+id).style.display="none";
  document.getElementById("buttonVerAlquiler"+id).innerHTML="Ver";
  }
else
  {
  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("veralquileres/ajax/datosAlquiler.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosAlquiler);
  requerimiento.ejecutar();
  }

}


function respuestaVerDatosAlquiler(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {


  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;
  var precio = xmlDoc.getElementsByTagName("PrecioActual")[0].childNodes[0].nodeValue;
  var fechainicioprecioactual = xmlDoc.getElementsByTagName("FechaInicioPrecioActual")[0].childNodes[0].nodeValue;

  document.getElementById("nombreAlquiler"+id).innerHTML="Nombre: "+nombre;
  document.getElementById("precioAlquiler"+id).innerHTML="Precio Actual: "+precio;



  var numeroProductos = xmlDoc.getElementsByTagName("NumeroProductos")[0].childNodes[0].nodeValue;
  var divProductos = document.getElementById("divProductosAlquiler"+id);
  var labelTitulo="<label class=\"etiqueta\" >Productos</label>";
  var br="<br>";
  divProductos.innerHTML=br+labelTitulo+br+br;
  for(i=0;i<numeroProductos;i++)
  {
  var nombre=xmlDoc.getElementsByTagName("NombreProducto")[i].childNodes[0].nodeValue;
  var cantidad=xmlDoc.getElementsByTagName("CantidadProducto")[i].childNodes[0].nodeValue;
  var labelNombre="<label class=\"etiqueta\" >"+ "Producto: " + nombre  +  "</label>";
  var labelCantidad="<label class=\"etiqueta\" >"+ "Cantidad: " + cantidad  +  "</label>";
  var div = "<div class=\"row text-center\" >" + labelNombre + "<br>" + labelCantidad + "<br>" +  "</div>";
  divProductos.innerHTML += div ;
  }

  var numeroMaquinas = xmlDoc.getElementsByTagName("NumeroMaquinas")[0].childNodes[0].nodeValue;
  var divMaquinas = document.getElementById("divMaquinasAlquiler"+id);
  var labelTitulo="<label class=\"etiqueta\" >Maquinas</label>";
  divMaquinas.innerHTML=br+labelTitulo+br+br;

  for(i=0;i<numeroMaquinas;i++)
  {
  var nombre=xmlDoc.getElementsByTagName("NombreMaquina")[i].childNodes[0].nodeValue;
  var cantidad=xmlDoc.getElementsByTagName("CantidadMaquina")[i].childNodes[0].nodeValue;
  var labelNombre="<label class=\"etiqueta\" >"+ "Maquina: " + nombre  +  "</label>";
  var labelCantidad="<label class=\"etiqueta\" >"+ "Cantidad: " + cantidad  +  "</label>";
  var div = "<div class=\"row text-center\" >" + labelNombre + "<br>" + labelCantidad+ "<br>" +  "</div>";
  divMaquinas.innerHTML += div ;
  }









  var numero = xmlDoc.getElementsByTagName("NumeroPreciosHistoricos")[0].childNodes[0].nodeValue;
  var divPreciosHistoricos = document.getElementById("divPreciosHistoricosAlquiler"+id);
  var labelTitulo="<label class=\"etiqueta\" >Precios Históricos</label>";
  divPreciosHistoricos.innerHTML=br+labelTitulo+br+br;

  for(i=0;i<numero;i++)
  {
  var fechaInicio=xmlDoc.getElementsByTagName("FechaInicio")[i].childNodes[0].nodeValue;
  var fechaFin=xmlDoc.getElementsByTagName("FechaFin")[i].childNodes[0].nodeValue;
  var precio=xmlDoc.getElementsByTagName("Precio")[i].childNodes[0].nodeValue;
  var labelFechaInicio="<label class=\"etiqueta\" >"+ "Fecha Inicio: " + fechaInicio  +  "</label>";
  var labelFechaFin="<label class=\"etiqueta\" >"+ "Fecha Fin: " + fechaFin  +  "</label>";
  var labelPrecio="<label class=\"etiqueta\" >"+ "Precio: " + precio +   "</label>";

  var div = "<div style=\"border: 1px solid #000000;border-radius: 4px;width:80%;margin:auto\" class=\"text-center\" >" + labelFechaInicio + "<br>" + labelPrecio + "<br>" + labelFechaFin  +  "</div>";

  divPreciosHistoricos.innerHTML += div + "<br><br>";
  }

  document.getElementById("divAlquiler"+id).style.display="block";
  document.getElementById("buttonVerAlquiler"+id).innerHTML="Ocultar";
  }
else
  {
  alert("Error al cargar datos del alquiler");
  }

}

///////////////////////////////////////////////////////////////


function mostrarModificarProducto(idProducto,nombreProducto,precioProducto)
{


var labelNombre="<label class=\"etiquetaBlanca\">"+"Nombre: "+nombreProducto+"</label>";
var labelPrecio="<label class=\"etiquetaBlanca\">"+"Precio: "+precioProducto+" $"+"</label>";

var input="<input id=\"precioProducto" + idProducto +"Nuevo\" class=\"text-center\" style=\"color:black;width:60%;\" type=\"number\" min=\"0\" value=\"\" step=\"0.1\" placeholder=\"Precio Nuevo\" >"
var button = "<button class=\"btn btn-primary\" onclick=\"modificarPrecioProducto("+idProducto+")\" style=\"height:50px;font-size:18px;width:60%;\">Modificar</button>";

var div = "<div class=\"row text-center\">"+labelNombre+"<br>"+labelPrecio+"<br>"+input+"<br>"+"<br>"+button+"<br>"+"</div>"+"<br>"+"<br>";

document.getElementById("divProductosAcuerdoPreciosProductos").innerHTML += div;


}


function quitarModificarProducto(idProducto)
{
document.getElementById("divAgregarProducto"+idProducto).style.display = "none";
}


///////////////////////////////////////////////////////////////
//////////////Modificar Alquiler



function modificarAlquiler(id)
{
var requerimiento = new RequerimientoGet();
requerimiento.setURL("veralquileres/ajax/datosAlquiler.php");
requerimiento.addParametro("id",id);
requerimiento.addListener(respuestaDatosAlquiler);
requerimiento.ejecutar();
}


function respuestaDatosAlquiler(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;
  var precio = xmlDoc.getElementsByTagName("PrecioActual")[0].childNodes[0].nodeValue;
  document.getElementById("idAlquiler").value = id;
  document.getElementById("nombreAlquiler").innerHTML = "Nombre: " + nombre;
  document.getElementById("precioAlquiler").innerHTML = "Precio: " + precio;
  document.getElementById("contenedormodificaralquiler").style.display = "block";
  seleccionarTab(2,"Alquileres");
  }
else
  {
  alert("Error al cargar datos del alquiler");
  }
}
