<?php
require_once('Modelo.php');

class Rol extends Modelo{
    public $id;
    public $nombre_rol;

    function __construct(){
        parent::__construct();
        $this->tabla = 'rol';
    }

    function lista(){
        $this->consulta = "select * from $this->tabla";
        return $this->encuentraTodos();
    }

    function recuperarRegistro($id){
        $this->consulta = "select * from $this->tabla where id = $id";
        $dato = $this->encuentraUno();
        if (isset($dato)) {
            $this->nombre_rol = $dato->nombre_rol;
        }
    }

    function insertaRegistro(){
        $this->id = $_POST['id'];
        $this->nombre_rol = $_POST['nombre_rol'];

        $this->consulta =
        "insert into $this->tabla (nombre_rol)".
        "values (".
        "'$this->nombre_rol');";

        $this->ejecutaComandoIUD();
    }

    function actualizaRegistro(){
        $this->id = $_POST['id'];
        $this->nombre_rol = $_POST['nombre_rol'];

        $this->consulta =
        "update $this->tabla set ".
        "nombre_rol = '$this->nombre_rol',".
        "where id = $this->id";

        $this->ejecutaComandoIUD();
    }

    function eliminaRegistro($id){
        $this->consulta = 
        "delete from $this->tabla ".
        "where id = $id;";

        $this->ejecutaComandoIUD();
    }
}
?>