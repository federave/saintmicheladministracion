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


    public function crear()
    {
    if($this->abrirConexion())
      {
      $aux = true;

      // Tabla TipoUsuarios

      $sql = "create table if not exists tipousuarios(
      id int auto_increment,
      tipo varchar(50),
      constraint pk primary key(id)
      );
      ";
      $aux &= $this->conexion->query($sql);

      $sql = "insert into tipousuarios(tipo)values('administrador');";
      $aux &= $this->conexion->query($sql);

      $sql = "insert into tipousuarios(tipo)values('vendedor');";
      $aux &= $this->conexion->query($sql);

      $sql = "insert into tipousuarios(tipo)values('oficina');";
      $aux &= $this->conexion->query($sql);


      // Tabla Usuarios

      $sql = "create table if not exists usuarios(
      id int auto_increment,
      usuario varchar(50),
      password varchar(50),
      idTipoUsuario int not null,
      primary key(id),
      foreign key(idTipoUsuario) REFERENCES tipousuarios(id)
      );
      ";
      $aux &= $this->conexion->query($sql);

      $sql = "insert into usuarios(usuario,password,idTipoUsuario)values('admin','admin',1);";
      $aux &= $this->conexion->query($sql);







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
