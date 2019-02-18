
function seleccionarTabConfiguracion(n)
{

  var x = document.getElementsByName("liConfiguracion");
  var y = document.getElementsByName("tabConfiguracion");


  for (i = 0; i < x.length; i++) {
    x[i].className -= " active";
    y[i].style.display = "none";
  }

  x[n].className += " active";
  y[n].style.display = "block";






}
