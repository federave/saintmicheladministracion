
function seleccionarTabMaquinas(n)
{
  var x = document.getElementsByName("liMaquinas");
  var y = document.getElementsByName("tabMaquinas");


  for (i = 0; i < x.length; i++) {
    x[i].className -= " active";
    y[i].style.display = "none";
  }

  x[n].className += " active";
  y[n].style.display = "block";






}
