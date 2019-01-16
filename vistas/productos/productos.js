
function seleccionarTab(n)
{
  var x = document.getElementsByTagName("li");
  var y = document.getElementsByClassName("divTab");


  for (i = 0; i < x.length; i++) {
    x[i].className -= " active";
    y[i].style.display = "none";
  }

  x[n].className += " active";
  y[n].style.display = "block";






}
