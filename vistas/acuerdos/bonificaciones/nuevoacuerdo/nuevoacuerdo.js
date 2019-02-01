




function showTabAcuerdoBonificacionesNuevo(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tabAcuerdoBonificacionesNuevo");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtnAcuerdoBonificacionesNuevo").style.display = "none";
  } else {
    document.getElementById("prevBtnAcuerdoBonificacionesNuevo").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtnAcuerdoBonificacionesNuevo").innerHTML = "Guardar";
  } else {
    document.getElementById("nextBtnAcuerdoBonificacionesNuevo").innerHTML = "Siguiente";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicatorAcuerdoBonificacionesNuevo(n)
}

function nextPrevAcuerdoBonificacionesNuevo(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tabAcuerdoBonificacionesNuevo");
  // Exit the function if any field in the current tab is invalid:

  // if (n == 1 && !validateFormAcuerdoBonificacionesNuevo()) return false;

  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...

  if (currentTab >= x.length) {



    //alert(x.length);


    var xml=new XML();

    xml.startTag("AcuerdoBonificaciones");

    xml.addTag("Nombre",document.getElementById("nombreAcuerdoBonificacionesNuevo").value);

    var numero = document.getElementById("numeroBonificaciones").value;
    for(i=0;i<numero;i++)
    {

    if(document.getElementById("bonificacion"+i+"AcuerdoBonificacionesNuevo").checked)
      {
        xml.startTag("Bonificacion");
          xml.addTag("IdBonificacion",document.getElementById("bonificacion"+i+"AcuerdoBonificacionesNuevo").value);
        xml.closeTag("Bonificacion");
      }


    }


    xml.closeTag("AcuerdoBonificaciones");


    document.getElementById("acuerdoBonificacionesNuevo").value=xml.toString();


    //alert(xml.toString());




    // ... the form gets submitted:
    document.getElementById("regFormAcuerdoBonificacionesNuevo").submit();
    return false;
  }

  // Otherwise, display the correct tab:
  showTabAcuerdoBonificacionesNuevo(currentTab);
}

function validateFormAcuerdoBonificacionesNuevo() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tabAcuerdoBonificacionesNuevo");
  y = x[currentTab].getElementsByTagName("input");


  // Validacion del Tab 1 (Nombre, Apellido, Telefono)

  if(currentTab == 0)
  {
    for (i = 0; i < y.length; i++) {
      // If a field is empty...


        if (y[i].value == "" && y[i].name == "nombre") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }

    }

  }

  // Validacion del Tab 2 (Localizacion)


  if(currentTab == 1)
  {
    for (i = 0; i < y.length; i++) {
      // If a field is empty...

        if (y[i].value == "0" && y[i].name == "estadodireccion") {
          // and set the current valid status to false
          valid = false;

          document.getElementById("direccion").className += " invalid";

        }

    }

  }



    // Validacion del Tab 5 (Recorrido)



      if(currentTab == 4)
      {

        valid = false;

        for (i = 0; i < y.length; i++) {
          // If a field is empty...

            if (y[i].name == "checkbox" && y[i].checked) {
              // and set the current valid status to false
              valid = true;


            }

        }

      }






  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("stepAcuerdoBonificacionesNuevo")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicatorAcuerdoBonificacionesNuevo(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("stepAcuerdoBonificacionesNuevo");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
