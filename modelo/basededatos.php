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
    private $usuario;
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


    return $aux;
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
