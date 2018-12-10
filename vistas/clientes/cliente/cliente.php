
<html lang="es">


    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../general.css">
        <link rel="stylesheet" href="cliente.css">
        <script src="cliente.js"></script>

    </head>

    <body>


      <?php require '../../header/header.php' ?>
      <!-- Tabs -->


      <br>
      <br>

      <div class="row">
        <div class="text-center">
          <h1>Cliente ... </h1>
        </div>
      </div>
      <br>

      <div class="row" style="width:90%;margin-left:5%" >
        <ul class="nav nav-tabs">
          <li class="active"><a class="items" href="#" onclick="seleccionarTab(0)">Datos Principales</a></li>
          <li class="li"><a class="items" href="#" onclick="seleccionarTab(1)">Dirección</a></li>
          <li class="li"><a class="items" href="#" onclick="seleccionarTab(2)">Acuerdos</a></li>
          <li class="li"><a class="items" href="#" onclick="seleccionarTab(3)">Seguimiento</a></li>
        </ul>
      </div>

      <br>

      <div class="row divTab " style="display:block">

        <!-- Horizontal  -->
        <div class="row horizontalDP " style="margin-top:50px">
            <div class="column text-center" style="width:25%">
              <p>Nombre: <?php echo "Salazar" ?></p>
            </div>
            <div id="divModificarH" class="column" style="width:25%">
              <button class="btn" onclick="mostrarInputNombreH()" type="button" name="">Modificar</button>
              <script type="text/javascript">
                function mostrarInputNombreH()
                {
                document.getElementById("divInputNombreH").style.display = "Block";
                document.getElementById("divModificarH").style.display = "None";
                }
              </script>
            </div>

            <div id="divInputNombreH" class="column" style="width:75%;display:none">
              <div class="column" style="margin-left:5%">
                <input class="form-control" type="text" name="" value="">
              </div>
              <div class="column"style="margin-left:5%">
                <button class="btn" type="button" name="button">Modificar</button>
              </div>
              <div class="column"style="margin-left:15px">
                <button onclick="mostrarModificarH()" class="btn" type="button" name="button">Salir</button>
                <script type="text/javascript">
                  function mostrarModificarH()
                  {
                  document.getElementById("divInputNombreH").style.display = "None";
                  document.getElementById("divModificarH").style.display = "Block";
                  }
                </script>
              </div>
            </div>

        </div>

        <div class="row horizontalDP " style="margin-top:25px">
            <div class="column text-center" style="width:25%">
              <p>Apellido: <?php echo "Bennedeto" ?></p>
            </div>
            <div id="divModificarH" class="column" style="width:25%">
              <button class="btn" onclick="mostrarInputNombreH()" type="button" name="">Modificar</button>
              <script type="text/javascript">
                function mostrarInputNombreH()
                {
                document.getElementById("divInputNombreH").style.display = "Block";
                document.getElementById("divModificarH").style.display = "None";
                }
              </script>
            </div>

            <div id="divInputNombreH" class="column" style="width:75%;display:none">
              <div class="column" style="margin-left:5%">
                <input class="form-control" type="text" name="" value="">
              </div>
              <div class="column"style="margin-left:5%">
                <button class="btn" type="button" name="button">Modificar</button>
              </div>
              <div class="column"style="margin-left:15px">
                <button onclick="mostrarModificarH()" class="btn" type="button" name="button">Salir</button>
                <script type="text/javascript">
                  function mostrarModificarH()
                  {
                  document.getElementById("divInputNombreH").style.display = "None";
                  document.getElementById("divModificarH").style.display = "Block";
                  }
                </script>
              </div>
            </div>

        </div>


      </div>

      <div class="row divTab">
        <p><strong>Note:</strong>Direccion</p>
      </div>

      <div  class="row divTab">
        <p><strong>Note:</strong>Acuerdos</p>
      </div>

      <div  class="row divTab">
        <p><strong>Note:</strong>Seguimiento</p>
      </div>



      <!--
      <div class="container">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Datos Principales</a></li>
          <li><a href="#">Dirección</a></li>
          <li><a href="#">Acuerdos</a></li>
          <li><a href="#">Seguimiento</a></li>
        </ul>
      </div>
       -->

      <!-- ./Tabs -->


      <footer style="height:500px"></footer>





    </body>

</html>
