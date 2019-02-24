




function showTabCondicionNueva(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByName("tabCondicionNueva");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtnCondicionNueva").style.display = "none";
  } else {
    document.getElementById("prevBtnCondicionNueva").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtnCondicionNueva").innerHTML = "Guardar";
  } else {
    document.getElementById("nextBtnCondicionNueva").innerHTML = "Siguiente";
  }
  //... and run a function that will display the correct step indicator:
  fixSteps(n)
}



function fixSteps(n)
{
// This function removes the "active" class of all steps...
var i, x = document.getElementsByName("stepCondicionNueva");
for (i = 0; i < x.length; i++) {x[i].className = x[i].className.replace(" active", "");}
//... and adds the "active" class on the current step:
x[n].className += " active";
}





function nextTabCondicionNueva(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByName("tabCondicionNueva");
  // Exit the function if any field in the current tab is invalid:

  if (n == 1 && !validateFormCondicionNueva()) return false;

  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...

  if (currentTab >= x.length) {



    //alert(x.length);


    var xml=new XML();

    xml.startTag("CondicionNueva");

    xml.addTag("Nombre",document.getElementById("nombreCondicionNueva").value);
    xml.addTag("MinimoTotal",document.getElementById("minimoTotalCondicionNueva").value);

    var numeroProductos = document.getElementById("numeroProductos").value;

    for(i=0;i<numeroProductos;i++)
    {
    if(document.getElementById("producto"+i+"CondicionNueva").checked)
      {
      xml.startTag("Producto");
        xml.addTag("IdProducto",document.getElementById("producto"+i+"CondicionNueva").value);
        xml.addTag("CantidadMinimaProducto",document.getElementById("cantidadMinimaProducto"+i+"CondicionNueva").value);
      xml.closeTag("Producto");
      }
    }






    xml.closeTag("CondicionNueva");


    document.getElementById("condicionNueva").value=xml.toString();


    alert(xml.toString());




    // ... the form gets submitted:
    document.getElementById("formularioCondicionNueva").submit();
    return false;
  }

  // Otherwise, display the correct tab:
  showTabCondicionNueva(currentTab);
}

function validateFormCondicionNueva() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByName("tabCondicionNueva");
  y = x[currentTab].getElementsByTagName("input");












  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByName("stepCondicionNueva")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}
