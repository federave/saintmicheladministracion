




function showTabComodatoNuevo(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tabComodatoNuevo");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtnComodatoNuevo").style.display = "none";
  } else {
    document.getElementById("prevBtnComodatoNuevo").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtnComodatoNuevo").innerHTML = "Guardar";
  } else {
    document.getElementById("nextBtnComodatoNuevo").innerHTML = "Siguiente";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicatorComodatoNuevo(n)
}

function nextPrevComodatoNuevo(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tabComodatoNuevo");
  // Exit the function if any field in the current tab is invalid:

  // if (n == 1 && !validateFormComodatoNuevo()) return false;

  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...

  if (currentTab >= x.length) {



    //alert(x.length);


    var xml=new XML();

    xml.startTag("ComodatoNuevo");

    xml.addTag("Nombre",document.getElementById("nombreComodatoNuevo").value);

    var numeroProductos = document.getElementById("numeroProductos").value;

    for(i=0;i<numeroProductos;i++)
    {
    if(document.getElementById("producto"+i+"ComodatoNuevo").checked)
      {
      xml.startTag("Producto");
        xml.addTag("IdProducto",document.getElementById("producto"+i+"ComodatoNuevo").value);
        xml.addTag("CantidadMinimaProducto",document.getElementById("cantidadMinimaProducto"+i+"ComodatoNuevo").value);
      xml.closeTag("Producto");
      }
    }

    var numeroMaquinas = document.getElementById("numeroMaquinas").value;

    for(i=0;i<numeroProductos;i++)
    {
    if(document.getElementById("maquina"+i+"ComodatoNuevo").checked)
      {
      xml.startTag("Maquina");
        xml.addTag("IdMaquina",document.getElementById("maquina"+i+"ComodatoNuevo").value);
        xml.addTag("CantidadMaquina",document.getElementById("cantidadMaquina"+i+"ComodatoNuevo").value);
      xml.closeTag("Maquina");
      }
    }




    xml.closeTag("ComodatoNuevo");


    document.getElementById("comodatoNuevo").value=xml.toString();


    alert(xml.toString());




    // ... the form gets submitted:
    document.getElementById("formularioComodatoNuevo").submit();
    return false;
  }

  // Otherwise, display the correct tab:
  showTabComodatoNuevo(currentTab);
}

function validateFormComodatoNuevo() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tabComodatoNuevo");
  y = x[currentTab].getElementsByTagName("input");












  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("stepComodatoNuevo")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicatorComodatoNuevo(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("stepComodatoNuevo");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
