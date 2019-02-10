

///////////////////////////////////////////////////////////////
//////////////Ver Acuerdo Precios Productos


function verComodato(id)
{


if(document.getElementById("divDatosComodato"+id).style.display=="block")
  {
  document.getElementById("divDatosComodato"+id).style.display="none";
  document.getElementById("buttonVerDatosComodato"+id).innerHTML="Ver";
  }
else
  {
  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("sedes/comodatos/seleccionarcomodato/ajax/datosComodato.php");
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


  var br = "<br>";


  var labelNombre = "<label class=\"labelDatosComodatoLista\" >" +nombre + "</label>";

  var divDescripcion = document.getElementById("divDatosComodato"+id);
  divDescripcion.innerHTML +=labelNombre;
  var br = "<br>";

  var numero = xmlDoc.getElementsByTagName("NumeroProductos")[0].childNodes[0].nodeValue;
  for(i=0;i<numero;i++)
  {
  var nombreProducto=xmlDoc.getElementsByTagName("NombreProducto")[i].childNodes[0].nodeValue;
  var cantidadProducto=xmlDoc.getElementsByTagName("CantidadMinimaProducto")[i].childNodes[0].nodeValue;

  var labelProducto = "<label class=\"labelDatosAlquilerLista\" >" +nombreProducto +" Cantidad Mínima: "+cantidadProducto + "</label>";
  divDescripcion.innerHTML += br + labelProducto;
  }

  var numero = xmlDoc.getElementsByTagName("NumeroMaquinas")[0].childNodes[0].nodeValue;
  for(i=0;i<numero;i++)
  {
  var nombreMaquina=xmlDoc.getElementsByTagName("NombreMaquina")[i].childNodes[0].nodeValue;
  var cantidadMaquina=xmlDoc.getElementsByTagName("CantidadMaquina")[i].childNodes[0].nodeValue;

  var labelMaquina = "<label class=\"labelDatosAlquilerLista\" >" +nombreMaquina +" Cantidad: "+cantidadMaquina + "</label>";
  divDescripcion.innerHTML += br + labelMaquina;
  }



  document.getElementById("divDatosComodato"+id).style.display="block";
  document.getElementById("buttonVerDatosComodato"+id).innerHTML="Ocultar";
  }
else
  {
  alert("Error al cargar datos del comodato");
  }

}






///////////////////////////////////////////////////////////////
//////////////Ver Acuerdo Especial Precios Productos


function verComodatoEspecial(id)
{

if(document.getElementById("divDatosComodatoEspecial"+id).style.display=="block")
  {
  document.getElementById("divDatosComodatoEspecial"+id).style.display="none";
  document.getElementById("buttonVerDatosComodatoEspecial"+id).innerHTML="Ver";
  }
else
  {
  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("sedes/comodatos/seleccionarcomodato/ajax/datosComodato.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosComodatoEspecial);
  requerimiento.ejecutar();
  }

}




function respuestaVerDatosComodatoEspecial(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

    var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
    var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;

    var br = "<br>";


    var labelNombre = "<label class=\"labelDatosAlquilerLista\" >" +nombre + "</label>";

    var divDescripcion = document.getElementById("divDatosComodatoEspecial"+id);
    divDescripcion.innerHTML +=labelNombre+br;

    var numero = xmlDoc.getElementsByTagName("NumeroProductos")[0].childNodes[0].nodeValue;
    for(i=0;i<numero;i++)
    {
    var nombreProducto=xmlDoc.getElementsByTagName("NombreProducto")[i].childNodes[0].nodeValue;
    var cantidadProducto=xmlDoc.getElementsByTagName("CantidadMinimaProducto")[i].childNodes[0].nodeValue;

    var labelProducto = "<label class=\"labelDatosAlquilerLista\" >" +nombreProducto +" Cantidad Mínima: "+cantidadProducto + "</label>";
    divDescripcion.innerHTML += br + labelProducto;
    }

    var numero = xmlDoc.getElementsByTagName("NumeroMaquinas")[0].childNodes[0].nodeValue;
    for(i=0;i<numero;i++)
    {
    var nombreMaquina=xmlDoc.getElementsByTagName("NombreMaquina")[i].childNodes[0].nodeValue;
    var cantidadMaquina=xmlDoc.getElementsByTagName("CantidadMaquina")[i].childNodes[0].nodeValue;

    var labelMaquina = "<label class=\"labelDatosAlquilerLista\" >" +nombreMaquina +" Cantidad: "+cantidadMaquina + "</label>";
    divDescripcion.innerHTML += br + labelMaquina;
    }


  document.getElementById("divDatosComodatoEspecial"+id).style.display="block";
  document.getElementById("buttonVerDatosComodatoEspecial"+id).innerHTML="Ocultar";
  }
else
  {
  alert("Error al cargar datos del comodato");
  }

}








///////////////////////////////////////////////////////////////
//////////////Seleccionar Alquiler



function seleccionarComodato(idComodato)
{
var idCliente = document.getElementById("idCliente").value;
var idSede = document.getElementById("idSede").value;

var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/comodatos/seleccionarcomodato/ajax/seleccionarComodato.php");
requerimiento.addParametro("idCliente",idCliente);
requerimiento.addParametro("idSede",idSede);
requerimiento.addParametro("idComodato",idComodato);
requerimiento.addListener(respuestaSeleccionarComodato);
requerimiento.ejecutar();
}


function respuestaSeleccionarComodato(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {
  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;

  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("sedes/comodatos/seleccionarcomodato/ajax/datosComodato.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosComodatoActual);
  requerimiento.ejecutar();



  }
else
  {
  alert("Error al cargar datos del alquiler");
  }

}




function respuestaVerDatosComodatoActual(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;

  var divDescripcion = document.getElementById("divDatosComodatoActual");
  var br = "<br>";
  divDescripcion.innerHTML="";


  var labelNombre = "<label class=\"labelAlquilerActual\" >" +nombre + "</label>";
  var labelProductos = "<label class=\"labelAlquilerActual\" >" +"Productos"+"</label>";
  var labelMaquinas = "<label class=\"labelAlquilerActual\" >" +"Maquinas"+"</label>";

  divDescripcion.innerHTML += labelNombre +br + labelProductos;


  var numero = xmlDoc.getElementsByTagName("NumeroProductos")[0].childNodes[0].nodeValue;
  for(i=0;i<numero;i++)
  {
  var nombreProducto=xmlDoc.getElementsByTagName("NombreProducto")[i].childNodes[0].nodeValue;
  var cantidadProducto=xmlDoc.getElementsByTagName("CantidadMinimaProducto")[i].childNodes[0].nodeValue;
  var labelProducto = "<label class=\"labelComodatoActual\" >" +nombreProducto +" Cantidad Mínima: "+cantidadProducto + "</label>";
  divDescripcion.innerHTML += br + labelProducto;
  }

  divDescripcion.innerHTML += br + labelMaquinas + br;

  var numero = xmlDoc.getElementsByTagName("NumeroMaquinas")[0].childNodes[0].nodeValue;
  for(i=0;i<numero;i++)
  {
  var nombreMaquina=xmlDoc.getElementsByTagName("NombreMaquina")[i].childNodes[0].nodeValue;
  var cantidadMaquina=xmlDoc.getElementsByTagName("CantidadMaquina")[i].childNodes[0].nodeValue;

  var labelMaquina = "<label class=\"labelComodatoActual\" >" +nombreMaquina +" Cantidad: "+cantidadMaquina + "</label>";
  divDescripcion.innerHTML += br + labelMaquina;
  }



  }
else
  {
  alert("Error al cargar datos del comodato");
  }

}
