


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

  if (n == 1 && !validateFormPromocionNueva()) return false;

  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...

  if (currentTab >= x.length) {




    var xml=new XML();

    xml.startTag("Promocion");

    xml.addTag("Nombre",document.getElementById("nombrePromocionNueva").value);

    var numero = document.getElementById("numeroProductos").value;

    for(i=0;i<numero;i++)
    {
    if(document.getElementById("producto"+i+"PromocionNueva").checked)
      {
      xml.startTag("Producto");
        xml.addTag("IdProducto",document.getElementById("producto"+i+"PromocionNueva").value);
        xml.addTag("Cantidad",document.getElementById("cantidadProducto"+i+"PromocionNueva").value);
        xml.addTag("Bonificados",document.getElementById("bonificadosProducto"+i+"PromocionNueva").value);
      xml.closeTag("Producto");
      }
    }



    xml.closeTag("Promocion");


    document.getElementById("promocionNueva").value=xml.toString();


    alert(xml.toString());



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
  if(document.getElementById("nombrePromocionNueva").value=="")
    {
    valid=false;
    document.getElementById("nombrePromocionNueva").className += " invalid";
    }
  var n = document.getElementById("numeroProductos").value;

  var aux = false;
  for(i=0;i<n;i++)
    {
    if(document.getElementById("producto"+i+"PromocionNueva").checked)
      aux=true;
    }

  if(aux==false)
    {
    document.getElementById("alertaPromocionNueva").innerHTML = crearAlerta("Debe Seleccionar al menos un producto!","success");
    }

  valid&=aux;

  }



  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByName("stepPromocionNueva")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}
