
///////////////////////////////////////////////////////////////
//////////////Nueva Asignacion


function nuevaAsignacion()
{
var idCliente = document.getElementById("idCliente").value;
var idSede = document.getElementById("idSede").value;

var xml = new XML();

xml.startTag("Asignacion");

if(document.getElementById("empresa").checked)
{
xml.addTag("IdAsignacion",1);
for(i=1;i<7;i++)
  {
  if(document.getElementById("dia"+i).checked)
    {
    xml.startTag("Dia");
      xml.addTag("IdDia",i);
      xml.addTag("IdRepartidor",document.getElementById("repartidoresDia"+i).value);
    xml.closeTag("Dia");
    }
  }
}
else if(document.getElementById("repartidor").checked)
  {
  xml.addTag("IdAsignacion",1);
  xml.addTag("IdRepartidor",document.getElementById("repartidorSeleccionado").value);
  for(i=1;i<7;i++)
    {
    if(document.getElementById("dia"+i).checked)
      {
      xml.startTag("Dia");
        xml.addTag("IdDia",i);
      xml.closeTag("Dia");
      }
    }
  }
else
  {
  xml.addTag("IdAsignacion",1);
  xml.addTag("IdVendedor",document.getElementById("vendedorSeleccionado").value);
  for(i=1;i<7;i++)
    {
    if(document.getElementById("dia"+i).checked)
      {
      xml.startTag("Dia");
        xml.addTag("IdDia",i);
      xml.closeTag("Dia");
      }
    }
  }

xml.closeTag("Asignacion");



var requerimiento = new RequerimientoGet();
requerimiento.setURL("sedes/asignacion/ajax/nuevaAsignacion.php");
requerimiento.addParametro("idCliente",idCliente);
requerimiento.addParametro("idSede",idCliente);
requerimiento.addParametro("asignacion",xml.toString());
requerimiento.addListener(respuestaNuevaAsignacion);
requerimiento.ejecutar();


}

function respuestaNuevaAsignacion(respuesta)
{
xmlDoc = crearXML(respuesta.target.responseText);

var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {
  document.getElementById("alertaAsignacionNueva").innerHTML = crearAlerta("Asignacion Modificada","success");
  }
else
  {
  alert("Error al modificar la asignacion");
  }
}
