<?php
session_start();
include_once('../../modelo/otros.php');
include_once('../../modelo/usuarios/usuario.php');

if(verificarUsuario())
  {
  $_SESSION["usuario"] = null;
  $_SESSION["password"] = null;
  redirect('../../index.php');
  }
else
  {
  redirect('../../vistas/errores/errorusuario.php');
  }

?>
