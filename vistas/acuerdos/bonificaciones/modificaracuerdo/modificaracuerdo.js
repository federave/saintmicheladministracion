

///////////////////////////////////////////////////////////////
//////////////Nuevo Nombre


function nombreNuevoAcuerdoPreciosProductos(idProducto)
{
var idAcuerdo = document.getElementById("idAcuerdoPreciosProductos").value;
var nombreNuevo = document.getElementById("nombreNuevoAcuerdoPreciosProductos").value;

var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificaracuerdo/ajax/nombreNuevo.php");
requerimiento.addParametro("id",idAcuerdo);
requerimiento.addParametro("nombre",nombreNuevo);
requerimiento.addListener(respuestaNombreNuevoAcuerdoPreciosProductos);
requerimiento.ejecutar();

}


function respuestaNombreNuevoAcuerdoPreciosProductos(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
var idAcuerdo = document.getElementById("idAcuerdoPreciosProductos").value;

if(estado)
  {
  var nombreNuevo = document.getElementById("nombreNuevoAcuerdoPreciosProductos").value;
  document.getElementById("nombreAcuerdoPreciosProductos").innerHTML = "Nombre: " + nombreNuevo;
  document.getElementById("nombreAcuerdoPreciosProductos"+idAcuerdo).innerHTML = nombreNuevo;
  document.getElementById("nombreNuevoAcuerdoPreciosProductos").value = "";
  document.getElementById("alertaNombreAcuerdoPreciosProductosNuevo").innerHTML = crearAlerta("Nombre Acuerdo Modificado!","success");

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
idProductoModificado = idProducto;

var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificaracuerdo/ajax/precioProductoNuevo.php");
requerimiento.addParametro("id",idAcuerdo);
requerimiento.addParametro("idProducto",idProducto);
requerimiento.addParametro("precio",precioProductoNuevo);
requerimiento.addListener(respuestaPrecioProductoNuevo);
requerimiento.ejecutar();

}

var idProductoModificado;

function respuestaPrecioProductoNuevo(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);


var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {

  var precioProductoNuevo = document.getElementById("precioProducto"+idProductoModificado+"Nuevo").value;
  document.getElementById("precioProducto"+idProductoModificado).innerHTML = "Precio: " + precioProductoNuevo;
  document.getElementById("precioProducto"+idProductoModificado+"Nuevo").value="";
  document.getElementById("alertaPrecioProducto"+idProductoModificado+"Nuevo").innerHTML = crearAlerta("Precio Producto Modificado!","success");
  }
else
  {
  alert("Error al modificar el Nombre");
  }
}





///////////////////////////////////////////////////////////////
//////////////Agregar Producto

function agregarProducto(idProducto)
{
var idAcuerdo = document.getElementById("idAcuerdoPreciosProductos").value;
var precioProducto = document.getElementById("precioProducto" + idProducto +"Agregar").value;
idProductoAgregado = idProducto;
precioProductoAgregado = precioProducto;
nombreProductoAgregado = document.getElementById("nombreProducto" + idProducto +"Agregar").value;

var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificaracuerdo/ajax/agregarProducto.php");
requerimiento.addParametro("idAcuerdo",idAcuerdo);
requerimiento.addParametro("idProducto",idProducto);
requerimiento.addParametro("precio",precioProducto);
requerimiento.addListener(respuestaAgregarProducto);
requerimiento.ejecutar();

}

var idProductoAgregado;
var precioProductoAgregado;
var nombreProductoAgregado;



function respuestaAgregarProducto(respuesta)
{

alert(respuesta.target.responseText);

xmlDoc = crearXML(respuesta.target.responseText);


var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  document.getElementById("divAgregarProducto"+idProductoAgregado).style.display="none";
  document.getElementById("alertaProductoAgregado").innerHTML = crearAlerta("Producto Agregado!","success");
  mostrarModificarProducto(idProductoAgregado,nombreProductoAgregado,precioProductoAgregado);

  }
else
  {
  alert("Error al modificar el Nombre");
  }
}
