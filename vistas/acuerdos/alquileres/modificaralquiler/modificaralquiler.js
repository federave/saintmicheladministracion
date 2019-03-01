

///////////////////////////////////////////////////////////////
//////////////Nuevo Nombre


function nombreNuevoAlquiler(nombre)
{
var idAlquiler = document.getElementById("idAlquiler").value;
var nombreNuevo = document.getElementById("nombreNuevoAlquiler").value;


var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificaralquiler/ajax/nombreNuevo.php");
requerimiento.addParametro("id",idAlquiler);
requerimiento.addParametro("nombre",nombreNuevo);
requerimiento.addListener(respuestaNombreNuevoAlquiler);
requerimiento.ejecutar();

}


function respuestaNombreNuevoAlquiler(respuesta)
{
  alert(respuesta.target.responseText);

xmlDoc = crearXML(respuesta.target.responseText);


var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var nombreNuevo = document.getElementById("nombreNuevoAlquiler").value;
  document.getElementById("nombreAlquiler").innerHTML = "Nombre: " + nombreNuevo;
  document.getElementById("nombreNuevoAlquiler").value = "";
  document.getElementById("alertaNombreNuevoAlquiler").innerHTML = crearAlerta("Nombre Alquiler Modificado!","success");



  }
else
  {
  alert("Error al modificar el Nombre");
  }
}




///////////////////////////////////////////////////////////////
//////////////Nuevo Precio


function precioNuevoAlquiler(nombre)
{
var idAlquiler = document.getElementById("idAlquiler").value;
var precioNuevo = document.getElementById("precioNuevoAlquiler").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificaralquiler/ajax/precioNuevo.php");
requerimiento.addParametro("id",idAlquiler);
requerimiento.addParametro("precio",precioNuevo);
requerimiento.addListener(respuestaPrecioNuevoAlquiler);
requerimiento.ejecutar();
}


function respuestaPrecioNuevoAlquiler(respuesta)
{
alert(respuesta.target.responseText);
xmlDoc = crearXML(respuesta.target.responseText);


var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var precioNuevo = document.getElementById("precioNuevoAlquiler").value;
  document.getElementById("precioAlquiler").innerHTML = "Precio: " + precioNuevo;
  document.getElementById("precioNuevoAlquiler").value = "";
  document.getElementById("alertaPrecioNuevoAlquiler").innerHTML = crearAlerta("Precio Alquiler Modificado!","success");

  }
else
  {
  alert("Error al modificar el Precio");
  }



}
