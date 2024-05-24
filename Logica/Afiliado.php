<?php require_once('Modelo.php'); ?>
<?php
class Afiliado extends Modelo{
    public $id;
    public $nombre;
    public $rfc;
    public $curp;
    public $direccion;
    public $num;
    public $cod_postal;
    public $colonia;
    public $expediente;
    
    function __construct(){
        parent::__construct();
        $this->tabla="afiliado";
    }

    function lista(){
        $this->consulta = "select * from $this->tabla";
        return $this->encuentraTodos();
    }

    function recuperarRegistro($id){
        $this->consulta = "select * from $this->tabla where id = $id";
        $dato = $this->encuentraUno();
        return $dato;
    }

    function insertarRegistro(){
        $this->id = $_POST['id'];
        $this->nombre = $_POST['nombre'];
        $this->rfc = $_POST['rfc'];
        $this->curp = $_POST['curp'];
        $this->direccion = $_POST['direccion'];
        $this->num = $_POST['num'];
        $this->cod_postal = $_POST['cod_postal'];
        $this->colonia = $_POST['colonia'];
        //$this->expediente = $_POST['expediente'];
        $expe_con = file_get_contents($_FILES['expediente']['tmp_name']);

        $this->consulta = 
        "insert into $this->tabla (nombre, rfc, curp, direccion, num, cod_postal, colonia, expediente) ".
        "values (".
        "'$this->nombre',".
        "'$this->rfc',".
        "'$this->curp',".
        "'$this->direccion',".
        "$this->num,".
        "'$this->cod_postal',".
        "'$this->colonia',".
        "'$expe_con');";

        $this->ejecutaComandoIUD();
    }

    function actualizaRegistro(){
        $this->id = $_POST['id'];
        $this->nombre = $_POST['nombre'];
        $this->rfc = $_POST['rfc'];
        $this->curp = $_POST['curp'];
        $this->direccion = $_POST['direccion'];
        $this->num = $_POST['num'];
        $this->cod_postal = $_POST['cod_postal'];
        $this->colonia = $_POST['colonia'];
        $this->expediente = $_POST['expediente'];

        $this->consulta = 
        "update $this->tabla set".
        "nombre = '$this->nombre',".
        "rfc = '$this->rfc',".
        "curp = '$this->curp',".
        "direccion = '$this->direccion',".
        "num = $this->num,".
        "cod_postal = '$this->cod_postal',".
        "colonia = '$this->colonia',".
        "where id = $this->id";

        $this->ejecutaComandoIUD();
    }

    function eliminaRegistro($id){
        $this->consulta = 
        "delete from $this->tabla".
        "where id = $this->id;";

        $this->ejecutaComandoIUD();
    }
}
?>