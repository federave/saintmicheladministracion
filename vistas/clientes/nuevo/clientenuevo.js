

function showTabClienteNuevo(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tabClienteNuevo");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtnClienteNuevo").style.display = "none";
  } else {
    document.getElementById("prevBtnClienteNuevo").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtnClienteNuevo").innerHTML = "Guardar";
  } else {
    document.getElementById("nextBtnClienteNuevo").innerHTML = "Siguiente";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicatorClienteNuevo(n)
}

function nextPrevClienteNuevo(n)
{
// This function will figure out which tab to display
var x = document.getElementsByClassName("tabClienteNuevo");
// Exit the function if any field in the current tab is invalid:
if (n == 1 && !validateFormClienteNuevo()) return false;
// Hide the current tab:
x[currentTab].style.display = "none";
// Increase or decrease the current tab by 1:
currentTab = currentTab + n;
// if you have reached the end of the form...


if(currentTab==4)
{
if(document.getElementById("asignacionEmpresa").checked)
  {
  document.getElementById("estadoDivRepartidoresDia").value="1";
  for (i = 1; i < 7; i++)
    {
    if(document.getElementById("dia"+i).checked)
      document.getElementById("divRepartidoresDia"+i).style.display="block";
    }
  }
else
  {
  document.getElementById("estadoDivRepartidoresDia").value="0";
  for (i = 1; i < 7; i++)
    {
    document.getElementById("divRepartidoresDia"+i).style.display="none";
    }
  }
}


if (currentTab >= x.length)
  {
  var xml = new XML();

  xml.startTag("ClienteNuevo");


    xml.addTag("Nombre",document.getElementById("nombre").value);
    xml.addTag("Telefono",document.getElementById("telefono").value);
    xml.addTag("Email",document.getElementById("email").value);
    xml.addTag("RazonSocial",document.getElementById("razonsocial").value);
    xml.addTag("Cuit",document.getElementById("cuit").value);
    xml.addTag("IdCondicionIva",document.getElementById("condicion").value);
    xml.addTag("IdTipoCliente",document.getElementById("tipoCliente").value);
    xml.addTag("IdRazonDeCompra",document.getElementById("razonDeCompra").value);


    ///Sede
    xml.addTag("NombreSede",document.getElementById("nombreSede").value);
    xml.addTag("TelefonoSede",document.getElementById("telefonoSede").value);
    xml.addTag("EmailSede",document.getElementById("emailSede").value);
    xml.addTag("ObservacionSede",document.getElementById("observacionSede").value);

    xml.addTag("NombreResponsableSede",document.getElementById("nombreResponsableSede").value);
    xml.addTag("ApellidoResponsableSede",document.getElementById("apellidoResponsableSede").value);

    var numeroHorarios = document.getElementById("numeroHorarios").value;

    for (i = 1; i <= numeroHorarios; i++)
      {
      xml.startTag("Horario");
        xml.addTag("HoraInicio",document.getElementById("horaInicio"+i).value);
        xml.addTag("HoraFin",document.getElementById("horaFin"+i).value);
      xml.closeTag("Horario");
      }









    ///Direccion
    xml.addTag("CalleSede",document.getElementById("calleSede").value);
    xml.addTag("NumeroSede",document.getElementById("numeroSede").value);
    xml.addTag("Entre1Sede",document.getElementById("entre1Sede").value);
    xml.addTag("Entre2Sede",document.getElementById("entre2Sede").value);
    xml.addTag("DepartamentoSede",document.getElementById("departamentoSede").value);
    xml.addTag("PisoSede",document.getElementById("pisoSede").value);
    xml.addTag("EstadoLocalizacionSede",document.getElementById("estadoLocalizacionSede").value);
    xml.addTag("LatitudSede",document.getElementById("latitudSede").value);
    xml.addTag("LongitudSede",document.getElementById("longitudSede").value);

    ///Asignacion

    if(document.getElementById("asignacionEmpresa").checked);
      {
      xml.addTag("IdAsignacion",1);
      }
    if(document.getElementById("asignacionRepartidor").checked)
      {
      xml.addTag("IdAsignacion",2);
      xml.addTag("IdRepartidorAsignacion",document.getElementById("repartidores").value);
      }
    if(document.getElementById("asignacionVendedor").checked)
      {
      xml.addTag("IdAsignacion",3);
      xml.addTag("IdVendedorAsignacion",document.getElementById("vendedores").value);
      }

    for (i = 1; i < 7; i++)
      {
      if(document.getElementById("dia"+i).checked)
        {
        xml.startTag("Dia");
          xml.addTag("IdDia",i);
          if(document.getElementById("asignacionEmpresa").checked)
            xml.addTag("IdRepartidor",document.getElementById("repartidoresDia"+i).value);
        xml.closeTag("Dia");
        }
      }
   xml.closeTag("ClienteNuevo");
   document.getElementById("clienteNuevo").value = xml.toString();
    // ... the form gets submitted:
    document.getElementById("formularioClienteNuevo").submit();
    return false;
  }

  // Otherwise, display the correct tab:
  showTabClienteNuevo(currentTab);
}

function validateFormClienteNuevo() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tabClienteNuevo");
  y = x[currentTab].getElementsByTagName("input");


  // Validacion del Tab 1 (Nombre)

  if(currentTab == 0)
  {
  if(document.getElementById("nombre").value == "")
    {
    valid = false;
    document.getElementById("nombre").className += " invalid";
    }

  }




  // Validacion del Tab 2 (NombreSede,ResponsableSede)


  if(currentTab == 1)
  {
  if(document.getElementById("nombreSede").value == "")
    {
    valid = false;
    document.getElementById("nombreSede").className += " invalid";
    }
  if(document.getElementById("nombreResponsableSede").value == "")
    {
    valid = false;
    document.getElementById("nombreResponsableSede").className += " invalid";
    }
  if(document.getElementById("numeroHorarios").value == "0")
    {
    valid = false;
    document.getElementById("horaInicio").className += " invalid";
    document.getElementById("horaFin").className += " invalid";

    }
  }



  // Validacion del Tab 3 (Calle,Numero)

  if(currentTab == 2)
  {

  if(document.getElementById("calleSede").value == "")
    {
    valid = false;
    document.getElementById("calleSede").className += " invalid";
    }
  if(document.getElementById("numeroSede").value == "")
    {
    valid = false;
    document.getElementById("numeroSede").className += " invalid";
    }


  }



  // Validacion del Tab 3 (Asignacion)

  if(currentTab == 3){}


  // Validacion del Tab 4 (Recorrido)

  if(currentTab == 4)
    {
    valid = false;
    for (i = 1; i < 7; i++){if(document.getElementById("dia"+i).checked){valid = true;}}
    }






  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("stepClienteNuevo")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicatorClienteNuevo(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("stepClienteNuevo");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
