<?php

include_once('../../modelo/otros.php');
include_once('../../modelo/usuarios/usuario.php');

if(verificarUsuario())
  {
  redirect('../../index.php');
  }
else
  {
  redirect('../../vistas/errores/errorusuario.php');
  }


?>
