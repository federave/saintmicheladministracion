
function showTab(n,nombre)
{
// This function will display the specified tab of the form...
var x = document.getElementsByName("tab"+nombre);
x[n].style.display = "block";

//fix the Previous/Next buttons:
if (n == 0){document.getElementById("prevBtn"+nombre).style.display = "none";}
else{document.getElementById("prevBtn"+nombre).style.display = "inline";}
if (n == (x.length - 1)){document.getElementById("nextBtn"+nombre).innerHTML = "Guardar";}
else {document.getElementById("nextBtn"+nombre).innerHTML = "Siguiente";}

//run a function that will display the correct step indicator:
fixSteps(n,nombre);
}


function fixSteps(n,nombre)
{
// This function removes the "active" class of all steps...
var i, x = document.getElementsByName("step"+nombre);
for (i = 0; i < x.length; i++) {x[i].className = x[i].className.replace(" active", "");}
//... and adds the "active" class on the current step:
x[n].className += " active";
}
