

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

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

  document.getElementById("listaclientes").innerHTML="";

  var numero = xmlDoc.getElementsByTagName("NumeroClientes")[0].childNodes[0].nodeValue;

  for(i=0;i<numero;i++)
    {
    var nombre = xmlDoc.getElementsByTagName("NombreCliente")[i].childNodes[0].nodeValue;
    var id = xmlDoc.getElementsByTagName("Id")[i].childNodes[0].nodeValue;
    var idsede = xmlDoc.getElementsByTagName("IdSede")[i].childNodes[0].nodeValue;
    var nombresede = xmlDoc.getElementsByTagName("NombreSede")[i].childNodes[0].nodeValue;
    var calle = xmlDoc.getElementsByTagName("Calle")[i].childNodes[0].nodeValue;
    var numero = xmlDoc.getElementsByTagName("Numero")[i].childNodes[0].nodeValue;




    var labelNombre = "<label class=\"etiqueta\">" + nombre + "</label>";
    var labelId = "<label class=\"etiqueta\">" + "Id: " + id + "</label>";
    var labelSede = "<label class=\"etiqueta\">" + "Sede: " + nombresede + "</label>";
    var labelDireccion = "<label class=\"etiqueta\">" + "Calle: " + calle +" N°: "+numero + "</label>";
    var br="<br>";
    var buttonVer = "<button style=\"width:80%;margin:auto;\" class=\"btn btn-success botontema\" onclick=\"verCliente(" +id +","+idsede+")\">"+"Ver"+"</button>";
    var buttonModificar = "<button role=\"link\" onclick=\"window.location='../cliente/cliente.php?idcliente="+id+"&idsede="+idsede+"'\" style=\"width:80%;margin:auto;\" class=\"btn btn-primary botontema\">"+"Modificar"+"</button>";
//    var buttonModificar = "<button role="link" onclick="window.location='../cliente/cliente.php' style=\"width:80%;margin:auto;\" class=\"btn btn-primary\" onclick=\"modificarCliente(" +id +","+idsede+")\">"+"Modificar"+"</button>";

    var divColumnDatos = "<div class=\"text-center col-50\">"+labelNombre+br+labelId+br+labelSede+br+labelDireccion+br+"</div>";
    var divColumnBotones = "<div class=\"text-center col-50\">"+buttonVer+br+br+buttonModificar+"</div>";
    var divRow = "<div class=\"row\">"+divColumnDatos+divColumnBotones+"</div>";
    var itemLista = "<li class=\"list-group-item\">"+divRow+br+"</li>";

    document.getElementById("listaclientes").innerHTML+=itemLista;

    }




  }
else
  {
  alert("Error al buscar los datos");
  }

}



function modificarCliente(id,idsede)
{
var requerimiento = new RequerimientoGet();
requerimiento.setURL("ajax/modificar.php");
requerimiento.addParametro("idcliente",id);
requerimiento.addParametro("idsede",idsede);
requerimiento.addListener(respuestaModificarCliente);
requerimiento.ejecutar();
}



function respuestaModificarCliente()
{
alert("Error al cargar los datos");
}
