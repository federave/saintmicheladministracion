


function nextTabComodatoNuevo(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByName("tabComodatoNuevo");
  // Exit the function if any field in the current tab is invalid:

  if (n == 1 && !validateFormComodatoNuevo()) return false;

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

    var numeroCondiciones = document.getElementById("numeroCondiciones").value;

    for(i=0;i<numeroCondiciones;i++)
    {
    if(document.getElementById("condicion"+i+"ComodatoNuevo").checked)
      {
      xml.startTag("Condicion");
        xml.addTag("IdCondicion",document.getElementById("condicion"+i+"ComodatoNuevo").value);
      xml.closeTag("Condicion");
      }
    }

    var numeroMaquinas = document.getElementById("numeroMaquinas").value;

    for(i=0;i<numeroMaquinas;i++)
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
  showTab(currentTab,"ComodatoNuevo");
}

function validateFormComodatoNuevo() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByName("tabComodatoNuevo");
  y = x[currentTab].getElementsByTagName("input");


  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByName("stepComodatoNuevo")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}
