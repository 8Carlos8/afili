<?php require_once('Modelo.php'); ?>
<?php
class Persona extends Modelo{
    public $id;
    public $nombre;
    public $rfc_text;
    public $curp_text;
    public $direccion;
    public $num;
    public $cod_postal;
    public $colonia;
    public $expediente;
    
    function __construct(){
        parent::__construct();
        $this->tabla="persona";
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
        $this->rfc_text = $_POST['rfc_text'];
        $this->curp_text = $_POST['curp_text'];
        $this->direccion = $_POST['direccion'];
        $this->num = $_POST['num'];
        $this->cod_postal = $_POST['cod_postal'];
        $this->colonia = $_POST['colonia'];
        //$this->expediente = $_POST['expediente'];
        $expe_con = file_get_contents($_FILES['expediente']['tmp_name']);

        $this->consulta = 
        "insert into $this->tabla (nombre, rfc_text, curp_text, direccion, num, cod_postal, colonia, expediente) ".
        "values (".
        "'$this->nombre',".
        "'$this->rfc_text',".
        "'$this->curp_text',".
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
        $this->rfc_text = $_POST['rfc_text'];
        $this->curp_text = $_POST['curp_text'];
        $this->direccion = $_POST['direccion'];
        $this->num = $_POST['num'];
        $this->cod_postal = $_POST['cod_postal'];
        $this->colonia = $_POST['colonia'];
        $this->expediente = $_POST['expediente'];

        $this->consulta = 
        "update $this->tabla set".
        "nombre = '$this->nombre',".
        "rfc_text = '$this->rfc_text',".
        "rfc_pdf = '$this->rfc_pdf',".
        "curp_text = '$this->curp_text',".
        "curp_pdf = '$this->curp_pdf',".
        "direccion = '$this->direccion',".
        "num = $this->num,".
        "comprobante_domi = '$this->comprobante_domi',".
        "cod_postal = '$this->cod_postal',".
        "colonia = '$this->colonia',".
        "ine = '$this->ine',".
        "contrato_arrenda = '$this->contrato_arrenda',".
        "croquis = '$this->croquis',".
        "img1 = '$this->img1',".
        "img2 = '$this->img2',".
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