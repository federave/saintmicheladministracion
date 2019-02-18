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
    

    return $aux;
    }


    function crearTablasProductos()
    {
    if($this->abrirConexion())
      {
      $aux = true;


      // Tabla TipoProductos

      $sql = "CREATE TABLE IF NOT EXISTS tipoproductos(
      id int auto_increment,
      tipo varchar(50),
      constraint pk primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);


      $sql = "INSERT INTO tipoproductos (tipo)
      SELECT * FROM (SELECT 'Retornable') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipoproductos WHERE tipo = 'Retornable'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);

      $sql = "INSERT INTO tipoproductos (tipo)
      SELECT * FROM (SELECT 'Descartable') AS tp
      WHERE NOT EXISTS (
          SELECT tipo FROM tipoproductos WHERE tipo = 'Descartable'
      ) LIMIT 1";
      $aux &= $this->conexion->query($sql);


      // Tabla Productos


      $sql = "CREATE TABLE IF NOT EXISTS productos(
      id int auto_increment,
      nombre varchar(50),
      litros real,
      idtipoproducto int not null,
      primary key(id),
      foreign key(idtipoproducto) REFERENCES tipoproductos(id)
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
