<?php



include_once($_SESSION["raiz"] . '/modelo/generico.php');


function verificarUsuario($usuario,$nombre)
{
$usuario = new Usuario($usuario,$nombre);
if($usuario->esValido())
  {
  return true;
  }
else
  {
  return false;
  }
}


class Usuario extends Generico
{


    function __construct($usuario=null,$password=null)
    {
    parent::__construct();

    $this->estado = false;
    if($usuario!=null && $password!=null)
      {
        if(parent::abrirConexion())
            {
            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'";
            $tabla = $this->conexion->query($sql);

            if($tabla->num_rows>0)
                {
                $row = $tabla->fetch_assoc();
                $this->usuario = $usuario;
                $this->password = $password;
                $this->id = $row["id"];
                $this->idTipoUsuario = $row["idtipousuario"];
                $this->estado = true;
                $this->oficina = true;
                $this->vendedor = false;
                }

            }
      }

    }


    private $usuario;
    private $password;

    private $vendedor;
    private $oficina;
    private $idTipoUsuario;





    public function esValido()
    {
    return $this->estado;
    }

    public function esVendedor()
    {
    return $this->vendedor;
    }

    public function deOficina()
    {
    return $this->oficina;
    }




    public function getPassword()
    {
    return $this->password;
    }

    public function getUsuario()
    {
    return $this->usuario;
    }

    public function getId()
    {
    return $this->id;
    }


    public function getIdTipoUsuario()
    {
    return $this->idTipoUsuario;
    }



        ///Metodos Generico

        public function cargar(){return true;}
        public function guardar(){return true;}
        public function modificar(){return true;}
        public function eliminar(){return true;}
        public function getEstado(){return true;}
        public function actualizar(){return true;}
        public function getItem(){return new Item();}









}

?>
