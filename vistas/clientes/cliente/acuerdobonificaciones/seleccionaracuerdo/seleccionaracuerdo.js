

///////////////////////////////////////////////////////////////
//////////////Ver Acuerdo Precios Productos


function verAcuerdoBonificaciones(id)
{
if(document.getElementById("divDatosAcuerdoBonificaciones"+id).style.display=="block")
  {
  document.getElementById("divDatosAcuerdoBonificaciones"+id).style.display="none";
  document.getElementById("buttonVerDatosAcuerdoBonificaciones"+id).innerHTML="Ver";
  }
else
  {
  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("acuerdobonificaciones/seleccionaracuerdo/ajax/datosAcuerdoBonificaciones.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosAcuerdoBonificaciones);
  requerimiento.ejecutar();
  }

}


function respuestaVerDatosAcuerdoBonificaciones(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;

  var labelNombre = "<label class=\"labelDatosAcuerdoLista\" >" +nombre + "</label>";

  var divDescripcion = document.getElementById("divDatosAcuerdoBonificaciones"+id);

  divDescripcion.innerHTML +=labelNombre+br;
  var br = "<br>";

  var numero = xmlDoc.getElementsByTagName("NumeroBonificaciones")[0].childNodes[0].nodeValue;
  for(i=0;i<numero;i++)
  {
  var nombreBonificacion=xmlDoc.getElementsByTagName("NombreBonificacion")[i].childNodes[0].nodeValue;
  var labelNombreBonificacion = "<label class=\"labelDatosAcuerdoLista\" >" +nombreBonificacion + "</label>";
  divDescripcion.innerHTML += br + labelNombreBonificacion;
  }




  document.getElementById("divDatosAcuerdoBonificaciones"+id).style.display="block";
  document.getElementById("buttonVerDatosAcuerdoBonificaciones"+id).innerHTML="Ocultar";
  }
else
  {
  alert("Error al cargar datos del acuerdo bonificaciones");
  }

}






///////////////////////////////////////////////////////////////
//////////////Ver Acuerdo Especial Precios Productos


function verAcuerdoEspecialBonificaciones(id)
{
if(document.getElementById("divDatosAcuerdoEspecialBonificaciones"+id).style.display=="block")
  {
  document.getElementById("divDatosAcuerdoEspecialBonificaciones"+id).style.display="none";
  document.getElementById("buttonVerDatosAcuerdoEspecialBonificaciones"+id).innerHTML="Ver";
  }
else
  {
  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("acuerdobonificaciones/seleccionaracuerdo/ajax/datosAcuerdoBonificaciones.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosAcuerdoEspecialBonificaciones);
  requerimiento.ejecutar();
  }

}




function respuestaVerDatosAcuerdoEspecialBonificaciones(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

    var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
    var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;

    var labelNombre = "<label class=\"labelDatosAcuerdoLista\" >" +nombre + "</label>";

    var divDescripcion = document.getElementById("divDatosAcuerdoEspecialBonificaciones"+id);

    divDescripcion.innerHTML +=labelNombre+br;
    var br = "<br>";

    var numero = xmlDoc.getElementsByTagName("NumeroBonificaciones")[0].childNodes[0].nodeValue;
    for(i=0;i<numero;i++)
    {
    var nombreBonificacion=xmlDoc.getElementsByTagName("NombreBonificacion")[i].childNodes[0].nodeValue;
    var labelNombreBonificacion = "<label class=\"labelDatosAcuerdoLista\" >" +nombreBonificacion + "</label>";
    divDescripcion.innerHTML += br + labelNombreBonificacion;
    }



  document.getElementById("divDatosAcuerdoEspecialBonificaciones"+id).style.display="block";
  document.getElementById("buttonVerDatosAcuerdoEspecialBonificaciones"+id).innerHTML="Ocultar";
  }
else
  {
  alert("Error al cargar datos del acuerdo bonificaciones");
  }

}








///////////////////////////////////////////////////////////////
//////////////Seleccionar Acuerdo Precios Productos



function seleccionarAcuerdoBonificaciones(idAcuerdo)
{
var idCliente = document.getElementById("idCliente").value;

var requerimiento = new RequerimientoGet();
requerimiento.setURL("acuerdobonificaciones/seleccionaracuerdo/ajax/seleccionarAcuerdoBonificaciones.php");
requerimiento.addParametro("idCliente",idCliente);
requerimiento.addParametro("idAcuerdo",idAcuerdo);
requerimiento.addListener(respuestaSeleccionarAcuerdoBonificaciones);
requerimiento.ejecutar();
}


function respuestaSeleccionarAcuerdoBonificaciones(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {
  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;

  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("acuerdobonificaciones/seleccionaracuerdo/ajax/datosAcuerdoBonificaciones.php");
  requerimiento.addParametro("id",id);
  requerimiento.addListener(respuestaVerDatosAcuerdoActualBonificaciones);
  requerimiento.ejecutar();



  }
else
  {
  alert("Error al cargar datos del producto");
  }

}






function respuestaVerDatosAcuerdoActualBonificaciones(respuesta)
{

xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {

  var id = xmlDoc.getElementsByTagName("Id")[0].childNodes[0].nodeValue;
  var nombre = xmlDoc.getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;

  document.getElementById("nombreAcuerdoActualBonificaciones").innerHTML = nombre;
  var divDescripcion = document.getElementById("divDatosAcuerdoActualBonificaciones");
  var br = "<br>";

  divDescripcion.innerHTML="";


  var numero = xmlDoc.getElementsByTagName("NumeroBonificaciones")[0].childNodes[0].nodeValue;
  for(i=0;i<numero;i++)
  {
  var nombreBonificacion=xmlDoc.getElementsByTagName("NombreBonificacion")[i].childNodes[0].nodeValue;
  var labelNombreBonificacion = "<label class=\"labelAcuerdoActual\" >" +nombreBonificacion + "</label>";
  divDescripcion.innerHTML += br + labelNombreBonificacion;
  }

  }
else
  {
  alert("Error al cargar datos del acuerdo bonificaciones");
  }

}
