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
        //$this->rfc_pdf = $_POST['rfc_pdf'];
        //Checar bien la base para ver si se almacena bien
        $rfc_con = file_get_contents($_FILES['rfc_pdf']['tmp_name']);
        // Obtener el contenido del archivo PDF
        $pdfContent = file_get_contents($_FILES['rfc_pdf']['tmp_name']);
        // Obtener el contenido del archivo PDF
        // Obtener el contenido del archivo PDF
        $this->curp_text = $_POST['curp_text'];
        //$this->curp_pdf = $_POST['curp_pdf'];
        $curp_con = file_get_contents($_FILES['curp_pdf']['tmp_name']);
        $this->direccion = $_POST['direccion'];
        $this->num = $_POST['num'];
        //$this->comproobante_domi = $_POST['comproobante_domi'];
        $comprobante_con = file_get_contents($_FILES['comproobante_domi']['tmp_name']);
        $this->cod_postal = $_POST['cod_postal'];
        $this->colonia = $_POST['colonia'];
        //$this->ine = $_POST['ine'];
        $ine_con = file_get_contents($_FILES['ine']['tmp_name']);
        //$this->contrato_arrenda = $_POST['contrato_arrenda'];
        $contrato_con = file_get_contents($_FILES['contrato_arrenda']['tmp_name']);
        //$this->croquis = $_POST['croquis'];
        $croquis_con = file_get_contents($_FILES['croquis']['tmp_name']);
        //$this->img1 = $_POST['img1'];
        $img1_con = file_get_contents($_FILES['img1']['tmp_name']);
        //$this->img2 = $_POST['img2'];
        $img2_con = file_get_contents($_FILES['img2']['tmp_name']);

        $this->consulta = 
        "insert into $this->tabla (nombre, rfc_text, rfc_pdf, curp_text, curp_pdf, direccion, num, comprobante_domi, cod_postal, colonia, ine, contrato_arrenda, croquis, img1, img2) ".
        "values (".
        "'$this->nombre',".
        "'$this->rfc_text',".
        "'$rfc_con',".
        "'$this->curp_text',".
        "'$curp_con',".
        "'$this->direccion',".
        "$this->num,".
        "'$comprobante_con',".
        "'$this->cod_postal',".
        "'$this->colonia',".
        "'$ine_con',".
        "'$contrato_con',".
        "'$croquis_con',".
        "'$img1_con',".
        "'$img2_con');";

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