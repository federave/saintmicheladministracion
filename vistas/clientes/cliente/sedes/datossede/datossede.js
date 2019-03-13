

///////////////////////////////////////////////////////////////
//////////////Nuevo Horario

function agregarHorario()
{
var idCliente = document.getElementById("idCliente").value;
var idSede = document.getElementById("idSede").value;
var horaInicio = document.getElementById("horaInicio").value;
var horaFin = document.getElementById("horaFin").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/datossede/ajax/nuevoHorario.php");
requerimiento.addParametro("idsede",idSede);
requerimiento.addParametro("horainicio",horaInicio);
requerimiento.addParametro("horafin",horaFin);
requerimiento.addListener(respuestaNuevoHorario);
requerimiento.ejecutar();
}


function respuestaNuevoHorario(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;


if(estado!=0)
  {
    var idHorario = xmlDoc.getElementsByTagName("IdHorario")[0].childNodes[0].nodeValue;

  document.getElementById("numeroHorarios").value = document.getElementById("numeroHorarios").value +1;


  var horaInicio= document.getElementById("horaInicio").value;
  var horaFin = document.getElementById("horaFin").value;


  var labelHoraInicio = "<label style=\"font-size:20px;color:black\">Hora Inicio:"+horaInicio+"</label>";
  var br = "<br>";
  var labelHoraFin = "<label style=\"font-size:20px;color:black\">Hora Fin:"+horaFin+"</label>";
  var divCol60 = "<div class=\"col-60 text-center\">" + labelHoraInicio + br + labelHoraFin + "</div>";
  var boton = "<button class=\"btn btn-primary\" onclick=darDeBajaHorario(" +idHorario+ ") style=\"height:50px;font-size:18px;margin:auto;width:90%;\">Dar de Baja</button>";
  var divCol40 = "<div class=\"col-40\">" + br + boton + "</div>";
  var divRow = "<div class=\"row\">" + divCol60 + divCol40 + "</div>";
  var item = "<li id=\"horario"+idHorario+"\" class=\"list-group-item\">" +divRow+ "</li>";

  document.getElementById("listaHorariosSede").innerHTML+=item;


  }
else
  {
  alert("Error al dar de baja el horario");
  }
}












///////////////////////////////////////////////////////////////
//////////////Nuevo nombre


function darDeBajaHorario(idHorario)
{

var numeroHorarios = document.getElementById("numeroHorarios").value;
if(numeroHorarios>1)
  {
  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("sedes/datossede/ajax/darDeBajaHorario.php");
  requerimiento.addParametro("idhorario",idHorario);
  requerimiento.addListener(respuestaDarDeBajaHorario);
  requerimiento.ejecutar();
  }
else
  {
  alert("La sede no puede quedarse sin horarios");
  }
}


function respuestaDarDeBajaHorario(respuesta)
{
alert(respuesta.target.responseText);
xmlDoc = crearXML(respuesta.target.responseText);


var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
var idHorario = xmlDoc.getElementsByTagName("IdHorario")[0].childNodes[0].nodeValue;
if(estado)
  {
  document.getElementById("horario"+idHorario).style.display="none";
  document.getElementById("numeroHorarios").value = document.getElementById("numeroHorarios").value -1;
  }
else
  {
  alert("Error al dar de baja el horario");
  }
}





///////////////////////////////////////////////////////////////
//////////////Nuevo nombre

function nombreNuevoSede()
{
var idsede = document.getElementById("idsede").value;
var nombreNuevo = document.getElementById("nombreNuevoSede").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/datossede/ajax/nuevoNombre.php");
requerimiento.addParametro("idsede",idsede);
requerimiento.addParametro("nombre",nombreNuevo);
requerimiento.addListener(respuestaNombreNuevoSede);
requerimiento.ejecutar();
}



function respuestaNombreNuevoSede(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var nuevoNombre = document.getElementById("nombreNuevoSede").value;
  document.getElementById("nombreSede").innerHTML = "Nombre: " + nuevoNombre;
  document.getElementById("nombreNuevoSede").value = "";
  document.getElementById("alertaNombreNuevoSede").innerHTML = crearAlerta("Nombre Modificado!","success");

  }
else
  {
  alert("Error al modificar el Nombre");
  }
}




///////////////////////////////////////////////////////////////
//////////////Nuevo nombre

function telefonoNuevoSede()
{
var idsede = document.getElementById("idsede").value;
var telefonoNuevo = document.getElementById("telefonoNuevoSede").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/datossede/ajax/nuevoTelefono.php");
requerimiento.addParametro("idsede",idsede);
requerimiento.addParametro("telefono",telefonoNuevo);
requerimiento.addListener(respuestaTelefonoNuevoSede);
requerimiento.ejecutar();
}



function respuestaTelefonoNuevoSede(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var nuevoTelefono = document.getElementById("telefonoNuevoSede").value;
  document.getElementById("telefonoSede").innerHTML = "Telefono: " + nuevoTelefono;
  document.getElementById("telefonoNuevoSede").value = "";
  document.getElementById("alertaTelefonoNuevoSede").innerHTML = crearAlerta("Telefono Modificado!","success");

  }
else
  {
  alert("Error al modificar el Telefono");
  }
}



///////////////////////////////////////////////////////////////
//////////////Nuevo nombre

function emailNuevoSede()
{
var idsede = document.getElementById("idsede").value;
var emailNuevo = document.getElementById("emailNuevoSede").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/datossede/ajax/nuevoEmail.php");
requerimiento.addParametro("idsede",idsede);
requerimiento.addParametro("email",emailNuevo);
requerimiento.addListener(respuestaEmailNuevoSede);
requerimiento.ejecutar();
}



function respuestaEmailNuevoSede(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var nuevoEmail = document.getElementById("emailNuevoSede").value;
  document.getElementById("emailSede").innerHTML = "Email: " + nuevoEmail;
  document.getElementById("emailNuevoSede").value = "";
  document.getElementById("alertaEmailNuevoSede").innerHTML = crearAlerta("Email Modificado!","success");

  }
else
  {
  alert("Error al modificar el Email");
  }
}





///////////////////////////////////////////////////////////////
//////////////Nuevo nombre

function observacionNuevaSede()
{
var idsede = document.getElementById("idsede").value;
var observacionNueva = document.getElementById("observacionNuevaSede").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/datossede/ajax/nuevaObservacion.php");
requerimiento.addParametro("idsede",idsede);
requerimiento.addParametro("observacion",observacionNueva);
requerimiento.addListener(respuestaObservacionNuevaSede);
requerimiento.ejecutar();
}



function respuestaObservacionNuevaSede(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var nuevaObservacion = document.getElementById("observacionNuevaSede").value;
  document.getElementById("observacionSede").innerHTML = "Observacion: " + nuevaObservacion;
  document.getElementById("observacionNuevaSede").value = "";
  document.getElementById("alertaObservacionNuevaSede").innerHTML = crearAlerta("Observación Modificada!","success");

  }
else
  {
  alert("Error al modificar la Observación");
  }
}





///////////////////////////////////////////////////////////////
//////////////Nuevo nombre

function nombreResponsableNuevoSede()
{
var idsede = document.getElementById("idsede").value;
var nombreResponsableNuevo = document.getElementById("nombreResponsableNuevoSede").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/datossede/ajax/nuevoNombreResponsable.php");
requerimiento.addParametro("idsede",idsede);
requerimiento.addParametro("nombre",nombreResponsableNuevo);
requerimiento.addListener(respuestaNombreResponsableNuevoSede);
requerimiento.ejecutar();
}



function respuestaNombreResponsableNuevoSede(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var nuevoNombreResponsable = document.getElementById("nombreResponsableNuevoSede").value;
  document.getElementById("nombreResponsableSede").innerHTML = "Nombre: " + nuevoNombreResponsable;
  document.getElementById("nombreResponsableNuevoSede").value = "";
  document.getElementById("alertaNombreResponsableNuevo").innerHTML = crearAlerta("Nombre Responsable Modificado!","success");

  }
else
  {
  alert("Error al modificar el Nombre Responsable");
  }
}




///////////////////////////////////////////////////////////////
//////////////Nuevo nombre

function apellidoResponsableNuevoSede()
{
var idsede = document.getElementById("idsede").value;
var apellidoNuevo = document.getElementById("apellidoResponsableNuevoSede").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/datossede/ajax/nuevoApellidoResponsable.php");
requerimiento.addParametro("idsede",idsede);
requerimiento.addParametro("apellido",apellidoNuevo);
requerimiento.addListener(respuestaApellidoNuevoSede);
requerimiento.ejecutar();
}



function respuestaApellidoNuevoSede(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
  var nuevoApellido = document.getElementById("apellidoResponsableNuevoSede").value;
  document.getElementById("apellidoResponsableSede").innerHTML = "Apellido: " + nuevoApellido;
  document.getElementById("apellidoResponsableNuevoSede").value = "";
  document.getElementById("alertaApellidoResponsableNuevo").innerHTML = crearAlerta("Apellido Responsable Modificado!","success");

  }
else
  {
  alert("Error al modificar el Apellido");
  }
}




///////////////////////////////////////////////////////////////
//////////////Nuevo nombre

function nuevoTipoSede()
{
var idsede = document.getElementById("idsede").value;
var tipoSedeNuevo = document.getElementById("tipoSedeNuevo").value;
var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/datossede/ajax/nuevoTipoSede.php");
requerimiento.addParametro("idsede",idsede);
requerimiento.addParametro("idtiposede",tipoSedeNuevo);
requerimiento.addListener(respuestaNuevoTipoSede);
requerimiento.ejecutar();
}



function respuestaNuevoTipoSede(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;
if(estado)
  {
    document.getElementById("alertaTipoSedeNuevo").innerHTML = crearAlerta("Tipo Sede Modificado!","success");

  }
else
  {
  alert("Error al modificar el Nombre");
  }
}
