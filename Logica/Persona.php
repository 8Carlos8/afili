<?php require_once('Modelo.php'); ?>
<?php
class Persona extends Modelo{
    public $id;
    public $nombre;
    public $rfc_text;
    public $rfc_pdf;
    public $curp_text;
    public $curp_pdf;
    public $direccion;
    public $num;
    public $comproobante_domi;
    public $cod_postal;
    public $colonia;
    public $ine;
    public $contrato_arrenda;
    public $croquis;
    public $img1;
    public $img2;
    
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
        $this->rfc_pdf = $_POST['rfc_pdf'];
        $this->curp_text = $_POST['curp_text'];
        $this->curp_pdf = $_POST['curp_pdf'];
        $this->direccion = $_POST['direccion'];
        $this->num = $_POST['num'];
        $this->comproobante_domi = $_POST['comproobante_domi'];
        $this->cod_postal = $_POST['cod_postal'];
        $this->colonia = $_POST['colonia'];
        $this->ine = $_POST['ine'];
        $this->contrato_arrenda = $_POST['contrato_arrenda'];
        $this->croquis = $_POST['croquis'];
        $this->img1 = $_POST['img1'];
        $this->img2 = $_POST['img2'];

        $this->consulta = 
        "insert into $this->tabla 
        (nombre, rfc_text, rfc_pdf, curp_text, curp_pdf, direccion, num, comprobante_domi, cod_postal, colonia, ine, contrato_arrenda, croquis, img1, img2) ".
        "values (".
        "'$this->nombre',".
        "'$this->rfc_text',".
        "'$this->rfc_pdf',".
        "'$this->curp_text',".
        "'$this->curp_pdf',".
        "'$this->direccion',".
        "$this->num,".
        "'$this->comprobante_domi',".
        "'$this->cod_postal',".
        "'$this->colonia',".
        "'$this->ine',".
        "'$this->contrato_arrenda',".
        "'$this->croquis',".
        "'$this->img1',".
        "'$this->img2 ');";

        $this->ejecutaComandoIUD();
    }

    function actualizaRegistro(){
        $this->id = $_POST['id'];
        $this->nombre = $_POST['nombre'];
        $this->rfc_text = $_POST['rfc_text'];
        $this->rfc_pdf = $_POST['rfc_pdf'];
        $this->curp_text = $_POST['curp_text'];
        $this->curp_pdf = $_POST['curp_pdf'];
        $this->direccion = $_POST['direccion'];
        $this->num = $_POST['num'];
        $this->comproobante_domi = $_POST['comproobante_domi'];
        $this->cod_postal = $_POST['cod_postal'];
        $this->colonia = $_POST['colonia'];
        $this->ine = $_POST['ine'];
        $this->contrato_arrenda = $_POST['contrato_arrenda'];
        $this->croquis = $_POST['croquis'];
        $this->img1 = $_POST['img1'];
        $this->img2 = $_POST['img2'];

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