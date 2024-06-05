<?php require_once('Modelo.php'); ?>
<?php
class Afiliado extends Modelo{
    public $id;
    public $nombre;
    public $apellido_paterno;
    public $apellido_materno;
    public $rfc;
    public $curp;
    public $direccion;
    public $num;
    public $cod_postal;
    public $colonia;
    public $telefono;
    public $correo;
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
            $this->apellido_paterno = $dato->apellido_paterno;
            $this->apellido_materno = $dato->apellido_materno;
            $this->rfc = $dato->rfc;
            $this->curp = $dato->curp;
            $this->direccion = $dato->direccion;
            $this->numero = $dato->numero;
            $this->codiigo_postal = $dato->codiigo_postal;
            $this->colonia = $dato->colonia;
            $this->telefono = $dato->telefono;
            $this->correo = $dato->correo;
            $this->expediente = $dato->expediente;
        }
        return $dato;
    }

    function insertarRegistro(){
        $this->id = $_POST['id'];
        $this->nombre = $_POST['nombre'];
        $this->apellido_paterno = $_POST['apellido_paterno'];
        $this->apellido_materno = $_POST['apellido_materno'];
        $this->rfc = $_POST['rfc'];
        $this->curp = $_POST['curp'];
        $this->direccion = $_POST['direccion'];
        $this->num = $_POST['num'];
        $this->cod_postal = $_POST['cod_postal'];
        $this->colonia = $_POST['colonia'];
        $this->telefono = $_POST['telefono'];
        $this->correo = $_POST['correo'];
        
        $file_name = $_FILES['expediente']['name'];
        $this->file_name = $file_name;
        $file_tmp = $_FILES['expediente']['tmp_name'];
        $route = "../Archivos/".$file_name;
        move_uploaded_file($file_tmp, $route);

        $this->consulta = 
        "insert into $this->tabla (nombre, apellido_paterno, apellido_materno, rfc, curp, direccion, numero, codiigo_postal, colonia, telefono, correo, expediente)".
        "values (".
        "'$this->nombre',".
        "'$this->apellido_paterno',".
        "'$this->apellido_materno',".
        "'$this->rfc',".
        "'$this->curp',".
        "'$this->direccion',".
        "$this->num,".
        "$this->cod_postal,".
        "'$this->colonia',".
        "'$this->telefono',".
        "'$this->correo',".
        "'$this->file_name');";

        $this->ejecutaComandoIUD();
    }

    function actualizaRegistro(){
        $this->id = $_POST['id'];
        $this->nombre = $_POST['nombre'];
        $this->apellido_paterno = $_POST['apellido_paterno'];
        $this->apellido_materno = $_POST['apellido_materno'];
        $this->rfc = $_POST['rfc'];
        $this->curp = $_POST['curp'];
        $this->direccion = $_POST['direccion'];
        $this->num = $_POST['num'];
        $this->cod_postal = $_POST['cod_postal'];
        $this->colonia = $_POST['colonia'];
        $this->telefono = $_POST['telefono'];
        $this->correo = $_POST['correo'];
        // $this->expediente = $_FILES['expediente']['name'];
        $this->expediente = isset($_FILES['expediente']['name']) ? $_FILES['expediente']['name'] : null;

    
        // Mover el archivo a la carpeta deseada
        $file_tmp = $_FILES['expediente']['tmp_name'];
        $route = "../Archivos/".$this->expediente;
        move_uploaded_file($file_tmp, $route);
    
        $this->consulta = 
        "update $this->tabla set ".
        "nombre = '$this->nombre', ".
        "apellido_paterno = '$this->apellido_paterno', ".
        "apellido_materno = '$this->apellido_materno', ".
        "rfc = '$this->rfc', ".
        "curp = '$this->curp', ".
        "direccion = '$this->direccion', ".
        "numero = $this->num, ".
        "codiigo_postal = '$this->cod_postal', ".
        "colonia = '$this->colonia', ".
        "telefono = '$this->telefono', ".
        "correo = '$this->correo', ".
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