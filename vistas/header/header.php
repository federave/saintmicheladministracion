

<link rel="stylesheet" href="<?php echo $_SESSION["carpeta"] ?>/vistas/header/header.css">

<div class="header">
  <a href="<?php echo $_SESSION["carpeta"] ?>/index.php" class="logo">Menu Inicial</a>
  <div class="header-right">
    <p>Usuario: <?php echo $_SESSION["usuario"];?></p>
    <a class="logo" href="<?php echo $_SESSION["carpeta"] ?>/controladores/login/salir.php">Cerrar Seción</a>
  </div>
</div>

<div style="padding:40px;margin-bottom:25px" class="text-center ">
  <h1 class="titulo" style="font-family:Helvetica;color: white;"> Saint Michel </h1>
</div>

<input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["usuario"] ?>">
<input type="hidden" name="password" id="password" value="<?php echo $_SESSION["password"] ?>">
