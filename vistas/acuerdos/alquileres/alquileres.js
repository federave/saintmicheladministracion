
function seleccionarTabAlquileres(n)
{

  var x = document.getElementsByName("liAlquileres");
  var y = document.getElementsByName("tabAlquileres");


  for (i = 0; i < x.length; i++) {
    x[i].className -= " active";
    y[i].style.display = "none";
  }

  x[n].className += " active";
  y[n].style.display = "block";






}
