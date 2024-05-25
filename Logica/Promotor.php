<?php require_once('Modelo.php'); ?>
<?php
class Promotor extends Modelo{
    public $id;
    public $id_usuario;
    public $siglas_promotor;

    function __construct(){
        parent::__construct();
        $this->tabla = "promotor";
    }

    function lista(){
        $this->consulta = "select * from $this->tabla";
        return $this->encuentraTodos();
    }

    function recuperarRegistro($id){
        $this->consulta = "select * from $this->tabla where id = $id";
        $dato = $this->encuentraUno();
        if (isset($dato)) {
            $this->id_usuario = $dato->id_usuario;
            $this->siglas_promotor = $dato->siglas_promotor;
        }
    }

    function insertarRegistro(){
        $this->id = $_POST['id'];
        $this->id_usuario = $_POST['id_usuario'];
        $this->siglas_promotor = $_POST['siglas_promotor'];

        $this->consulta =
        "insert into $this->tabla (id_usuario, siglas_promotor)".
        "values (".
        "$this->id_usuario,".
        "'$this->siglas_promotor');";

        $this->ejecutaComandoIUD();
    }

    function actualizaRegistro(){
        $this->id = $_POST['id'];
        $this->id_usuario = $_POST['id_usuario'];
        $this->siglas_promotor = $_POST['siglas_promotor'];

        $this->consulta = 
        "update $this->tabla set ".
        "id_usuario = $this->id_usuario,".
        "siglas_promotor = '$this->siglas_promotor'".
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