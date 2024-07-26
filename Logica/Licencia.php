<?php
require_once('Modelo.php');

class Licencia extends Modelo{
    public $id;
    public $id_afiliado;
    public $tipo;
    public $fecha;
    public $licencia;

    function __construct(){
        parent::__construct();
        $this->tabla = "licencia";
    }

    function lista(){
        $this->consulta = "select * from $this->tabla";
        return $this->encuentraTodos();
    }

    function recuperarAfiliado($id_afiliado){
        $this->consulta = "select * from $this->tabla where id_afiliado = $id_afiliado";
        return $this->encuentraTodos();
    }

    function recuperarRegistro($id){
        $this->consulta = "select * from $this->tabla where id = $id";
        $dato = $this->encuentraUno();
        if (isset($dato)) {
            $this->id = $dato->id;
            $this->id_afiliado = $dato->id_afiliado;
            $this->tipo = $dato->tipo;
            $this->fecha = $dato->fecha;
            $this->licencia = $dato->licencia; 
        }
        return $dato;
    }

    function recuperarLicenciaPorId($id){
        $this->consulta = "select licencia from $this->tabla where id = $id";
        $dato = $this->encuentraUno();
        if (isset($dato)) {
            $this->licencia = $dato->licencia;
        }
        return $dato ? $dato->licencia : null;
    }

    function insertarRegistro(){
        $this->id = $_POST['id'];
        $this->id_afiliado = $_POST['id_afiliado'];
        $this->tipo = $_POST['tipo'];
        $this->fecha = $_POST['fecha'];

        if (is_uploaded_file($_FILES['licencia']['tmp_name'])) {
            $file_tmp = $_FILES['licencia']['tmp_name'];
            $this->licencia = file_get_contents($file_tmp);
        } else {
            echo "Error: El archivo no fue cargado correctamente.";
            return;
        }

        $licencia_escaped = addslashes($this->licencia);

        $this->consulta =
        "insert into $this->tabla (id_afiliado, tipo, fecha, licencia)".
        "values (".
        "$this->id_afiliado,".
        "'$this->tipo',".
        "'$this->fecha',".
        "'$licencia_escaped');";

        $this->ejecutaComandoIUD();
    }

    function actualizaRegistro(){
        $this->id = $_POST['id'];
        $this->id_afiliado = $_POST['id_afiliado'];
        $this->licencia = isset($_FILES['licencia']['name']) ? $_FILES['licencia']['name'] : null;

        if (is_uploaded_file($_FILES['licencia']['tmp_name'])) {
            $file_tmp = $_FILES['licencia']['tmp_name'];
            $this->licencia = file_get_contents($file_tmp);

            $licencia_escaped = addslashes($this->licencia);

            $this->consulta =
            "update $this->tabla set ".
            "id_afiliado = $this->id_afiliado, ".
            "licencia '$licencia_escaped' ".
            "where id = $this->id";
        } else {
            $this->consulta =
            "update $this->tabla set ".
            "id_afiliado = $this->id_afiliado ".
            "where id = $this->id";
        }

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