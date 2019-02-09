

function showTabSedeNueva(n) {



  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tabSedeNueva");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtnSedeNueva").style.display = "none";
  } else {
    document.getElementById("prevBtnSedeNueva").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtnSedeNueva").innerHTML = "Guardar";
  } else {
    document.getElementById("nextBtnSedeNueva").innerHTML = "Siguiente";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicatorSedeNueva(n)
}

function nextPrevSedeNueva(n)
{

// This function will figure out which tab to display
var x = document.getElementsByClassName("tabSedeNueva");
// Exit the function if any field in the current tab is invalid:
if (n == 1 && !validateFormSedeNueva()) return false;
// Hide the current tab:
x[currentTab].style.display = "none";
// Increase or decrease the current tab by 1:
currentTab = currentTab + n;
// if you have reached the end of the form...




if(currentTab==3)
{
if(document.getElementById("asignacionEmpresaNS").checked)
  {
  document.getElementById("estadoDivRepartidoresDiaNS").value="1";
  for (i = 1; i < 7; i++)
    {
    if(document.getElementById("diaNS"+i).checked)
      document.getElementById("divRepartidoresDiaNS"+i).style.display="block";
    }
  }
else
  {
  document.getElementById("estadoDivRepartidoresDiaNS").value="0";
  for (i = 1; i < 7; i++)
    {
    document.getElementById("divRepartidoresDiaNS"+i).style.display="none";
    }
  }
}



if (currentTab >= x.length)
  {
  var xml = new XML();

  xml.startTag("Sede");


    xml.addTag("IdCliente",document.getElementById("idCliente").value);


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

    if(document.getElementById("asignacionEmpresaNS").checked);
      {
      xml.addTag("IdAsignacion",1);
      }
    if(document.getElementById("asignacionRepartidorNS").checked)
      {
      xml.addTag("IdAsignacion",2);
      xml.addTag("IdRepartidorAsignacion",document.getElementById("repartidoresNS").value);
      }
    if(document.getElementById("asignacionVendedorNS").checked)
      {
      xml.addTag("IdAsignacion",3);
      xml.addTag("IdVendedorAsignacion",document.getElementById("vendedoresNS").value);
      }

    for (i = 1; i < 7; i++)
      {
      if(document.getElementById("diaNS"+i).checked)
        {
        xml.startTag("Dia");
          xml.addTag("IdDia",i);
          if(document.getElementById("asignacionEmpresaNS").checked)
            xml.addTag("IdRepartidor",document.getElementById("repartidoresDiaNS"+i).value);
        xml.closeTag("Dia");
        }
      }
   xml.closeTag("Sede");
   document.getElementById("sedeNueva").value = xml.toString();


    // ... the form gets submitted:
    document.getElementById("formularioSedeNueva").submit();
    return false;
  }


  // Otherwise, display the correct tab:
  showTabSedeNueva(currentTab);
}

function validateFormSedeNueva() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tabSedeNueva");
  y = x[currentTab].getElementsByTagName("input");


  // Validacion del Tab 2 (NombreSede,ResponsableSede)


  if(currentTab == 0)
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

  if(currentTab == 1)
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

  if(currentTab == 2){}


  // Validacion del Tab 4 (Recorrido)

  if(currentTab == 3)
    {
    valid = false;
    for (i = 1; i < 7; i++){if(document.getElementById("diaNS"+i).checked){valid = true;}}
    }

  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("stepSedeNueva")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicatorSedeNueva(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("stepSedeNueva");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
