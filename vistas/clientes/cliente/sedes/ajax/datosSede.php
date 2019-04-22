<?php
session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$xml = new XML();
$xml->startTag("Respuesta");

if(isset($_GET["idcliente"]) && isset($_GET["idsede"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $idcliente=$_GET["idcliente"];
    $idsede=$_GET["idsede"];

    $sql = "SELECT * FROM sedes AS s INNER JOIN direcciones_sedes AS d_s ON s.id=d_s.idsede WHERE s.id='$idsede' AND s.idcliente='$idcliente'";
    $tabla = $conexion->query($sql);
    if($tabla->num_rows>0)
      {
      $row = $tabla->fetch_assoc();

      $xml->startTag("Sede");
        $xml->addTag("IdSede",$idsede);
        $xml->addTag("Nombre",$row["nombre"]);
        $xml->addTag("Telefono",$row["telefono"]);
        $xml->addTag("Observacion",$row["observacion"]);
        $xml->addTag("Email",$row["email"]);
        $xml->addTag("NombreResponsable",$row["nombreresponsable"]);
        $xml->addTag("ApellidoResponsable",$row["apellidoresponsable"]);
        $xml->addTag("IdTipoSede",$row["idtiposede"]);
        $xml->addTag("IdAsignacion",$row["idasignacion"]);
        $xml->addTag("IdTrabajador",$row["idtrabajador"]);

        $xml->addTag("Calle",$row["calle"]);
        $xml->addTag("Numero",$row["numero"]);
        $xml->addTag("Entre1",$row["entre1"]);
        $xml->addTag("Entre2",$row["entre2"]);
        $xml->addTag("Departamento",$row["departamento"]);
        $xml->addTag("Piso",$row["piso"]);
        $xml->addTag("IdPartido",$row["idpartido"]);
        $xml->addTag("IdZona",$row["idzona"]);
        $xml->addTag("EstadoLocalizacion",$row["estadolocalizacion"]);
        $xml->addTag("Latitud",$row["latitud"]);
        $xml->addTag("Longitud",$row["longitud"]);

        $sql = "SELECT * FROM sedes AS s INNER JOIN horarios_sedes AS h_s ON s.id=h_s.idsede WHERE s.id='$idsede' AND s.idcliente='$idcliente'";
        $tabla = $conexion->query($sql);

        if($tabla->num_rows>0)
          {
          $k=0;
          while($row = $tabla->fetch_assoc())
            {
            $xml->startTag("HorarioSede");
              $xml->addTag("IdHorario",$row["id"]);
              $xml->addTag("HoraInicioHorarioSede",$row["horainicio"]);
              $xml->addTag("HoraFinHorarioSede",$row["horafin"]);
            $xml->closeTag("HorarioSede");
            $k++;
            }
          $xml->addTag("NumeroHorarios",$k);
          }


          $sql = "SELECT * FROM recorridos_sedes as r_s WHERE r_s.idsede='$idsede'";
          $tabla = $conexion->query($sql);

          if($tabla->num_rows>0)
            {
            $k=0;
            while($row = $tabla->fetch_assoc())
              {
              $xml->startTag("RecorridoSede");
                $xml->addTag("IdDia",$row["iddia"]);
                $xml->addTag("IdTrabajadorRecorrido",$row["idtrabajador"]);
              $xml->closeTag("RecorridoSede");
              $k++;
              }
            $xml->addTag("NumeroRecorridos",$k);
            }



            //Alquileres
            escribir($idsede);
            $sql = "SELECT * FROM sedes_alquileres_actual as a WHERE a.idsede='$idsede'";
            $tabla = $conexion->query($sql);

            if($tabla!=null)
            {
              if($tabla->num_rows>0)
                {
                $xml->addTag("EstadoAlquiler",1);

                $row = $tabla->fetch_assoc();
                $xml->startTag("Alquiler");
                  $xml->addTag("IdAlquiler",$row["idalquiler"]);
                  $xml->addTag("FechaInicioAlquiler",$row["fechainicio"]);
                  if($row["especial"])
                    {
                    $xml->addTag("EspecialAlquiler",$row["especial"]);
                    $xml->addTag("PrecioEspecialAlquiler",$row["precioespecial"]);
                    }
                  else
                    {
                    $xml->addTag("EspecialAlquiler",0);
                    }



                $id = $row["idalquiler"];
                $sql = "SELECT * FROM alquileres AS a WHERE a.id='$id'";
                $tabla = $conexion->query($sql);

                if($tabla->num_rows>0)
                  {
                  $row = $tabla->fetch_assoc();
                  $xml->addTag("NombreAlquiler",$row["nombre"]);
                  $xml->addTag("FechaCreacionAlquiler",$row["fechacreacion"]);

                  $sql = "SELECT a.precio FROM alquileres_precios_actual AS a WHERE a.idalquiler='$id'";
                  $tabla = $conexion->query($sql);
                  $row = $tabla->fetch_assoc();
                  $xml->addTag("PrecioAlquiler",$row["precio"]);

                  $sql = "SELECT a_p.idproducto,a_p.cantidad,p.nombre FROM alquileres_productos AS a_p INNER JOIN productos as p ON a_p.idproducto = p.id WHERE a_p.idalquiler='$id'";
                  $tabla = $conexion->query($sql);

                  $xml->addTag("NumeroProductosAlquiler",$tabla->num_rows);

                  while($row = $tabla->fetch_assoc())
                    {
                    $xml->addTag("IdProductoAlquiler",$row["idproducto"]);
                    $xml->addTag("NombreProductoAlquiler",$row["nombre"]);
                    $xml->addTag("CantidadProductoAlquiler",$row["cantidad"]);
                    }

                  $sql = "SELECT a_m.idtipomaquina,a_m.cantidad,tm.tipo FROM alquileres_maquinas AS a_m INNER JOIN tiposmaquina as tm ON a_m.idtipomaquina = tm.id WHERE a_m.idalquiler='$id'";
                  $tabla = $conexion->query($sql);
                  $xml->addTag("NumeroMaquinasAlquiler",$tabla->num_rows);

                  while($row = $tabla->fetch_assoc())
                    {
                    $xml->addTag("IdTipoMaquinaAlquiler",$row["idtipomaquina"]);
                    $xml->addTag("NombreMaquinaAlquiler",$row["tipo"]);
                    $xml->addTag("CantidadMaquinaAlquiler",$row["cantidad"]);
                    }

                  $aux = true;

                  }



                $xml->closeTag("Alquiler");

                }
                else
                {
                  $xml->addTag("EstadoAlquiler",0);

                }

            }
            else
            {
              $xml->addTag("EstadoAlquiler",0);

            }






      $xml->closeTag("Sede");



      }




    $aux = true;

    $conector->cerrarConexion();
    }

  $xml->addTag("Estado",$aux);

  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }

$xml->closeTag("Respuesta");

echo $xml->toString();



?>
