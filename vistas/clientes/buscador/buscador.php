<?php
session_start();
?>



<html lang="es">


    <head>
        <title>Cliente ...</title>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../estilos/general.css">

        <link rel="stylesheet" href="buscador.css">
        <script src="buscador.js"></script>
        <script src="../../javascript/javascript.js"></script>
        <!-- Para las alertas  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!--        -->
    </head>

    <body>


      <?php require '../../header/header.php' ?>

      <!-- Tabs -->


      <br>
      <br>





      <div class="row contenedorbuscador">
        <div class="text-center">
          <h1>Buscar Clientes</h1>
        </div>
        <br>
        <br>
        <div class="row divbuscar">
          <div class="row text-center">
            <label for="dato" class="etiqueta">Ingresar Dato a Buscar</label>
            <input onkeyup="buscar()" style="color:black" placeholder=".........." type="text" id="dato">
          </div>
          <br>
          <br>

          <div class="row text-center">
            <button style="width:80%" class="btn btn-primary" id="" name="" onclick="limpiar()">Limpiar Busqueda</button>
          </div>
          <br>

        </div>

        <br>
        <br>

        <div class="row divclientes">
            <div class="text-center">
              <h2>Clientes Encontrados</h2>
            </div>
              <br>
            <ul id="listaclientes" class="list-group">
                <li class="list-group-item">
                </li>
           </ul>
        </div>


        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

      </div>







      <br>





      <footer style="height:500px"></footer>





    </body>

</html>
