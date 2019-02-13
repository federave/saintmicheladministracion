




function showTabAcuerdoPreciosProductosNuevo(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tabAcuerdoPreciosProductosNuevo");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtnAcuerdoPreciosProductosNuevo").style.display = "none";
  } else {
    document.getElementById("prevBtnAcuerdoPreciosProductosNuevo").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtnAcuerdoPreciosProductosNuevo").innerHTML = "Guardar";
  } else {
    document.getElementById("nextBtnAcuerdoPreciosProductosNuevo").innerHTML = "Siguiente";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicatorAcuerdoPreciosProductosNuevo(n)
}

function nextPrevAcuerdoPreciosProductosNuevo(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tabAcuerdoPreciosProductosNuevo");
  // Exit the function if any field in the current tab is invalid:

  // if (n == 1 && !validateFormAcuerdoPreciosProductosNuevo()) return false;

  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...

  if (currentTab >= x.length) {



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




    // ... the form gets submitted:
    document.getElementById("formularioAcuerdoPreciosProductosNuevo").submit();
    return false;
  }

  // Otherwise, display the correct tab:
  showTabAcuerdoPreciosProductosNuevo(currentTab);
}

function validateFormAcuerdoPreciosProductosNuevo() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tabAcuerdoPreciosProductosNuevo");
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
    document.getElementsByClassName("stepAcuerdoPreciosProductosNuevo")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicatorAcuerdoPreciosProductosNuevo(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("stepAcuerdoPreciosProductosNuevo");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
