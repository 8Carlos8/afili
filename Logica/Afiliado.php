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
        if (isset($dato)) {
            $this->nombre = $dato->nombre;
            $this->rfc = $dato->rfc;
            $this->curp = $dato->curp;
            $this->direccion = $dato->direccion;
            $this->numero = $dato->numero;
            $this->codiigo_postal = $dato->codiigo_postal;
            $this->colonia = $dato->colonia;
            $this->expediente = $dato->expediente;
        }
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
        
        $file_name = $_FILES['expediente']['name'];
        $this->file_name = $file_name;
        $file_tmp = $_FILES['expediente']['tmp_name'];
        $route = "../Archivos/".$file_name;
        move_uploaded_file($file_tmp, $route);

        $this->consulta = 
        "insert into $this->tabla (id, nombre, rfc, curp, direccion, numero, codiigo_postal, colonia, expediente)".
        "values (".
        "$this->id,".
        "'$this->nombre',".
        "'$this->rfc',".
        "'$this->curp',".
        "'$this->direccion',".
        "$this->num,".
        "$this->cod_postal,".
        "'$this->colonia',".
        "'$this->file_name');";

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
        // $this->expediente = $_FILES['expediente']['name'];
        $this->expediente = isset($_FILES['expediente']['name']) ? $_FILES['expediente']['name'] : null;

    
        // Mover el archivo a la carpeta deseada
        $file_tmp = $_FILES['expediente']['tmp_name'];
        $route = "../Archivos/".$this->expediente;
        move_uploaded_file($file_tmp, $route);
    
        $this->consulta = 
        "update $this->tabla set ".
        "nombre = '$this->nombre', ".
        "rfc = '$this->rfc', ".
        "curp = '$this->curp', ".
        "direccion = '$this->direccion', ".
        "numero = $this->num, ".
        "codiigo_postal = '$this->cod_postal', ".
        "colonia = '$this->colonia', ".
        "expediente = '$this->expediente' ".
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