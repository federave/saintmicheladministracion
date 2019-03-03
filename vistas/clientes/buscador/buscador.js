






function limpiar()
{
document.getElementById("listaclientes").innerHTML="";
document.getElementById("dato").value="";
}


function buscar()
{
var dato = document.getElementById("dato").value;
if(dato.length>0)
  {
    var requerimiento = new RequerimientoGet();
    requerimiento.setURL("ajax/buscar.php");
    requerimiento.addParametro("dato",dato);
    requerimiento.addListener(respuestaBuscar);
    requerimiento.ejecutar();
  }
else
  {
  limpiar();
  }
}




function respuestaBuscar(respuesta)
{
alert(respuesta.target.responseText);

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {





  }
else
  {
  alert("Error al buscar los datos");
  }

}
