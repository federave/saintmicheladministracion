

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

function nextPrevClienteNuevo(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tabClienteNuevo");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateFormClienteNuevo()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...

  if (currentTab >= x.length) {
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

  // Validacion del Tab 2 (Calle,Numero)


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
    for (i = 0; i < 6; i++){if(document.getElementById("dia"+i).checked){valid = true;}}
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
