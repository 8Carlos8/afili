<?php
require_once('Modelo.php');

class Licencia extends Modelo{
    public $id;
    public $id_afiliado;
    public $licencia;

    function __construct(){
        parent::__construct();
        $this->tabla = "licencia";
    }

    function lista(){
        $this->consulta = "select * from $this->tabla";
        return $this->encuentraTodos();
    }

    function recuperarRegistro($id){
        $this->consulta = "select * from $this->tabla where id = $id";
        $dato = $this->encuentraUno();
        if (isset($dato)) {
            $this->id = $dato->id;
            $this->id_afiliado = $dato->id_afiliado;
            $this->licencia = $dato->licencia; 
        }
        return $dato;
    }

    function insertarRegistro(){
        $this->id = $_POST['id'];
        $this->id_afiliado = $_POST['id_afiliado'];
        
        $file_name = $_FILES['licencia']['name'];
        $this->file_name = $file_name;
        $file_tmp = $_FILES['licencia']['tmp_name'];
        $route = "../Archivos/Licencias".$file_name;
        move_uploaded_file($file_tmp, $route);

        $this->consulta =
        "insert into $this->tabla (id_afiliado, licencia)".
        "values (".
        "$this->id_afiliado,".
        "'$this->file_name');";

        $this->ejecutaComandoIUD();
    }

    function actualizaRegistro(){
        $this->id = $_POST['id'];
        $this->id_afiliado = $_POST['id_afiliado'];

        $file_name = $_FILES['licencia']['name'];
        $this->file_name = $file_name;
        $file_tmp = $_FILES['licencia']['tmp_name'];
        $route = "../Archivos/Licencias".$file_name;
        move_uploaded_file($file_tmp, $route);

        $this->consulta =
        "update $this->tabla set ".
        "id_afiliado = $this->id_afiliado, ".
        "licencia '$this->licencia' ".
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