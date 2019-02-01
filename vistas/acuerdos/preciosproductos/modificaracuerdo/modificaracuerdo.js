

///////////////////////////////////////////////////////////////
//////////////Nuevo Nombre


function nombreNuevoAcuerdoPreciosProductos(idProducto)
{
var idAcuerdo = document.getElementById("idAcuerdoPreciosProductos").value;
var nombreNuevo = document.getElementById("nombreNuevoAcuerdoPreciosProductos").value;


var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificaracuerdo/ajax/nombreNuevo.php");
requerimiento.addParametro("id",idAcuerdo);
requerimiento.addParametro("idProducto",idProducto);
requerimiento.addParametro("nombre",nombreNuevo);
requerimiento.addListener(respuestaNombreNuevoAcuerdoPreciosProductos);
requerimiento.ejecutar();

}


function respuestaNombreNuevoAcuerdoPreciosProductos(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);


var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var nombreNuevo = document.getElementById("nombreNuevoAcuerdoPreciosProductos").value;
  document.getElementById("nombreAcuerdoPreciosProductos").innerHTML = "Nombre: " + nombreNuevo;
  document.getElementById("nombreNuevoAcuerdoPreciosProductos").value = "";

  }
else
  {
  alert("Error al modificar el Nombre");
  }
}





///////////////////////////////////////////////////////////////
//////////////Nuevo Precio


function modificarPrecioProducto(idProducto)
{
var idAcuerdo = document.getElementById("idAcuerdoPreciosProductos").value;
var precioProductoNuevo = document.getElementById("precioProducto" + idProducto +"Nuevo").value;


var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificaracuerdo/ajax/precioProductoNuevo.php");
requerimiento.addParametro("id",idAcuerdo);
requerimiento.addParametro("idProducto",idProducto);
requerimiento.addParametro("precio",precioProductoNuevo);
requerimiento.addListener(respuestaPrecioProductoNuevo);
requerimiento.ejecutar();

}


function respuestaPrecioProductoNuevo(respuesta)
{
  alert(respuesta.target.responseText);

xmlDoc = crearXML(respuesta.target.responseText);


var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
    alert("jajaja");
    /*
  var nombreProductoNuevo = document.getElementById("nombreProductoNuevo").value;
  document.getElementById("nombreProducto").innerHTML = "Nombre: " + nombreProductoNuevo;
  document.getElementById("alertaNombreProductoNuevo").style.display = "block";
*/
  }
else
  {
  alert("Error al modificar el Nombre");
  }
}


///////////////////////////////////////////////////////////////
//////////////Nuevo Precio


function modificarPrecioProducto(idProducto)
{
var idAcuerdo = document.getElementById("idAcuerdoPreciosProductos").value;
var precioProductoNuevo = document.getElementById("precioProducto" + idProducto +"Nuevo").value;


var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificaracuerdo/ajax/precioProductoNuevo.php");
requerimiento.addParametro("id",idAcuerdo);
requerimiento.addParametro("idProducto",idProducto);
requerimiento.addParametro("precio",precioProductoNuevo);
requerimiento.addListener(respuestaPrecioProductoNuevo);
requerimiento.ejecutar();

}


function respuestaPrecioProductoNuevo(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);


var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
    alert("jajaja");
    /*
  var nombreProductoNuevo = document.getElementById("nombreProductoNuevo").value;
  document.getElementById("nombreProducto").innerHTML = "Nombre: " + nombreProductoNuevo;
  document.getElementById("alertaNombreProductoNuevo").style.display = "block";
*/
  }
else
  {
  alert("Error al modificar el Nombre");
  }
}
