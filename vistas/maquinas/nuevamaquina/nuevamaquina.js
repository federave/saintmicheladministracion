




function showTabMaquina(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tabMaquina");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtnMaquina").style.display = "none";
  } else {
    document.getElementById("prevBtnMaquina").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtnMaquina").innerHTML = "Guardar";
  } else {
    document.getElementById("nextBtnMaquina").innerHTML = "Siguiente";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicatorMaquina(n)
}

function nextPrevMaquina(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tabMaquina");
  // Exit the function if any field in the current tab is invalid:
   if (n == 1 && !validateFormMaquina()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...

  if (currentTab >= x.length) {






        var xml=new XML();

        xml.startTag("Maquina");

        xml.addTag("Nombre",document.getElementById("nombreMaquinaNueva").value);
        xml.addTag("Marca",document.getElementById("marcaMaquinaNueva").value);
        xml.addTag("Capacidad",document.getElementById("capacidadMaquinaNueva").value);
      //  xml.addTag("IdTipoMaquina",document.getElementById("tipoMaquina").value);

        xml.addTag("IdTipoMaquina",1);




        xml.closeTag("Maquina");


        document.getElementById("maquinaNueva").value=xml.toString();


      








    // ... the form gets submitted:
    document.getElementById("formularioMaquina").submit();
    return false;
  }

  // Otherwise, display the correct tab:
  showTabMaquina(currentTab);
}

function validateFormMaquina() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tabMaquina");
  y = x[currentTab].getElementsByTagName("input");



  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("stepMaquina")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicatorMaquina(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("stepMaquina");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
