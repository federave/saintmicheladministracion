

///////////////////////////////////////////////////////////////
//////////////Nuevo Nombre


function nombreNuevoComodato(nombre)
{
var idAlquiler = document.getElementById("idComodato").value;
var nombreNuevo = document.getElementById("nombreNuevoComodato").value;


var requerimiento = new RequerimientoGet();
requerimiento.setURL("modificarcomodato/ajax/nombreNuevo.php");
requerimiento.addParametro("id",idComodato);
requerimiento.addParametro("nombre",nombreNuevo);
requerimiento.addListener(respuestaNombreNuevoComodato);
requerimiento.ejecutar();

}


function respuestaNombreNuevoComodato(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);


var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var nombreNuevo = document.getElementById("nombreNuevoComodato").value;
  document.getElementById("nombreComodato").innerHTML = "Nombre: " + nombreNuevo;
  document.getElementById("nombreNuevoComodato").value = "";
  document.getElementById("alertaNombreNuevoComodato").innerHTML = crearAlerta("Nombre Comodato Modificado!","success");



  }
else
  {
  alert("Error al modificar el Nombre");
  }
}
