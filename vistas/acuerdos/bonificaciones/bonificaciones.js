
function seleccionarTabBonificaciones(n)
{


  var x = document.getElementsByName("liBonificaciones");
  var y = document.getElementsByName("tabBonificaciones");


  for (i = 0; i < x.length; i++) {
    x[i].className -= " active";
    y[i].style.display = "none";
  }

  x[n].className += " active";
  y[n].style.display = "block";

}
