
function seleccionarTabModificarCliente(n)
{


  var x = document.getElementsByName("liModificarCliente");
  var y = document.getElementsByName("divTabModificarCliente");





  for (i = 0; i < x.length; i++) {
    x[i].className -= " active";
    y[i].style.display = "none";
  }

  x[n].className += " active";
  y[n].style.display = "block";






}
