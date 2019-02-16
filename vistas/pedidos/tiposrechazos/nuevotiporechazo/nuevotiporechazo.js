


function showTabTipoRechazoNuevo(n)
{
// This function will display the specified tab of the form...
var x = document.getElementsByName("tabTipoRechazoNuevo");
x[n].style.display = "block";

//fix the Previous/Next buttons:
if (n == 0){document.getElementById("prevBtnTipoRechazoNuevo").style.display = "none";}
else{document.getElementById("prevBtnTipoRechazoNuevo").style.display = "inline";}

if (n == (x.length - 1)){document.getElementById("nextBtnTipoRechazoNuevo").innerHTML = "Guardar";}
else {document.getElementById("nextBtnTipoRechazoNuevo").innerHTML = "Siguiente";}

//run a function that will display the correct step indicator:
fixSteps(n);
}


function fixSteps(n)
{
// This function removes the "active" class of all steps...
var i, x = document.getElementsByName("stepTipoRechazoNuevo");
for (i = 0; i < x.length; i++) {x[i].className = x[i].className.replace(" active", "");}
//... and adds the "active" class on the current step:
x[n].className += " active";
}



function nextTabTipoRechazoNuevo(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByName("tabTipoRechazoNuevo");
  // Exit the function if any field in the current tab is invalid:

  if (n == 1 && !validateFormTipoRechazoNuevo()) return false;

  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...

  if (currentTab >= x.length) {






    // ... the form gets submitted:
    document.getElementById("formularioTipoRechazoNuevo").submit();
    return false;
  }

  // Otherwise, display the correct tab:
  showTabTipoRechazoNuevo(currentTab);
}




function validateFormTipoRechazoNuevo() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByName("tabTipoRechazoNuevo");
  y = x[currentTab].getElementsByTagName("input");


  // Validación del Tab 1

  if(currentTab == 0)
  {
  if(document.getElementById("nombre").value=="")
    {
    valid=false;
    document.getElementById("nombre").className += " invalid";
    }
  }



  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByName("stepTipoRechazoNuevo")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}
