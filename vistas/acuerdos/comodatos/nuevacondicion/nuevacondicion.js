






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



    // ... the form gets submitted:
    document.getElementById("formularioCondicionNueva").submit();
    return false;
  }

  // Otherwise, display the correct tab:
  showTab(currentTab,"CondicionNueva");
}

function validateFormCondicionNueva() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByName("tabCondicionNueva");
  y = x[currentTab].getElementsByTagName("input");

  var numeroProductos = document.getElementById("numeroProductos").value;
  var estadoProductos = false;
  var minimototalproductos=0;
  for(i=0;i<numeroProductos;i++)
  {
  if(document.getElementById("producto"+i+"CondicionNueva").checked)
    {
    estadoProductos = true;
    minimototalproductos=document.getElementById("cantidadMinimaProducto"+i+"CondicionNueva").value;
    }
  }

  if(document.getElementById("nombreCondicionNueva").value=="")
    {
    valid=false;
    document.getElementById("nombreCondicionNueva").className+=" invalid";
    }
  if(!(document.getElementById("minimoTotalCondicionNueva").value>0))
    {
    valid=false;
    document.getElementById("minimoTotalCondicionNueva").className+=" invalid";
    }
  if(estadoProductos==false)
    {
    valid=false;
    document.getElementById("alertaCondicionNueva").innerHTML = crearAlerta("Debe Seleccionar Productos!","success");
    }
  else
    {
    if(document.getElementById("minimoTotalCondicionNueva").value < minimototalproductos)
      {
      valid=false;
      document.getElementById("alertaCondicionNueva").innerHTML = crearAlerta("La suma de las cantidades mínimas de los productos <br> no puede ser mayor que el mínimo total","success");
      }
    }

  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByName("stepCondicionNueva")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}
