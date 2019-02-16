
function seleccionarTabTiposRechazos(n)
{

  var x = document.getElementsByName("liTiposRechazos");
  var y = document.getElementsByName("tabTiposRechazos");


  for (i = 0; i < x.length; i++) {
    x[i].className -= " active";
    y[i].style.display = "none";
  }

  x[n].className += " active";
  y[n].style.display = "block";






}
