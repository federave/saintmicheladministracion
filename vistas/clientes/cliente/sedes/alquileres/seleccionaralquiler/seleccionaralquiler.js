

///////////////////////////////////////////////////////////////
//////////////Ver Acuerdo Precios Productos


function verAlquiler(id)
{


if(document.getElementById("divDatosAlquiler"+id).style.display=="block")
  {
  document.getElementById("divDatosAlquiler"+id).style.display="none";
  document.getElementById("buttonVerDatosAlquiler"+id).innerHTML="Ver";
  }
else
  {
  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("sedes/alquileres/seleccionaralquiler/ajax/datosAlquiler.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosAlquiler);
  requerimiento.ejecutar();
  }

}


function respuestaVerDatosAlquiler(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;
  var precio = xmlDoc.getElementsByTagName("Precio")[0].childNodes[0].nodeValue;


  var br = "<br>";


  var labelNombre = "<label class=\"labelDatosAlquilerLista\" >" +nombre + "</label>";
  var labelPrecio = "<label class=\"labelDatosAlquilerLista\" >" +"Precio: "+precio +" $"+ "</label>";

  var divDescripcion = document.getElementById("divDatosAlquiler"+id);
  divDescripcion.innerHTML +=labelNombre+br+labelPrecio;

  var numero = xmlDoc.getElementsByTagName("NumeroProductos")[0].childNodes[0].nodeValue;
  for(i=0;i<numero;i++)
  {
  var nombreProducto=xmlDoc.getElementsByTagName("NombreProducto")[i].childNodes[0].nodeValue;
  var cantidadProducto=xmlDoc.getElementsByTagName("CantidadProducto")[i].childNodes[0].nodeValue;

  var labelProducto = "<label class=\"labelDatosAlquilerLista\" >" +nombreProducto +" Cantidad: "+cantidadProducto + "</label>";
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



  document.getElementById("divDatosAlquiler"+id).style.display="block";
  document.getElementById("buttonVerDatosAlquiler"+id).innerHTML="Ocultar";
  }
else
  {
  alert("Error al cargar datos del alquiler");
  }

}






///////////////////////////////////////////////////////////////
//////////////Ver Acuerdo Especial Precios Productos


function verAlquilerEspecial(id)
{

if(document.getElementById("divDatosAlquilerEspecial"+id).style.display=="block")
  {
  document.getElementById("divDatosAlquilerEspecial"+id).style.display="none";
  document.getElementById("buttonVerDatosAlquilerEspecial"+id).innerHTML="Ver";
  }
else
  {
  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("sedes/alquileres/seleccionaralquiler/ajax/datosAlquiler.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosAlquilerEspecial);
  requerimiento.ejecutar();
  }

}




function respuestaVerDatosAlquilerEspecial(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

    var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
    var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;
    var precio = xmlDoc.getElementsByTagName("Precio")[0].childNodes[0].nodeValue;


    var br = "<br>";


    var labelNombre = "<label class=\"labelDatosAlquilerLista\" >" +nombre + "</label>";
    var labelPrecio = "<label class=\"labelDatosAlquilerLista\" >" +"Precio: "+precio +" $"+ "</label>";

    var divDescripcion = document.getElementById("divDatosAlquilerEspecial"+id);
    divDescripcion.innerHTML +=labelNombre+br+labelPrecio;

    var numero = xmlDoc.getElementsByTagName("NumeroProductos")[0].childNodes[0].nodeValue;
    for(i=0;i<numero;i++)
    {
    var nombreProducto=xmlDoc.getElementsByTagName("NombreProducto")[i].childNodes[0].nodeValue;
    var cantidadProducto=xmlDoc.getElementsByTagName("CantidadProducto")[i].childNodes[0].nodeValue;

    var labelProducto = "<label class=\"labelDatosAlquilerLista\" >" +nombreProducto +" Cantidad: "+cantidadProducto + "</label>";
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


  document.getElementById("divDatosAlquilerEspecial"+id).style.display="block";
  document.getElementById("buttonVerDatosAlquilerEspecial"+id).innerHTML="Ocultar";
  }
else
  {
  alert("Error al cargar datos del alquiler");
  }

}








///////////////////////////////////////////////////////////////
//////////////Seleccionar Alquiler



function seleccionarAlquiler(idAlquiler)
{
idAlquilerSeleccionado = idAlquiler;
var idSede = document.getElementById("idSede").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/alquileres/seleccionaralquiler/ajax/seleccionarAlquiler.php");
requerimiento.addParametro("idsede",idSede);
requerimiento.addParametro("idalquiler",idAlquiler);
requerimiento.addListener(respuestaSeleccionarAlquiler);
requerimiento.ejecutar();
}

var idAlquilerSeleccionado;

function respuestaSeleccionarAlquiler(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {
  var id = idAlquilerSeleccionado;
  document.getElementById("idalquilersede").value = id;

  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("sedes/alquileres/seleccionaralquiler/ajax/datosAlquiler.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosAlquilerActual);
  requerimiento.ejecutar();



  }
else
  {
  alert("Error al cargar datos del alquiler");
  }

}




function respuestaVerDatosAlquilerActual(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {
    document.getElementById("labelEstadoAlquiler").innerHTML = "Alquiler Actual";

  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;
  var precio = xmlDoc.getElementsByTagName("Precio")[0].childNodes[0].nodeValue;

  var f = new Date();
  fechainicio = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();


  document.getElementById("labelNombreAlquiler").innerHTML = "Nombre: "+nombre;
  document.getElementById("labelPrecioAlquiler").innerHTML = "Precio: "+precio;
  document.getElementById("labelEstadoPrecioEspecialAlquiler").innerHTML = "Precio Especial: No";

  document.getElementById("labelFechaInicioAlquiler").innerHTML = "Fecha de Inicio: "+fechainicio;


  var divProductos = document.getElementById("divProductosAlquiler");
  var divMaquinas = document.getElementById("divMaquinasAlquiler");

  var br = "<br>";
  divProductos.innerHTML="";
  divMaquinas.innerHTML="";



  var numero = xmlDoc.getElementsByTagName("NumeroProductos")[0].childNodes[0].nodeValue;
  for(i=0;i<numero;i++)
  {
  var nombreProducto=xmlDoc.getElementsByTagName("NombreProducto")[i].childNodes[0].nodeValue;
  var cantidadProducto=xmlDoc.getElementsByTagName("CantidadProducto")[i].childNodes[0].nodeValue;
  var labelProducto = "<label class=\"labelAlquilerActual\" >" +nombreProducto +" Cantidad: "+cantidadProducto + "</label>";
  divProductos.innerHTML +=  labelProducto + br ;
  }


  var numero = xmlDoc.getElementsByTagName("NumeroMaquinas")[0].childNodes[0].nodeValue;
  for(i=0;i<numero;i++)
  {
  var nombreMaquina=xmlDoc.getElementsByTagName("NombreMaquina")[i].childNodes[0].nodeValue;
  var cantidadMaquina=xmlDoc.getElementsByTagName("CantidadMaquina")[i].childNodes[0].nodeValue;

  var labelMaquina = "<label class=\"labelAlquilerActual\" >" +nombreMaquina +" Cantidad: "+cantidadMaquina + "</label>";
  divMaquinas.innerHTML += labelMaquina + br;
  }

  document.getElementById("divAlquilerActual").style.display = "block";


  }
else
  {
  alert("Error al cargar datos del acuerdo bonificaciones");
  }

}
