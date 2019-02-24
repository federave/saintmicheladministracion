

///////////////////////////////////////////////////////////////
//////////////Ver Alquiler


function verComodato(id)
{
if(document.getElementById("divComodato"+id).style.display=="block")
  {
  document.getElementById("divComodato"+id).style.display="none";
  document.getElementById("buttonVerComodato"+id).innerHTML="Ver";
  }
else
  {
  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("vercomodatos/ajax/datosComodatoActual.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosComodato);
  requerimiento.ejecutar();
  }

}


function respuestaVerDatosComodato(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {


  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;

  document.getElementById("nombreComodato"+id).innerHTML="Nombre: "+nombre;

  var numeroCondiciones = xmlDoc.getElementsByTagName("NumeroCondiciones")[0].childNodes[0].nodeValue;
  var divCondiciones = document.getElementById("divCondicionesComodato"+id);

  for(i=0;i<numeroCondiciones;i++)
  {
  var nombre=xmlDoc.getElementsByTagName("NombreCondicion")[i].childNodes[0].nodeValue;
  var labelNombre="<label class=\"etiqueta\" >"+ "Condicion: " + nombre  +  "</label>";
  var div = "<div class=\"row text-center\" >" + labelNombre + "<br>" + "</div>";
  divCondiciones.innerHTML += div ;
  }


  var numeroMaquinas = xmlDoc.getElementsByTagName("NumeroMaquinas")[0].childNodes[0].nodeValue;
  var divMaquinas = document.getElementById("divMaquinasComodato"+id);

  for(i=0;i<numeroMaquinas;i++)
  {
  var nombre=xmlDoc.getElementsByTagName("NombreMaquina")[i].childNodes[0].nodeValue;
  var cantidad=xmlDoc.getElementsByTagName("CantidadMaquina")[i].childNodes[0].nodeValue;
  var labelNombre="<label class=\"etiqueta\" >"+ "Maquina: " + nombre  +  "</label>";
  var labelCantidad="<label class=\"etiqueta\" >"+ "Cantidad: " + cantidad  +  "</label>";
  var div = "<div class=\"row text-center\" >" + labelNombre + "<br>" + labelCantidad+ "<br>" +  "</div>";
  divMaquinas.innerHTML += div ;
  }



  document.getElementById("divComodato"+id).style.display="block";
  document.getElementById("buttonVerComodato"+id).innerHTML="Ocultar";
  }
else
  {
  alert("Error al cargar datos del comodato");
  }

}


///////////////////////////////////////////////////////////////
//////////////Modificar Alquiler



function modificarComodato(id)
{
var requerimiento = new RequerimientoGet();
requerimiento.setURL("vercomodatos/ajax/datosComodatoActual.php");
requerimiento.addParametro("id",id);
requerimiento.addListener(respuestaDatosComodato);
requerimiento.ejecutar();
}


function respuestaDatosComodato(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;
  document.getElementById("idComodato").value = id;
  document.getElementById("nombreComodato").innerHTML = "Nombre: " + nombre;


  var numeroCondiciones = document.getElementById("numeroCondiciones").value;
  for(i=0;i<numeroCondiciones;i++)
  {
  document.getElementById("divCondicion"+i).style.display="block";
  }
  var numeroMaquinas = document.getElementById("numeroMaquinas").value;
  for(i=0;i<numeroMaquinas;i++)
  {
  document.getElementById("divMaquina"+i).style.display="block";
  }


  var numeroCondiciones = xmlDoc.getElementsByTagName("NumeroCondiciones")[0].childNodes[0].nodeValue;

  for(i=0;i<numeroCondiciones;i++)
  {
  var nombre=xmlDoc.getElementsByTagName("NombreCondicion")[i].childNodes[0].nodeValue;
  var idcondicion=xmlDoc.getElementsByTagName("IdCondicion")[i].childNodes[0].nodeValue;
  mostrarCondicion(idcondicion,nombre);
  quitarCondicion(document.getElementById("numeroCondicion"+idcondicion).value);
  }


  var numeroMaquinas = xmlDoc.getElementsByTagName("NumeroMaquinas")[0].childNodes[0].nodeValue;

  for(i=0;i<numeroMaquinas;i++)
  {
  var nombre=xmlDoc.getElementsByTagName("NombreMaquina")[i].childNodes[0].nodeValue;
  var idmaquina=xmlDoc.getElementsByTagName("IdMaquina")[i].childNodes[0].nodeValue;
  mostrarMaquina(idmaquina,nombre);
  quitarMaquina(document.getElementById("numeroMaquina"+idmaquina).value);
  }










  seleccionarTab(2,"Comodatos");
  }
else
  {
  alert("Error al cargar datos del comodato");
  }
}





function mostrarCondicion(idcondicion,nombre)
{

/*
var labelNombre="<label class=\"etiquetaBlanca\">"+nombreBonificacion+"</label>";

var button = "<button class=\"btn btn-primary\" onclick=\"quitarBonificacionAcuerdo("+idBonificacion+")\" style=\"height:50px;font-size:18px;width:60%;\">Quitar</button>";
var divAlerta = "<div id=\"alertaBonificacion"+idBonificacion+"\"></div>";
var div = "<div id=\"divBonificacionAcuerdo"+idBonificacion+"\" class=\"row text-center\">"+labelNombre+"<br>"+"<br>"+button+"<br>"+"<br>"+"<br>"+"</div>"+"<br>"+"<br>";

document.getElementById("divBonificacionesAcuerdo").innerHTML += div + divAlerta;
*/

}


function quitarCondicion(numero)
{
document.getElementById("divCondicion"+numero).style.display = "none";
}






function mostrarMaquina(idmaquina,nombre)
{

/*
var labelNombre="<label class=\"etiquetaBlanca\">"+nombreBonificacion+"</label>";

var button = "<button class=\"btn btn-primary\" onclick=\"quitarBonificacionAcuerdo("+idBonificacion+")\" style=\"height:50px;font-size:18px;width:60%;\">Quitar</button>";
var divAlerta = "<div id=\"alertaBonificacion"+idBonificacion+"\"></div>";
var div = "<div id=\"divBonificacionAcuerdo"+idBonificacion+"\" class=\"row text-center\">"+labelNombre+"<br>"+"<br>"+button+"<br>"+"<br>"+"<br>"+"</div>"+"<br>"+"<br>";

document.getElementById("divBonificacionesAcuerdo").innerHTML += div + divAlerta;
*/

}


function quitarMaquina(numero)
{
document.getElementById("divMaquina"+numero).style.display = "none";
}
