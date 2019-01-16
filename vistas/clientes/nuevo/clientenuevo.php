<?php
session_start();
$_SESSION["raiz"] = $_SERVER["DOCUMENT_ROOT"] . '/saintmicheladministracion';
?>

<html lang="en">
<head>
  <title>Saint Michel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../header/header.css">
  <link rel="stylesheet" href="../../general.css">
  <link rel="stylesheet" href="../../estilos/radiobutton.css">
  <link rel="stylesheet" href="../../estilos/checkbox.css">

  <link rel="stylesheet" href="clientenuevo.css">
  <script src="clientenuevo.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

</head>
<body>


<?php require '../../header/header.php'; ?>










<div class="row" style="width:100%">

  <form class="regForm" id="regForm" action="../../../controladores/clientes/clienteNuevo.php">
    <h1>Cliente Nuevo</h1>
    <br>
    <h4>Datos Basicos</h4>
    <br>

    <!-- One "tab" for each step in the form: -->
    <div class="tab">
      <p><input placeholder="Nombre ..." oninput="this.className = ''" name="nombre" id="nombre"></p>
      <p><input placeholder="Apellido ..." oninput="this.className = ''" name="lname"></p>
      <p><input placeholder="Telefono ..." oninput="this.className = ''" name="lname"></p>

    </div>





    <div class="tab">
      <h5>Dirección</h5>

      <?php require 'buscador/buscador.php'; ?>
      <br>
      <br>

    </div>


    <div class="tab">
      <h5>Dirección Mas Detalles</h5>
      <p style="color:black">Entre</p>
      <p><input placeholder="Calle 1" oninput="this.className = ''" name="entre1" id="entre1"></p>
      <p style="color:black">Y</p>
      <p><input placeholder="Calle 2" oninput="this.className = ''" name="entre2" id="entre2"></p>
      <p><input placeholder="Departamento" oninput="this.className = ''" name="departamento" id="departamento"></p>
      <p><input placeholder="Piso" oninput="this.className = ''" name="piso" id="piso"></p>

      <br>
      <br>


    </div>


        <div class="tab">Asignación:

          <h4>Asignar Cliente a :</h4>

          <div class="funkyradio">
           <div class="funkyradio-info">
               <input checked type="radio" name="radio" id="radio1" value="1" onclick="mostrarDiv(radio1.value)"/>
               <label for="radio1" style="color:black">Empresa</label>
           </div>
           <div class="funkyradio-info">
               <input type="radio" name="radio" id="radio2" value="2" onclick="mostrarDiv(radio2.value)"/>
               <label for="radio2" style="color:black">Repartidor</label>

               <div class="form-group" id="divRepartidores" style="margin-top:10px;display:none">
                 <label for="sel1" style="color:black">Seleccionar</label>
                 <select placeholder="" class="form-control" id="repartidores">
                   <option>Javier</option>
                   <option>Narciso</option>
                   <option>Gustavo</option>
                   <option>Emanuel</option>
                 </select>
               </div>
           </div>
           <div class="funkyradio-info" >
               <input type="radio" name="radio" id="radio3" value="3" onclick="mostrarDiv(radio3.value)"/>
               <label for="radio3" style="color:black">Vendedor</label>
               <div class="form-group" id="divVendedores" style="margin-top:10px;display:none">
                 <label for="sel1" style="color:black">Seleccionar</label>
                 <select placeholder="" class="form-control" id="vendedores">
                   <option>Ricardo</option>
                   <option>Marilina</option>
                 </select>
               </div>
           </div>

         </div>

              <script type="text/javascript">


              function mostrarDiv(valor)
              {

              if(valor == 1)
               {
               document.getElementById("divRepartidores").style.display = "none";
               document.getElementById("divVendedores").style.display = "none";
               }
               else if(valor == 2)
                {
                document.getElementById("divRepartidores").style.display = "block";
                document.getElementById("divVendedores").style.display = "none";
                }
                else if(valor == 3)
                 {
                 document.getElementById("divRepartidores").style.display = "none";
                 document.getElementById("divVendedores").style.display = "block";
                 }
                 else{}
              }


              </script>

         <br>
         <br>



        </div>



        <div class="tab">

          <h5>Recorrido</h5>

          <div class="funkyradio">
            <div class="funkyradio-info">
                <input type="checkbox" name="checkbox" id="lunes"/>
                <label for="lunes" style="color:black">Lunes</label>
            </div>
            <div class="funkyradio-info">
                <input type="checkbox" name="checkbox" id="martes"/>
                <label for="martes" style="color:black">Martes</label>
            </div>
            <div class="funkyradio-info">
                <input type="checkbox" name="checkbox" id="miercoles"/>
                <label for="miercoles" style="color:black">Miercoles</label>
            </div>
            <div class="funkyradio-info">
                <input type="checkbox" name="checkbox" id="jueves"/>
                <label for="jueves" style="color:black">Jueves</label>
            </div>
            <div class="funkyradio-info">
                <input type="checkbox" name="checkbox" id="viernes"/>
                <label for="viernes" style="color:black">Viernes</label>
            </div>
            <div class="funkyradio-info">
                <input type="checkbox" name="checkbox" id="sabado"/>
                <label for="sabado" style="color:black">Sábado</label>
            </div>

            <br>
            <br>

        </div>

       </div>





    <div style="overflow:auto;">
      <div style="float:right;">
        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
      </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
    </div>
  </form>
</div>






<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab
</script>











<div class="text-center" style="margin-bottom:0;height:500px;padding:20px;">
  <p>Footer</p>
</div>

</body>
</html>
