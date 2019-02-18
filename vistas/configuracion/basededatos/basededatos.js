

///////////////////////////////////////////////////////////////
//////////////Ver Promocion


function crearBaseDeDatos()
{
var requerimiento = new RequerimientoGet();
requerimiento.setURL("basededatos/ajax/crearbasededatos.php");
requerimiento.addListener(respuestaCrearBaseDeDatos);
requerimiento.ejecutar();
}



function respuestaCrearBaseDeDatos(respuesta)
{
alert(respuesta.target.responseText);

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado == 1)
  {
  document.getElementById("alertaCrearBaseDeDatos").innerHTML = crearAlerta("Base De Datos Creada!","success");
  }
else
  {
  alert("Error al crear la base de datos");
  }

}
