
function seleccionarTabAlquileres(n)
{

  var x = document.getElementsByName("liAlquileres");
  var y = document.getElementsByName("tabAlquileres");

  var aux = true;
  if(n==1)
  {
  if(!(document.getElementById("idalquilersede").value>0))
    {
    aux=false;
    }
  }

  if(aux)
  {
    for (i = 0; i < x.length; i++) {
      x[i].className -= " active";
      y[i].style.display = "none";
    }

    x[n].className += " active";
    y[n].style.display = "block";

  }



}



function establecerPrecioEspecial()
{
var idalquiler = document.getElementById("idalquilersede").value;
var idsede = document.getElementById("idSede").value;
var precio = document.getElementById("precioespecialalquiler").value;
if(precio>0)
{
  precioespecialestablecido = precio;

  var requerimiento = new RequerimientoGet();
  requerimiento.setURL("sedes/alquileres/ajax/establecerPrecioEspecial.php");
  requerimiento.addParametro("idsede",idsede);
  requerimiento.addParametro("idalquiler",idalquiler);
  requerimiento.addParametro("precio",precio);
  requerimiento.addListener(respuestaEstablecerPrecioEspecial);
  requerimiento.ejecutar();
}
else
{
  alert("El precio debe ser mayor que 0");
}

}

var precioespecialestablecido;



function respuestaEstablecerPrecioEspecial(respuesta)
{
alert(respuesta.target.responseText);

xmlDoc = crearXML(respuesta.target.responseText);
var estado = xmlDoc.getElementsByTagName("Estado")[0].childNodes[0].nodeValue;

if(estado)
  {
  document.getElementById("labelPrecioAlquiler").innerHTML = "Precio: " + precioespecialestablecido;
  document.getElementById("labelEstadoPrecioEspecialAlquiler").innerHTML = "Precio Especial: Si";
  document.getElementById("alertaPrecioEspecialAlquiler").innerHTML = crearAlerta("Precio Especial Establecido!","success");


  }
else
  {
  alert("Error al cargar datos del alquiler");
  }

}
