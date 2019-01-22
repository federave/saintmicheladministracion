
function seleccionarTabPreciosProductos(n)
{

  var x = document.getElementsByName("liPreciosProductos");
  var y = document.getElementsByName("tabPreciosProductos");


  for (i = 0; i < x.length; i++) {
    x[i].className -= " active";
    y[i].style.display = "none";
  }

  x[n].className += " active";
  y[n].style.display = "block";






}
