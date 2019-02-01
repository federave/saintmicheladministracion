
function seleccionarTab(n)
{
  var x = document.getElementsByName("liProductos");
  var y = document.getElementsByName("tabProductos");


  for (i = 0; i < x.length; i++) {
    x[i].className -= " active";
    y[i].style.display = "none";
  }

  x[n].className += " active";
  y[n].style.display = "block";






}
