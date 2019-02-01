
function seleccionarTabComodatos(n)
{

  var x = document.getElementsByName("liComodatos");
  var y = document.getElementsByName("tabComodatos");


  for (i = 0; i < x.length; i++) {
    x[i].className -= " active";
    y[i].style.display = "none";
  }

  x[n].className += " active";
  y[n].style.display = "block";






}
