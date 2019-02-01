




function showTabAlquilerNuevo(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tabAlquilerNuevo");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtnAlquilerNuevo").style.display = "none";
  } else {
    document.getElementById("prevBtnAlquilerNuevo").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtnAlquilerNuevo").innerHTML = "Guardar";
  } else {
    document.getElementById("nextBtnAlquilerNuevo").innerHTML = "Siguiente";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicatorAlquilerNuevo(n)
}

function nextPrevAlquilerNuevo(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tabAlquilerNuevo");
  // Exit the function if any field in the current tab is invalid:

  // if (n == 1 && !validateFormAlquilerNuevo()) return false;

  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...

  if (currentTab >= x.length) {



    //alert(x.length);


    var xml=new XML();

    xml.startTag("AlquilerNuevo");


    xml.addTag("Nombre",document.getElementById("nombreAlquilerNuevo").value);
    xml.addTag("Precio",document.getElementById("precioAlquilerNuevo").value);




    var numeroProductos = document.getElementById("numeroProductos").value;

    for(i=0;i<numeroProductos;i++)
    {
    if(document.getElementById("producto"+i+"AlquilerNuevo").checked)
      {
      xml.startTag("Producto");
        xml.addTag("IdProducto",document.getElementById("producto"+i+"AlquilerNuevo").value);
        xml.addTag("CantidadProducto",document.getElementById("cantidadProducto"+i+"AlquilerNuevo").value);
      xml.closeTag("Producto");
      }
    }

    var numeroMaquinas = document.getElementById("numeroMaquinas").value;

    for(i=0;i<numeroProductos;i++)
    {
    if(document.getElementById("maquina"+i+"AlquilerNuevo").checked)
      {
      xml.startTag("Maquina");
        xml.addTag("IdMaquina",document.getElementById("maquina"+i+"AlquilerNuevo").value);
        xml.addTag("CantidadMaquina",document.getElementById("cantidadMaquina"+i+"AlquilerNuevo").value);
      xml.closeTag("Maquina");
      }
    }




    xml.closeTag("AlquilerNuevo");


    document.getElementById("alquilerNuevo").value=xml.toString();


    alert(xml.toString());




    // ... the form gets submitted:
    document.getElementById("formularioAlquilerNuevo").submit();
    return false;
  }

  // Otherwise, display the correct tab:
  showTabAlquilerNuevo(currentTab);
}

function validateFormAlquilerNuevo() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tabAlquilerNuevo");
  y = x[currentTab].getElementsByTagName("input");












  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("stepAlquilerNuevo")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicatorAlquilerNuevo(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("stepAlquilerNuevo");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
