<?php



class BaseDeDatos
{


    function __construct()
    {
    $this->servidor  = "localhost";
    $this->usuario = "u291888960_root";
    $this->contraseña  = "mpkfa26";
    $this->nombreBD = "u291888960_smadm";
    $this->puerto = 3306;
    }


    protected $servidor;
    protected $usuario;
    protected $contraseña;
    protected $nombreBD;
    protected $puerto;
    protected $conexion;




    public function hayUsuarios()
    {
    if($this->abrirConexion())
      {
      $sql = "SELECT * FROM usuarios";
      $tabla = $this->conexion->query($sql);
      if($tabla!=null)
        {
        if($tabla->num_rows>0)
            {
            return true;
            }
        else
            {
            return false;
            }
        }
      else
        {
        return false;
        }
      }
    else
      {
      return false;
      }
    }




    public function existe()
    {
    if($this->abrirConexion())
      {
      $sql = "SELECT * FROM tipousuarios";
      $tabla = $this->conexion->query($sql);
      if($tabla!=null)
        {
        if($tabla->num_rows>0)
            {
            return true;
            }
        else
            {
            return false;
            }
        }
      else
        {
        return false;
        }
      }
    else
      {
      return false;
      }
    }


    public function crearTablasIniciales()
    {

      $aux = true;

      $aux &= $this->crearTablaPalabrasClaves();
      $aux &= $this->crearTablasUsuarios();
      return $aux;

    }





    public function crearBaseDeDatos()
    {
    $aux = true;

    $aux &= $this->crearTablaPalabrasClaves();
    $aux &= $this->crearTablasUsuarios();
    $aux &= $this->crearTablasProductos();
    $aux &= $this->crearTablasInsumos();
    $aux &= $this->crearTablaProductos_Insumos();
    $aux &= $this->crearTablaMaquinas();
    $aux &= $this->crearTablasAcuerdos();
    $aux &= $this->crearTablasAlquileres();

    $aux &= $this->crearTablaTiposCliente();
    $aux &= $this->crearTablaTiposSede();
    $aux &= $this->crearTablasRazonesDeCompra();
    $aux &= $this->crearTablaCondicionesIva();

    $aux &= $this->crearTablasTrabajadores();
    $aux &= $this->crearTablasCliente();


    return $aux;
    }



    function crearTablasTrabajadores()
    {
    if($this->abrirConexion())
      {
      $aux = true;


      // Tabla Tipos Cliente

      $sql = "CREATE TABLE IF NOT EXISTS tipostrabajador(
      id int auto_increment,
      tipo varchar(50),
      primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);



      // Tabla Trabajadores
      $sql = "CREATE TABLE IF NOT EXISTS trabajadores(
      id int auto_increment,
      nombre varchar(50),
      apellido varchar(50),
      dni varchar(50),
      telefono varchar(50),
      email varchar(50),
      idtipotrabajador int not null,
      primary key(id),
      foreign key(idtipotrabajador) REFERENCES tipostrabajador(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      // Tabla Tipos Cliente

      $sql = "CREATE TABLE IF NOT EXISTS direcciones_trabajadores(
      id int auto_increment,
      idtrabajador int not null,
      calle varchar(50),
      numero varchar(50),
      entre1 varchar(50),
      entre2 varchar(50),
      departamento varchar(50),
      piso varchar(50),
      primary key(id),
      foreign key(idtrabajador) REFERENCES trabajadores(id)
      );
      ";
      $aux &= $this->conexion->query($sql);



      $sql = "INSERT INTO trabajadores (nombre,apellido,idtipotrabajador)
      SELECT * FROM (SELECT 'Javier','Rodriguez',1) AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM trabajadores WHERE nombre = 'Javier'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);



      $sql = "INSERT INTO direcciones_trabajadores (idtrabajador,calle,numero,entre1,entre2,departamento,piso)
      VALUES(1,'','','','','','')";
      $aux &= $this->conexion->query($sql);


      $sql = "INSERT INTO trabajadores (nombre,apellido,idtipotrabajador)
      SELECT * FROM (SELECT 'Narciso','',1) AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM trabajadores WHERE nombre = 'Narciso'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO direcciones_trabajadores (idtrabajador,calle,numero,entre1,entre2,departamento,piso)
      VALUES(2,'','','','','','')";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO trabajadores (nombre,apellido,idtipotrabajador)
      SELECT * FROM (SELECT 'Matias','',2) AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM trabajadores WHERE nombre = 'Matias'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO direcciones_trabajadores (idtrabajador,calle,numero,entre1,entre2,departamento,piso)
      VALUES(3,'','','','','','')";
      $aux &= $this->conexion->query($sql);


      $sql = "INSERT INTO tipostrabajador (tipo)
      SELECT * FROM (SELECT 'Repartidor') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipostrabajador WHERE tipo = 'Repartidor'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $aux &= $this->conexion->query($sql);
      $sql = "INSERT INTO tipostrabajador (tipo)
      SELECT * FROM (SELECT 'Vendedor') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipostrabajador WHERE tipo = 'Vendedor'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);





      $aux &= $this->conexion->query($sql);
      $this->cerrarConexion();
      return $aux;
      }
    else
      {
      return false;
      }

    }




    function crearTablasCliente()
    {
    if($this->abrirConexion())
      {
      $aux = true;

      $sql = "CREATE TABLE IF NOT EXISTS clientes(
      id int auto_increment,
      nombre varchar(50),
      telefono varchar(50),
      email varchar(50),
      razonsocial varchar(50),
      cuit varchar(50),
      idcondicioniva int not null,
      idtipocliente int not null,
      idrazondecompra int not null,
      primary key(id),
      foreign key(idcondicioniva) REFERENCES condicionesiva(id),
      foreign key(idtipocliente) REFERENCES tiposcliente(id),
      foreign key(idrazondecompra) REFERENCES razonesdecompra(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      $sql = "CREATE TABLE IF NOT EXISTS publicidades_clientes(
      idpublicidad int not null,
      idcliente int not null,
      primary key(idpublicidad,idcliente),
      foreign key(idpublicidad) REFERENCES publicidades(id),
      foreign key(idcliente) REFERENCES clientes(id)
      );
      ";
      $aux &= $this->conexion->query($sql);




      $sql = "CREATE TABLE IF NOT EXISTS partidos(
      id int auto_increment,
      nombre varchar(50),
      primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);



      $sql = "CREATE TABLE IF NOT EXISTS asignaciones(
      id int auto_increment,
      nombre varchar(50),
      primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);




      $sql = "CREATE TABLE IF NOT EXISTS sedes(
      id int auto_increment,
      idcliente int not null,
      nombre varchar(50),
      telefono varchar(50),
      email varchar(50),
      observacion varchar(50),
      nombreresponsable varchar(50),
      apellidoresponsable varchar(50),
      idtiposede int not null,
      idasignacion int not null,
      idtrabajador int,
      primary key(id),
      foreign key(idcliente) REFERENCES clientes(id),
      foreign key(idtiposede) REFERENCES tipossede(id),
      foreign key(idasignacion) REFERENCES asignaciones(id),
      foreign key(idtrabajador) REFERENCES trabajadores(id)
      );
      ";
      $aux &= $this->conexion->query($sql);

      $sql = "CREATE TABLE IF NOT EXISTS zonas(
      id int auto_increment,
      nombre varchar(50),
      primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      $sql = "CREATE TABLE IF NOT EXISTS direcciones_sedes(
      id int auto_increment,
      idsede int not null,
      calle varchar(50),
      numero varchar(50),
      entre1 varchar(50),
      entre2 varchar(50),
      departamento varchar(50),
      piso varchar(50),
      idpartido int not null,
      latitud real,
      longitud real,
      estadolocalizacion boolean,
      idzona int,
      primary key(id),
      foreign key(idsede) REFERENCES sedes(id),
      foreign key(idpartido) REFERENCES partidos(id),
      foreign key(idzona) REFERENCES zonas(id)
      );
      ";
      $aux &= $this->conexion->query($sql);

      $sql = "CREATE TABLE IF NOT EXISTS horarios_sedes(
      id int auto_increment,
      idsede int not null,
      horainicio time,
      horafin time,
      primary key(id),
      foreign key(idsede) REFERENCES sedes(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      $sql = "CREATE TABLE IF NOT EXISTS dias(
      id int auto_increment,
      nombre varchar(50),
      primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      $sql = "CREATE TABLE IF NOT EXISTS recorridos(
      idsede int not null,
      idtrabajador int not null,
      iddia int not null,
      primary key(idsede,idtrabajador,iddia),
      foreign key(idsede) REFERENCES sedes(id),
      foreign key(idtrabajador) REFERENCES trabajadores(id),
      foreign key(iddia) REFERENCES dias(id)
      );
      ";
      $aux &= $this->conexion->query($sql);






      $sql = "INSERT INTO zonas (nombre)
      SELECT * FROM (SELECT 'La Plata') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM zonas WHERE nombre = 'La Plata'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO zonas (nombre)
      SELECT * FROM (SELECT 'City Bell') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM zonas WHERE nombre = 'City Bell'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);


      $sql = "INSERT INTO dias (nombre)
      SELECT * FROM (SELECT 'Lunes') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM dias WHERE nombre = 'Lunes'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO dias (nombre)
      SELECT * FROM (SELECT 'Martes') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM dias WHERE nombre = 'Martes'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO dias (nombre)
      SELECT * FROM (SELECT 'Miércoles') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM dias WHERE nombre = 'Miércoles'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO dias (nombre)
      SELECT * FROM (SELECT 'Jueves') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM dias WHERE nombre = 'Jueves'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO dias (nombre)
      SELECT * FROM (SELECT 'Viernes') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM dias WHERE nombre = 'Viernes'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO dias (nombre)
      SELECT * FROM (SELECT 'Sábado') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM dias WHERE nombre = 'Sábado'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);


      $sql = "INSERT INTO asignaciones (nombre)
      SELECT * FROM (SELECT 'Empresa') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM asignaciones WHERE nombre = 'Empresa'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO asignaciones (nombre)
      SELECT * FROM (SELECT 'Repartidor') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM asignaciones WHERE nombre = 'Repartidor'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO asignaciones (nombre)
      SELECT * FROM (SELECT 'Vendedor') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM asignaciones WHERE nombre = 'Vendedor'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO partidos (nombre)
      SELECT * FROM (SELECT 'La Plata') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM partidos WHERE nombre = 'La Plata'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO partidos (nombre)
      SELECT * FROM (SELECT 'Berisso') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM partidos WHERE nombre = 'Berisso'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO partidos (nombre)
      SELECT * FROM (SELECT 'Ensenada') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM partidos WHERE nombre = 'Ensenada'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO partidos (nombre)
      SELECT * FROM (SELECT 'Los Hornos') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM partidos WHERE nombre = 'Los Hornos'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $this->cerrarConexion();
      return $aux;
      }
    else
      {
      return false;
      }

    }


    function crearTablaCondicionesIva()
    {
    if($this->abrirConexion())
      {
      $aux = true;

      $sql = "CREATE TABLE IF NOT EXISTS condicionesiva(
      id int auto_increment,
      nombre varchar(50),
      primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO condicionesiva (nombre)
      SELECT * FROM (SELECT 'Consumidor Final') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM condicionesiva WHERE nombre = 'Consumidor Final'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO condicionesiva (nombre)
      SELECT * FROM (SELECT 'Monotributista') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM condicionesiva WHERE nombre = 'Monotributista'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);


      $sql = "INSERT INTO condicionesiva (nombre)
      SELECT * FROM (SELECT 'Responsable Inscripto') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM condicionesiva WHERE nombre = 'Responsable Inscripto'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);


      $this->cerrarConexion();
      return $aux;
      }
    else
      {
      return false;
      }

    }


    function crearTablasRazonesDeCompra()
    {
    if($this->abrirConexion())
      {
      $aux = true;

      $sql = "CREATE TABLE IF NOT EXISTS mediospublicitarios(
      id int auto_increment,
      medio varchar(50),
      primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO mediospublicitarios (medio)
      SELECT * FROM (SELECT 'Facebook') AS tp
      WHERE NOT EXISTS (
          SELECT medio FROM mediospublicitarios WHERE medio = 'Facebook'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO mediospublicitarios (medio)
      SELECT * FROM (SELECT 'Instagram') AS tp
      WHERE NOT EXISTS (
          SELECT medio FROM mediospublicitarios WHERE medio = 'Instagram'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO mediospublicitarios (medio)
      SELECT * FROM (SELECT 'Google') AS tp
      WHERE NOT EXISTS (
          SELECT medio FROM mediospublicitarios WHERE medio = 'Google'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);


      $sql = "CREATE TABLE IF NOT EXISTS publicidades(
      id int auto_increment,
      nombre varchar(50),
      idmedio int not null,
      fechainicio datetime,
      fechafin datetime,
      primary key(id),
      foreign key(idmedio) REFERENCES mediospublicitarios(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      $sql = "CREATE TABLE IF NOT EXISTS razonesdecompra(
      id int auto_increment,
      nombre varchar(50),
      primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      $sql = "INSERT INTO razonesdecompra (nombre)
      SELECT * FROM (SELECT 'Publicidad') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM razonesdecompra WHERE nombre = 'Publicidad'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO razonesdecompra (nombre)
      SELECT * FROM (SELECT 'Pagina Web') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM razonesdecompra WHERE nombre = 'Pagina Web'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);


      $sql = "INSERT INTO razonesdecompra (nombre)
      SELECT * FROM (SELECT 'Redes Sociales') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM razonesdecompra WHERE nombre = 'Redes Sociales'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO razonesdecompra (nombre)
      SELECT * FROM (SELECT 'Por Recomendacion') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM razonesdecompra WHERE nombre = 'Por Recomendacion'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO razonesdecompra (nombre)
      SELECT * FROM (SELECT 'Por Ver Los Camiones,Camionetas') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM razonesdecompra WHERE nombre = 'Por Ver Los Camiones,Camionetas'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO razonesdecompra (nombre)
      SELECT * FROM (SELECT 'Ninguna') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM razonesdecompra WHERE nombre = 'Ninguna'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);


      $this->cerrarConexion();
      return $aux;
      }
    else
      {
      return false;
      }

    }



    function crearTablaTiposCliente()
    {
    if($this->abrirConexion())
      {
      $aux = true;


      // Tabla Tipos Cliente

      $sql = "CREATE TABLE IF NOT EXISTS tiposcliente(
      id int auto_increment,
      tipo varchar(50),
      constraint pk primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tiposcliente (tipo)
      SELECT * FROM (SELECT 'Particular') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tiposcliente WHERE tipo = 'Particular'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tiposcliente (tipo)
      SELECT * FROM (SELECT 'Estudiante') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tiposcliente WHERE tipo = 'Estudiante'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);


      $sql = "INSERT INTO tiposcliente (tipo)
      SELECT * FROM (SELECT 'Comercio') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tiposcliente WHERE tipo = 'Comercio'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tiposcliente (tipo)
      SELECT * FROM (SELECT 'Empresa') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tiposcliente WHERE tipo = 'Empresa'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);


      $sql = "INSERT INTO tiposcliente (tipo)
      SELECT * FROM (SELECT 'Institucion') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tiposcliente WHERE tipo = 'Institucion'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);


      $aux &= $this->conexion->query($sql);
      $this->cerrarConexion();
      return $aux;
      }
    else
      {
      return false;
      }

    }



    function crearTablaTiposSede()
    {
    if($this->abrirConexion())
      {
      $aux = true;


      // Tabla Tipos

      $sql = "CREATE TABLE IF NOT EXISTS tipossede(
      id int auto_increment,
      tipo varchar(50),
      constraint pk primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tipossede (tipo)
      SELECT * FROM (SELECT 'Casa') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipossede WHERE tipo = 'Casa'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tipossede (tipo)
      SELECT * FROM (SELECT 'Departamento') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipossede WHERE tipo = 'Departamento'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tipossede (tipo)
      SELECT * FROM (SELECT 'Oficina') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipossede WHERE tipo = 'Oficina'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tipossede (tipo)
      SELECT * FROM (SELECT 'Supermercado') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipossede WHERE tipo = 'Supermercado'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tipossede (tipo)
      SELECT * FROM (SELECT 'Supermercado Chino') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipossede WHERE tipo = 'Supermercado Chino'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);


      $sql = "INSERT INTO tipossede (tipo)
      SELECT * FROM (SELECT 'Almacen') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipossede WHERE tipo = 'Almacen'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tipossede (tipo)
      SELECT * FROM (SELECT 'Autoservicio') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipossede WHERE tipo = 'Autoservicio'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tipossede (tipo)
      SELECT * FROM (SELECT 'Verduleria') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipossede WHERE tipo = 'Verduleria'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tipossede (tipo)
      SELECT * FROM (SELECT 'Kiosco') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipossede WHERE tipo = 'Kiosco'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tipossede (tipo)
      SELECT * FROM (SELECT 'Buffet') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipossede WHERE tipo = 'Buffet'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tipossede (tipo)
      SELECT * FROM (SELECT 'Restaurante') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipossede WHERE tipo = 'Restaurante'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tipossede (tipo)
      SELECT * FROM (SELECT 'Bar') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipossede WHERE tipo = 'Bar'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tipossede (tipo)
      SELECT * FROM (SELECT 'Gymnasio') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipossede WHERE tipo = 'Gymnasio'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);



      $aux &= $this->conexion->query($sql);
      $this->cerrarConexion();
      return $aux;
      }
    else
      {
      return false;
      }

    }







    function crearTablasAlquileres()
    {
    if($this->abrirConexion())
      {
      $aux = true;

      ////////////////ALQUILERES

      // Tabla Alquileres

      $sql = "CREATE TABLE IF NOT EXISTS alquileres(
      id int auto_increment,
      nombre varchar(50),
      fechacreacion date,
      constraint pk primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      // Tabla Relacion Alquileres Maquinas

      $sql = "CREATE TABLE IF NOT EXISTS alquileres_precios_actual(
      idalquiler int not null,
      precio real,
      fechainicio datetime,
      primary key(idalquiler,fechainicio),
      foreign key(idalquiler) REFERENCES alquileres(id)
      );
      ";
      $aux &= $this->conexion->query($sql);

      $sql = "CREATE TABLE IF NOT EXISTS alquileres_precios_historico(
      idalquiler int not null,
      precio real,
      fechainicio datetime,
      fechafin datetime,
      primary key(idalquiler,fechainicio),
      foreign key(idalquiler) REFERENCES alquileres(id)
      );
      ";

      $aux &= $this->conexion->query($sql);



      // Tabla Relacion Alquileres Maquinas

      $sql = "CREATE TABLE IF NOT EXISTS alquileres_maquinas(
      idalquiler int not null,
      idmaquina int not null,
      cantidad int,
      primary key(idalquiler,idmaquina),
      foreign key(idalquiler) REFERENCES alquileres(id),
      foreign key(idmaquina) REFERENCES maquinas(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      // Tabla Relacion Alquileres Productos

      $sql = "CREATE TABLE IF NOT EXISTS alquileres_productos(
      idalquiler int not null,
      idproducto int not null,
      cantidad int,
      primary key(idalquiler,idproducto),
      foreign key(idalquiler) REFERENCES alquileres(id),
      foreign key(idproducto) REFERENCES productos(id)
      );
      ";
      $aux &= $this->conexion->query($sql);




      $this->cerrarConexion();
      return $aux;
      }
    else
      {
      return false;
      }

    }



    function crearTablasAcuerdos()
    {
    if($this->abrirConexion())
      {
      $aux = true;



      //////////////////////////////////////////////////////////////////////
      ////////////////CONDICIONES COMODATOS

      $sql = "CREATE TABLE IF NOT EXISTS condicionescomodatos(
      id int auto_increment,
      nombre varchar(50),
      minimototal int,
      fechacreacion date,
      primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);

      // Tabla Relacion Condiciones Comodatos Productos

      $sql = "CREATE TABLE IF NOT EXISTS condicionescomodatos_productos(
      idcondicion int not null,
      idproducto int not null,
      minimo int,
      primary key(idcondicion,idproducto),
      foreign key(idcondicion) REFERENCES condicionescomodatos(id),
      foreign key(idproducto) REFERENCES productos(id)
      );
      ";
      $aux &= $this->conexion->query($sql);



      ////////////////COMODATOS

      // Tabla Comodatos

      $sql = "CREATE TABLE IF NOT EXISTS comodatos(
      id int auto_increment,
      nombre varchar(50),
      especial boolean,
      fechacreacion date,
      constraint pk primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      // Tabla Relacion Comodatos Productos

      $sql = "CREATE TABLE IF NOT EXISTS comodatos_condicionescomodatos_actual(
      idcomodato int not null,
      idcondicion int not null,
      fechainicio datetime,
      primary key(idcomodato,idcondicion),
      foreign key(idcomodato) REFERENCES comodatos(id),
      foreign key(idcondicion) REFERENCES condicionescomodatos(id)
      );
      ";
      $aux &= $this->conexion->query($sql);

      // Tabla Relacion Comodatos Productos

      $sql = "CREATE TABLE IF NOT EXISTS comodatos_condicionescomodatos_historico(
      idcomodato int not null,
      idcondicion int not null,
      fechainicio datetime,
      fechafin datetime,
      primary key(idcomodato,idcondicion),
      foreign key(idcomodato) REFERENCES comodatos(id),
      foreign key(idcondicion) REFERENCES condicionescomodatos(id)
      );
      ";
      $aux &= $this->conexion->query($sql);



      // Tabla Relacion Comodatos Maquinas

      $sql = "CREATE TABLE IF NOT EXISTS comodatos_maquinas_actual(
      idcomodato int not null,
      idmaquina int not null,
      cantidad int,
      fechainicio datetime,
      primary key(idcomodato,idmaquina),
      foreign key(idcomodato) REFERENCES comodatos(id),
      foreign key(idmaquina) REFERENCES maquinas(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      $sql = "CREATE TABLE IF NOT EXISTS comodatos_maquinas_historico(
      idcomodato int not null,
      idmaquina int not null,
      cantidad int,
      fechainicio datetime,
      fechafin datetime,
      primary key(idcomodato,idmaquina),
      foreign key(idcomodato) REFERENCES comodatos(id),
      foreign key(idmaquina) REFERENCES maquinas(id)
      );
      ";
      $aux &= $this->conexion->query($sql);





      //////////////////////////////////////////////////////////////////////
      ////////////////PRECIOS PRODUCTOS

      // Tabla Acuerdos

      $sql = "CREATE TABLE IF NOT EXISTS acuerdospreciosproductos(
      id int auto_increment,
      nombre varchar(50),
      especial boolean,
      fechacreacion date,
      constraint pk primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);

      // Tabla Actual

      $sql = "CREATE TABLE IF NOT EXISTS acuerdospreciosproductos_productos_actual(
      idacuerdo int not null,
      idproducto int not null,
      precio real,
      fechainicio datetime,
      primary key(idacuerdo,idproducto),
      foreign key(idacuerdo) REFERENCES acuerdospreciosproductos(id),
      foreign key(idproducto) REFERENCES productos(id)
      );
      ";
      $aux &= $this->conexion->query($sql);

      // Tabla Historico

      $sql = "CREATE TABLE IF NOT EXISTS acuerdospreciosproductos_productos_historico(
      idacuerdo int not null,
      idproducto int not null,
      precio real,
      fechainicio datetime,
      fechafin datetime,
      primary key(idacuerdo,idproducto),
      foreign key(idacuerdo) REFERENCES acuerdospreciosproductos(id),
      foreign key(idproducto) REFERENCES productos(id)
      );
      ";
      $aux &= $this->conexion->query($sql);

      //////////////////////////////////////////////////////////////////////
      //////////////// BONIFICACIONES

      // Tabla Bonificaciones

      $sql = "CREATE TABLE IF NOT EXISTS bonificaciones(
      id int auto_increment,
      nombre varchar(50),
      cantidadminima int,
      cantidadmaxima int,
      porcentaje real,
      fechacreacion date,
      primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      // Tabla Relacion Bonificaciones Productos

      $sql = "CREATE TABLE IF NOT EXISTS bonificaciones_productos(
      idbonificacion int not null,
      idproducto int not null,
      primary key(idbonificacion,idproducto),
      foreign key(idbonificacion) REFERENCES bonificaciones(id),
      foreign key(idproducto) REFERENCES productos(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      // Tabla Acuerdos

      $sql = "CREATE TABLE IF NOT EXISTS acuerdosbonificaciones(
      id int auto_increment,
      nombre varchar(50),
      especial boolean,
      fechacreacion date,
      constraint pk primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      // Tabla Actual

      $sql = "CREATE TABLE IF NOT EXISTS acuerdosbonificaciones_bonificaciones_actual(
      idacuerdo int not null,
      idbonificacion int not null,
      fechainicio datetime,
      primary key(idacuerdo,idbonificacion),
      foreign key(idacuerdo) REFERENCES acuerdosbonificaciones(id),
      foreign key(idbonificacion) REFERENCES bonificaciones(id)
      );
      ";
      $aux &= $this->conexion->query($sql);

      // Tabla Historico

      $sql = "CREATE TABLE IF NOT EXISTS acuerdosbonificaciones_bonificaciones_historico(
      idacuerdo int not null,
      idbonificacion int not null,
      fechainicio datetime,
      fechafin datetime,
      primary key(idacuerdo,idbonificacion),
      foreign key(idacuerdo) REFERENCES acuerdosbonificaciones(id),
      foreign key(idbonificacion) REFERENCES bonificaciones(id)
      );
      ";
      $aux &= $this->conexion->query($sql);







      $this->cerrarConexion();
      return $aux;
      }
    else
      {
      return false;
      }

    }




    function crearTablaMaquinas()
    {
    if($this->abrirConexion())
      {
      $aux = true;

      // Tabla Tipo Maquinas

      $sql = "CREATE TABLE IF NOT EXISTS tiposmaquina(
      id int auto_increment,
      tipo varchar(50),
      constraint pk primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      $sql = "INSERT INTO tiposmaquina (tipo)
      SELECT * FROM (SELECT 'Dispenser Frio Calor') AS tm
      WHERE NOT EXISTS (
          SELECT tipo FROM tiposmaquina WHERE tipo = 'Dispenser Frio Calor'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tiposmaquina (tipo)
      SELECT * FROM (SELECT 'Heladera') AS tm
      WHERE NOT EXISTS (
          SELECT tipo FROM tiposmaquina WHERE tipo = 'Heladera'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);




      // Tabla Insumos

      $sql = "CREATE TABLE IF NOT EXISTS maquinas(
      id int auto_increment,
      nombre varchar(50),
      marca varchar(50),
      capacidad real,
      idtipomaquina int not null,
      constraint pk primary key(id),
      foreign key(idtipomaquina) REFERENCES tiposmaquina(id)
      );
      ";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO maquinas (nombre,marca,capacidad,idtipomaquina)
      SELECT * FROM (SELECT 'Dispenser Frio Calor Ushuaia','Ushuaia',0,1) AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM maquinas WHERE nombre = 'Dispenser Frio Calor Ushuaia'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO maquinas (nombre,marca,capacidad,idtipomaquina)
      SELECT * FROM (SELECT 'Heladera Briket 3200','Briket',3200,2) AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM maquinas WHERE nombre = 'Heladera Briket 3200'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);


      $this->cerrarConexion();
      return $aux;
      }
    else
      {
      return false;
      }

    }








    function crearTablaProductos_Insumos()
    {
    if($this->abrirConexion())
      {
      $aux = true;


      // Tabla Insumos

      $sql = "CREATE TABLE IF NOT EXISTS productos_insumos(
      idproducto int not null,
      idinsumo int not null,
      primary key(idproducto,idinsumo),
      foreign key(idproducto) REFERENCES productos(id),
      foreign key(idinsumo) REFERENCES insumos(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      $this->cerrarConexion();
      return $aux;
      }
    else
      {
      return false;
      }

    }

    function crearTablasInsumos()
    {
    if($this->abrirConexion())
      {
      $aux = true;


      // Tabla Insumos

      $sql = "CREATE TABLE IF NOT EXISTS insumos(
      id int auto_increment,
      nombre varchar(50),
      constraint pk primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      $sql = "INSERT INTO insumos (nombre)
      SELECT * FROM (SELECT 'Tapa Bidón Retornable') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM insumos WHERE nombre = 'Tapa Bidón Retornable'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO insumos (nombre)
        SELECT * FROM (SELECT 'Tapa Bidón Descartable') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM insumos WHERE nombre = 'Tapa Bidón Descartable'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO insumos (nombre)
      SELECT * FROM (SELECT 'Etiqueta Bidón 20L') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM insumos WHERE nombre = 'Etiqueta Bidón 20L'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO insumos (nombre)
      SELECT * FROM (SELECT 'Etiqueta Bidón 12L') AS tp
      WHERE NOT EXISTS (
          SELECT nombre FROM insumos WHERE nombre = 'Etiqueta Bidón 12L'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);


      $this->cerrarConexion();
      return $aux;
      }
    else
      {
      return false;
      }

    }

    function crearTablasProductos()
    {
    if($this->abrirConexion())
      {
      $aux = true;


      // Tabla TipoProductos

      $sql = "CREATE TABLE IF NOT EXISTS tiposproducto(
      id int auto_increment,
      tipo varchar(50),
      constraint pk primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      $sql = "INSERT INTO tiposproducto (tipo)
      SELECT * FROM (SELECT 'Retornable') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tiposproducto WHERE tipo = 'Retornable'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tiposproducto (tipo)
      SELECT * FROM (SELECT 'Descartable') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tiposproducto WHERE tipo = 'Descartable'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);


      // Tabla Productos


      $sql = "CREATE TABLE IF NOT EXISTS productos(
      id int auto_increment,
      nombre varchar(50),
      litros real,
      idtipoproducto int not null,
      primary key(id),
      foreign key(idtipoproducto) REFERENCES tiposproducto(id)
      );
      ";
      $aux &= $this->conexion->query($sql);

      $this->cerrarConexion();
      return $aux;
      }
    else
      {
      return false;
      }

    }

    function crearTablaPalabrasClaves()
    {
    if($this->abrirConexion())
      {
      $aux = true;

      // Tabla Palabras Claves

      $sql = "CREATE TABLE IF NOT EXISTS palabrasclaves(
      id int auto_increment,
      palabra varchar(50),
      constraint pk primary key(id)
      );
      ";

      $sql = "INSERT INTO palabrasclaves (palabra)
      SELECT * FROM (SELECT 'puelche2010') AS pc
      WHERE NOT EXISTS (
          SELECT palabra FROM palabrasclaves WHERE palabra = 'puelche2010'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);
      $this->cerrarConexion();
      return $aux;
      }
    else
      {
      return false;
      }

    }







    function crearTablasUsuarios()
    {
    if($this->abrirConexion())
      {
      $aux = true;


      // Tabla TipoUsuarios

      $sql = "CREATE TABLE IF NOT EXISTS tipousuarios(
      id int auto_increment,
      tipo varchar(50),
      constraint pk primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      $sql = "INSERT INTO tipousuarios (tipo)
      SELECT * FROM (SELECT 'Administrador') AS tmp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipousuarios WHERE tipo = 'Administrador'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tipousuarios (tipo)
      SELECT * FROM (SELECT 'Oficina') AS tmp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipousuarios WHERE tipo = 'Oficina'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tipousuarios (tipo)
      SELECT * FROM (SELECT 'Repartidor') AS tmp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipousuarios WHERE tipo = 'Repartidor'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tipousuarios (tipo)
      SELECT * FROM (SELECT 'Vendedor') AS tmp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipousuarios WHERE tipo = 'Vendedor'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tipousuarios (tipo)
      SELECT * FROM (SELECT 'Produccion') AS tmp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipousuarios WHERE tipo = 'Produccion'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);




      // Tabla Usuarios

      $sql = "CREATE TABLE IF NOT EXISTS usuarios(
      id int auto_increment,
      usuario varchar(50),
      password varchar(50),
      idtipousuario int not null,
      primary key(id),
      foreign key(idtipousuario) REFERENCES tipousuarios(id)
      );
      ";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO usuarios (usuario,password,idtipousuario)
      SELECT * FROM (SELECT 'federave','mpkfa26',1) as u
      WHERE NOT EXISTS (
          SELECT usuario FROM usuarios WHERE usuario = 'federave'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);


      $sql = "INSERT INTO usuarios (usuario,password,idtipousuario)
      SELECT * FROM (SELECT 'oficina','sm111111*',2) as u
      WHERE NOT EXISTS (
          SELECT usuario FROM usuarios WHERE usuario = 'oficina'
      ) LIMIT 1";

      $aux &= $this->conexion->query($sql);
      $this->cerrarConexion();
      return $aux;
      }
    else
      {
      return false;
      }

    }













    public function abrirConexion()
    {

    $this->conexion = new mysqli($this->servidor, $this->usuario, $this->contraseña,$this->nombreBD,$this->puerto);

    if($this->conexion->connect_error == false )
      {return true;}
    else
      {return false;}
    }


    public function cerrarConexion()
    {$this->conexion->close();}



    public function getConexion()
    {
    return $this->conexion;
    }




}







?>
