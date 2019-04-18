<?php

session_start();

include_once($_SESSION["raiz"] . '/modelo/usuarios/usuario.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');
include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/acceso.php');
verificarAcceso();

$xml = new XML();
$xml->startTag("Respuesta");

if(isset($_GET["clienteNuevo"]))
  {
  $aux=false;

  $conector = new Conector();
  if($conector->abrirConexion())
    {
    $conexion = $conector->getConexion();

    $cliente = new SimpleXMLElement($_GET["clienteNuevo"]);
    $nombre = $cliente->Nombre;

    $sql = "SELECT id FROM clientes WHERE nombre = '$nombre'";
    $tabla = $conexion->query($sql);
    if(!($tabla->num_rows>0))
      {
      $telefono = $cliente->Telefono;
      $email = $cliente->Email;
      $razonsocial = $cliente->RazonSocial;
      $cuit = $cliente->Cuit;
      $idcondicioniva = $cliente->IdCondicionIva;
      $idtipocliente = $cliente->IdTipoCliente;
      $idrazondecompra = $cliente->IdRazonDeCompra;

      $sql = "INSERT INTO clientes (nombre,telefono,email,razonsocial,cuit,idcondicioniva,idtipocliente,idrazondecompra)
      VALUES ('$nombre','$telefono','$email','$razonsocial','$cuit','$idcondicioniva','$idtipocliente','$idrazondecompra')";
      $aux = $conexion->query($sql);

      $sql = "SELECT id FROM clientes WHERE nombre = '$nombre'";
      $tabla = $conexion->query($sql);
      if($tabla->num_rows>0)
        {
        $row = $tabla->fetch_assoc();
        $idcliente = $row["id"];

        $nombre = $cliente->NombreSede;
        $telefono = $cliente->TelefonoSede;
        $email = $cliente->EmailSede;
        $observacion = $cliente->ObservacionSede;
        $nombreresponsable = $cliente->NombreResponsableSede;
        $apellidoresponsable = $cliente->ApellidoResponsableSede;
        $idtiposede = $cliente->IdTipoSede;
        $idasignacion = $cliente->IdAsignacionSede;



        //Asignacion Sede
        if($idasignacion == 1)
          {
          $idtrabajador = NULL;
          }
        else if($idasignacion == 2)
          {
          $idtrabajador = $cliente->IdRepartidorAsignado;
          }
        else
          {
          $idtrabajador = $cliente->IdVendedorAsignado;
          }



        if($idtrabajador!=NULL)
          {
          $sql = "INSERT INTO sedes (idcliente,nombre,telefono,email,observacion,nombreresponsable,apellidoresponsable,idtiposede,idasignacion,idtrabajador)
          VALUES('$idcliente','$nombre','$telefono','$email','$observacion','$nombreresponsable','$apellidoresponsable','$idtiposede','$idasignacion','$idtrabajador')";
          $aux = $conexion->query($sql);
          }
        else
          {
          $sql = "INSERT INTO sedes (idcliente,nombre,telefono,email,observacion,nombreresponsable,apellidoresponsable,idtiposede,idasignacion)
          VALUES('$idcliente','$nombre','$telefono','$email','$observacion','$nombreresponsable','$apellidoresponsable','$idtiposede','$idasignacion')";
          $aux = $conexion->query($sql);
          }

        $sql = "SELECT id FROM sedes WHERE idcliente = '$idcliente'";
        $tabla = $conexion->query($sql);
        if($tabla->num_rows>0)
          {
          $row = $tabla->fetch_assoc();
          $idsede = $row["id"];

          //Horarios Sede
          $numero = count($cliente->xpath("Horario"));
          $k=0;
          while($k<$numero)
            {
            $horainicio = $cliente->Horario[$k]->HoraInicio;
            $horafin = $cliente->Horario[$k]->HoraFin;
            $sql = "INSERT INTO horarios_sedes(idsede,horainicio,horafin) VALUES ('$idsede','$horainicio','$horafin')";
            $aux &= $conexion->query($sql);
            $k++;
            }

          //Direccion Sede

          $calle = $cliente->CalleSede;
          $numero = $cliente->NumeroSede;
          $entre1 = $cliente->Entre1Sede;
          $entre2 = $cliente->Entre2Sede;
          $departamento = $cliente->DepartamentoSede;
          $piso = $cliente->PisoSede;
          $idpartido = $cliente->IdPartidoSede;
          $idzona = $cliente->IdZonaSede;
          $latitud = $cliente->LatitudSede;
          $longitud = $cliente->LongitudSede;
          $estadolocalizacion = $cliente->EstadoLocalizacionSede;


          $latitud = floatval(str_replace(',', '.', $latitud));
          $longitud = floatval(str_replace(',', '.', $longitud));

          $sql = "INSERT INTO direcciones_sedes (idsede,calle,numero,entre1,entre2,departamento,piso,idpartido,latitud,longitud,estadolocalizacion,idzona)
          VALUES('$idsede','$calle','$numero','$entre1','$entre2','$departamento','$piso','$idpartido','$latitud','$longitud','$estadolocalizacion','$idzona')";
          $aux = $conexion->query($sql);


          //Recorrido

          $numero = count($cliente->xpath("Dia"));
          $k=0;
          while($k<$numero)
            {
            $iddia = $cliente->Dia[$k]->IdDia;
            if($idasignacion==1)
              {
              $idtrabajador = $cliente->Dia[$k]->IdRepartidorDia;
              }
            $sql = "INSERT INTO recorridos_sedes(idsede,idtrabajador,iddia) VALUES ('$idsede','$idtrabajador','$iddia')";
            $aux &= $conexion->query($sql);
            $k++;
            }
          }
        }

      }
    else
      {

      }
    redirect( '../../vistas/menuinicial/menuinicial.php');


    $aux = true;

    $conector->cerrarConexion();
    }


  }
else
  {
  redirect($_SESSION["raiz"] . '/vistas/errores/errorusuario.php');
  }





?>
