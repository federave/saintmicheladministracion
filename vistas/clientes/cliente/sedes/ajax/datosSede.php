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

            $sql = "SELECT * FROM alquileres_sedes_actual as r_s WHERE r_s.idsede='$idsede'";










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
