




function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...

  if (currentTab >= x.length) {



      var xml=new XML();

      xml.startTag("Producto");

      xml.addTag("Nombre",document.getElementById("nombre").value);
      xml.addTag("Litros",document.getElementById("litros").value);



      if(document.getElementById("tipoproducto0").checked)
        {
        xml.addTag("IdTipoProducto",document.getElementById("tipoproducto0").value);
        }
      else
        {
        xml.addTag("IdTipoProducto",document.getElementById("tipoproducto1").value);
        }


      var numero = document.getElementById("numeroInsumos").value;
      var k = 0;

      for(i=0;i<numero;i++)
      {
      if(document.getElementById("insumo"+i).checked)
        {
        xml.startTag("Insumo");
          xml.addTag("IdInsumo",document.getElementById("insumo"+i).value);
        xml.closeTag("Insumo");
        }
      }


      xml.closeTag("Producto");

      document.getElementById("productonuevo").value = xml.toString();

      alert(xml.toString());

    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }

  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");


  // Validacion del Tab 1 (Nombre, Apellido, Telefono)

  if(currentTab == 0)
  {
  if(document.getElementById("nombre").value=="")
    {
    document.getElementById("nombre").className+=" invalid";
    valid=false;
    }
  if(!(document.getElementById("litros").value>0))
    {
    document.getElementById("litros").className+=" invalid";
    valid=false;
    }

  }



  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
