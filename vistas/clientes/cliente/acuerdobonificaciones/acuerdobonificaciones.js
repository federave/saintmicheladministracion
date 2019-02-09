
function seleccionarTabAcuerdoBonificaciones(n)
{

  var x = document.getElementsByName("liAcuerdoBonificaciones");
  var y = document.getElementsByName("tabAcuerdoBonificaciones");


  for (i = 0; i < x.length; i++) {
    x[i].className -= " active";
    y[i].style.display = "none";
  }

  x[n].className += " active";
  y[n].style.display = "block";






}
