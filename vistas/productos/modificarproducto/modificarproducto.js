







///////////////////////////////////////////////////////////////
//////////////Nuevo nombre


function nombreProductoNuevo()
{
var id = document.getElementById("idProducto").value;
var nombreNuevo = document.getElementById("nombreProductoNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificarproducto/ajax/nombreNuevo.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("nombre",nombreNuevo);
requerimiento.addListener(respuestaNombreNuevo);
requerimiento.ejecutar();
}


function respuestaNombreNuevo(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);

var id = document.getElementById("idProducto").value;
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var nombreProductoNuevo = document.getElementById("nombreProductoNuevo").value;
  document.getElementById("nombreProducto").innerHTML = "Nombre: " + nombreProductoNuevo;
  document.getElementById("productoNombre"+id).innerHTML = "Nombre: " + nombreProductoNuevo;
  document.getElementById("alertaNombreProductoNuevo").innerHTML = crearAlerta("Nombre Producto Modificado!","success");


  }
else
  {
  alert("Error al modificar el Nombre");
  }
}




///////////////////////////////////////////////////////////////
//////////////Nuevo Litros


function litrosProductoNuevo()
{
var id = document.getElementById("idProducto").value;
var litrosNuevo = document.getElementById("litrosProductoNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificarproducto/ajax/litrosNuevo.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("litros",litrosNuevo);
requerimiento.addListener(respuestaLitrosNuevo);
requerimiento.ejecutar();
}


function respuestaLitrosNuevo(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);

var id = document.getElementById("idProducto").value;
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var litrosProductoNuevo = document.getElementById("litrosProductoNuevo").value;
  document.getElementById("litrosProducto").innerHTML = "Litros: " + litrosProductoNuevo;
  document.getElementById("alertaLitrosProductoNuevo").innerHTML = crearAlerta("Litros Producto Modificado!","success");
  }
else
  {
  alert("Error al modificar el Nombre");
  }
}



///////////////////////////////////////////////////////////////
//////////////Nuevo Litros


function tipoProductoNuevo()
{
var id = document.getElementById("idProducto").value;
var idTipoProductoNuevo = document.getElementById("tipoProductoNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificarproducto/ajax/tipoProductoNuevo.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("idtipoproducto",idTipoProductoNuevo);
requerimiento.addListener(respuestaTipoProductoNuevo);
requerimiento.ejecutar();
}


function respuestaTipoProductoNuevo(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);

var id = document.getElementById("idProducto").value;
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  document.getElementById("alertaTipoProductoNuevo").innerHTML = crearAlerta("Tipo Producto Modificado!","success");
  }
else
  {
  alert("Error al modificar el tipo producto");
  }
}





///////////////////////////////////////////////////////////////
//////////////Insumo


function actualizarInsumo(idInsumo)
{
insumoSeleccionado = idInsumo;
var id = document.getElementById("idProducto").value;
var estado = phpBoolean(document.getElementById("insumoNuevo"+idInsumo).checked);
var requerimiento = new RequerimientoGet();

requerimiento.setURL("modificarproducto/ajax/insumoNuevo.php");
requerimiento.addParametro("id",id);
requerimiento.addParametro("idinsumo",idInsumo);
requerimiento.addParametro("estado",estado);

requerimiento.addListener(respuestaInsumoNuevo);
requerimiento.ejecutar();
}

var insumoSeleccionado;

function respuestaInsumoNuevo(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var id = document.getElementById("idProducto").value;
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  document.getElementById("alertaInsumo"+insumoSeleccionado).innerHTML = crearAlerta("Insumo Actualizado!","success");
  }
else
  {
  alert("Error al actualizar el insumo");
  }
}
