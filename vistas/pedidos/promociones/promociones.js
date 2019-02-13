
function seleccionarTabPromociones(n)
{

  var x = document.getElementsByName("liPromociones");
  var y = document.getElementsByName("tabPromociones");


  for (i = 0; i < x.length; i++) {
    x[i].className -= " active";
    y[i].style.display = "none";
  }

  x[n].className += " active";
  y[n].style.display = "block";






}
