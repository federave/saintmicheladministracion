


function showTabPromocionNueva(n)
{
// This function will display the specified tab of the form...
var x = document.getElementsByName("tabPromocionNueva");
x[n].style.display = "block";

//fix the Previous/Next buttons:
if (n == 0){document.getElementById("prevBtnPromocionNueva").style.display = "none";}
else{document.getElementById("prevBtnPromocionNueva").style.display = "inline";}

if (n == (x.length - 1)){document.getElementById("nextBtnPromocionNueva").innerHTML = "Guardar";}
else {document.getElementById("nextBtnPromocionNueva").innerHTML = "Siguiente";}

//run a function that will display the correct step indicator:
fixSteps(n);
}


function fixSteps(n)
{
// This function removes the "active" class of all steps...
var i, x = document.getElementsByName("stepPromocionNueva");
for (i = 0; i < x.length; i++) {x[i].className = x[i].className.replace(" active", "");}
//... and adds the "active" class on the current step:
x[n].className += " active";
}



function nextTabPromocionNueva(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByName("tabPromocionNueva");
  // Exit the function if any field in the current tab is invalid:

  // if (n == 1 && !validateFormPromocionNueva()) return false;

  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...

  if (currentTab >= x.length) {


    /*
    //alert(x.length);


    var xml=new XML();

    xml.startTag("AcuerdoPreciosProductos");

    xml.addTag("Nombre",document.getElementById("nombreAcuerdoPreciosProductosNuevo").value);

    var numero = document.getElementById("numeroProductos").value;

    for(i=0;i<numero;i++)
    {

    if(document.getElementById("producto"+i+"AcuerdoPreciosProductosNuevo").checked)
      {
        xml.startTag("Producto");
          xml.addTag("IdProducto",document.getElementById("producto"+i+"AcuerdoPreciosProductosNuevo").value);
          xml.addTag("Precio",document.getElementById("precioProducto"+i+"AcuerdoPreciosProductosNuevo").value);
        xml.closeTag("Producto");
      }


    }


    xml.closeTag("AcuerdoPreciosProductos");


    document.getElementById("acuerdoNuevo").value=xml.toString();


    alert(xml.toString());

    */


    // ... the form gets submitted:
    document.getElementById("formularioPromocionNueva").submit();
    return false;
  }

  // Otherwise, display the correct tab:
  showTabPromocionNueva(currentTab);
}




function validateFormPromocionNueva() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByName("tabPromocionNueva");
  y = x[currentTab].getElementsByTagName("input");


  // Validación del Tab 1

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



  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByName("stepPromocionNueva")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}
