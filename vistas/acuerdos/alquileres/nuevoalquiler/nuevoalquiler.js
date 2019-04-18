




function nextTabAlquilerNuevo(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByName("tabAlquilerNuevo");
  // Exit the function if any field in the current tab is invalid:

  if (n == 1 && !validateFormAlquilerNuevo()) return false;

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

    for(i=0;i<numeroMaquinas;i++)
    {
    if(document.getElementById("maquina"+i+"AlquilerNuevo").checked)
      {
      xml.startTag("Maquina");
        xml.addTag("IdTipoMaquina",document.getElementById("maquina"+i+"AlquilerNuevo").value);
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
  showTab(currentTab,"AlquilerNuevo");
}

function validateFormAlquilerNuevo() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByName("tabAlquilerNuevo");
  y = x[currentTab].getElementsByTagName("input");


  if(document.getElementById("nombreAlquilerNuevo").value=="")
  {
  valid=false;
  document.getElementById("nombreAlquilerNuevo").className += " invalid";
  }

  if(document.getElementById("precioAlquilerNuevo").value=="")
  {
  valid=false;
  document.getElementById("precioAlquilerNuevo").className += " invalid";
  }


  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByName("stepAlquilerNuevo")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}
