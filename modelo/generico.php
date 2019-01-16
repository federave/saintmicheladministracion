<?php


include_once($_SESSION["raiz"] . '/modelo/conector.php');
include_once($_SESSION["raiz"] . '/modelo/otros.php');


abstract class Generico extends Conector
{

    function __construct()
    {
    parent::__construct();
    }


    abstract protected function cargar();
    abstract protected function guardar();
    abstract protected function modificar();
    abstract protected function eliminar();
    abstract protected function getEstado();
    abstract protected function actualizar();
    abstract protected function getItem();



    protected $estado;

    protected $id;

    public function getId()
    {
    return $this->id;
    }

    public function setId($id)
    {
    return $this->id = $id;
    }



}






?>
