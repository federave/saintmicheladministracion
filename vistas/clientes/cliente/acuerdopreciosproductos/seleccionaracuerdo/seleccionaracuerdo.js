

///////////////////////////////////////////////////////////////
//////////////Ver Acuerdo Precios Productos


function verAcuerdoPreciosProductos(id)
{
if(document.getElementById("divDatosAcuerdoPreciosProductos"+id).style.display=="block")
  {
  document.getElementById("divDatosAcuerdoPreciosProductos"+id).style.display="none";
  document.getElementById("buttonVerDatosAcuerdoPreciosProductos"+id).innerHTML="Ver";
  }
else
  {
  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("acuerdopreciosproductos/seleccionaracuerdo/ajax/datosAcuerdoPreciosProductos.php");
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

  var divDescripcion = document.getElementById("divDatosAcuerdoPreciosProductos"+id);
  var labelNombre = "<label class=\"labelDatosAcuerdoLista\" >" + nombre + "</label>";
  divDescripcion.innerHTML +=labelNombre+br;
  var br = "<br>";


  var numero = xmlDoc.getElementsByTagName("NumeroProductos")[0].childNodes[0].nodeValue;
  for(i=0;i<numero;i++)
  {
  var nombreProducto=xmlDoc.getElementsByTagName("NombreProducto")[i].childNodes[0].nodeValue;
  var precioProducto=xmlDoc.getElementsByTagName("PrecioProducto")[i].childNodes[0].nodeValue;

  var labelNombreProducto = "<label class=\"labelDatosAcuerdoLista\" >" + "Producto: " + nombreProducto + "</label>";
  var labelPrecioProducto = "<label class=\"labelDatosAcuerdoLista\" >" + " Precio: " + precioProducto + "</label>";

  divDescripcion.innerHTML += br + labelNombreProducto + br + labelPrecioProducto;
  }




  document.getElementById("divDatosAcuerdoPreciosProductos"+id).style.display="block";
  document.getElementById("buttonVerDatosAcuerdoPreciosProductos"+id).innerHTML="Ocultar";
  }
else
  {
  alert("Error al cargar datos del acuerdo bonificaciones");
  }

}






///////////////////////////////////////////////////////////////
//////////////Ver Acuerdo Especial Precios Productos


function verAcuerdoEspecialPreciosProductos(id)
{
if(document.getElementById("divDatosAcuerdoEspecialPreciosProductos"+id).style.display=="block")
  {
  document.getElementById("divDatosAcuerdoEspecialPreciosProductos"+id).style.display="none";
  document.getElementById("buttonVerDatosAcuerdoEspecialPreciosProductos"+id).innerHTML="Ver";
  }
else
  {
  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("acuerdopreciosproductos/seleccionaracuerdo/ajax/datosAcuerdoPreciosProductos.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosAcuerdoEspecialPreciosProductos);
  requerimiento.ejecutar();
  }

}




function respuestaVerDatosAcuerdoEspecialPreciosProductos(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;

  var divDescripcion = document.getElementById("divDatosAcuerdoEspecialPreciosProductos"+id);
  var labelNombre = "<label class=\"labelDatosAcuerdoLista\" >" + nombre + "</label>";
  divDescripcion.innerHTML +=labelNombre+br;
  var br = "<br>";


  var numero = xmlDoc.getElementsByTagName("NumeroProductos")[0].childNodes[0].nodeValue;
  for(i=0;i<numero;i++)
  {
  var nombreProducto=xmlDoc.getElementsByTagName("NombreProducto")[i].childNodes[0].nodeValue;
  var precioProducto=xmlDoc.getElementsByTagName("PrecioProducto")[i].childNodes[0].nodeValue;

  var labelNombreProducto = "<label class=\"labelDatosAcuerdoLista\" >" + "Producto: " + nombreProducto + "</label>";
  var labelPrecioProducto = "<label class=\"labelDatosAcuerdoLista\" >" + " Precio: " + precioProducto + "</label>";

  divDescripcion.innerHTML += br + labelNombreProducto + br + labelPrecioProducto;
  }




  document.getElementById("divDatosAcuerdoEspecialPreciosProductos"+id).style.display="block";
  document.getElementById("buttonVerDatosAcuerdoEspecialPreciosProductos"+id).innerHTML="Ocultar";
  }
else
  {
  alert("Error al cargar datos del acuerdo bonificaciones");
  }

}








///////////////////////////////////////////////////////////////
//////////////Seleccionar Acuerdo Precios Productos



function seleccionarAcuerdoPreciosProductos(idAcuerdo)
{
var idCliente = document.getElementById("idCliente").value;

var requerimiento = new RequerimientoGet();
requerimiento.setURL("acuerdopreciosproductos/seleccionaracuerdo/ajax/seleccionarAcuerdoPreciosProductos.php");
requerimiento.addParametro("idCliente",idCliente);
requerimiento.addParametro("idAcuerdo",idAcuerdo);

requerimiento.addListener(respuestaSeleccionarAcuerdoPreciosProductos);
requerimiento.ejecutar();

}


function respuestaSeleccionarAcuerdoPreciosProductos(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {
  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;

  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("acuerdopreciosproductos/seleccionaracuerdo/ajax/datosAcuerdoPreciosProductos.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosAcuerdoActual);
  requerimiento.ejecutar();



  }
else
  {
  alert("Error al cargar datos del producto");
  }

}






function respuestaVerDatosAcuerdoActual(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;

  document.getElementById("nombreAcuerdoActualPreciosProductos").innerHTML = nombre;
  var divDescripcion = document.getElementById("divDatosAcuerdoActual");
  var br = "<br>";

 divDescripcion.innerHTML="";

  var numero = xmlDoc.getElementsByTagName("NumeroProductos")[0].childNodes[0].nodeValue;
  for(i=0;i<numero;i++)
  {
  var nombreProducto=xmlDoc.getElementsByTagName("NombreProducto")[i].childNodes[0].nodeValue;
  var precioProducto=xmlDoc.getElementsByTagName("PrecioProducto")[i].childNodes[0].nodeValue;

  var labelProducto = "<label class=\"labelAcuerdoActual\" >" + nombreProducto + ": " + precioProducto + " $"+"</label>";

  divDescripcion.innerHTML += labelProducto + br;
  }


  }
else
  {
  alert("Error al cargar datos del acuerdo bonificaciones");
  }

}
