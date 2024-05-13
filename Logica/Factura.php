<?php require_once("Modelo.php");?>
<?php
class Factura extends Modelo{
    public $id;
    public $id_afiliado;
    public $fact_pdf;

    function __construct(){
        parent::__construct();
        $this->tabla = "factura";
    }

    function lista(){
        $this->consulta = "select * from $this->tabla";
        return $this->encuentraTodos();
    }

    function recuperaRegistro($id){
        $this->consulta = "select * from $this->tabla where id = $id";
        $dato = $this->encuentraUno();

        return $dato;
    }

    function insertarRegistro(){
        $this->id = $_POST['id'];
        $this->id_afiliado = $_POST['id_afiliado'];
        $this->fact_pdf = $_POST['fact_pdf'];

        $this->consulta = 
        "insert into $this->tabla
        (id_afiliado, fact_pdf)".
        "values (".
        "$this->id_afiliado,".
        "'$this->fact_pdf');";

        $this->ejecutaComandoIUD();
    }

    function actualizaRegistro(){
        $this->id = $_POST['id'];
        $this->id_afiliado = $_POST['id_afiliado'];
        $this->fact_pdf = $_POST['fact_pdf'];

        $this->consulta = 
        "update $this->tabla set".
        "id_afiliado = $this->id_afiliado".
        "fact_pdf = '$this->fact_pdf'".
        "where id = $this->id";

        $this->ejecutaComandoIUD();
    }

    function eliminaRegistro($id){
        $this->consulta =
        "delete from $this->tabla".
        "where id = $id;";

        $this->ejecutaComandoIUD();
    }
}
?>