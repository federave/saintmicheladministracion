

function seleccionarTab(n,nombre)
{
var x = document.getElementsByName("li"+nombre);
var y = document.getElementsByName("tab"+nombre);

for (i = 0; i < x.length; i++)
  {
  x[i].className -= " active";
  y[i].style.display = "none";
  }

x[n].className += " active";
y[n].style.display = "block";
}
