<?php 
require_once('Modelo.php'); 

class Afiliado extends Modelo{
    public $id;
    public $nombre;
    public $apellido_paterno;
    public $apellido_materno;
    public $rfc;
    public $curp;
    public $direccion;
    public $numero_Ext_Int;
    public $codiigo_postal;
    public $colonia;
    public $telefono;
    public $correo;
    public $reporte;
    public $fecha_afiliacion;
    public $expediente;
    
    function __construct(){
        parent::__construct();
        $this->tabla="afiliado";
    }

    function lista(){
        $this->consulta = "select * from $this->tabla";
        return $this->encuentraTodos();
    }

    function recuperarNombre($n, $aP, $aM){
        $this->consulta = "select * from $this->tabla where nombre = '$n' and apellido_paterno = '$aP' and apellido_materno = '$aM'";
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
            $this->numero_Ext_Int = $dato->numero_Ext_Int;
            $this->codiigo_postal = $dato->codiigo_postal;
            $this->colonia = $dato->colonia;
            $this->telefono = $dato->telefono;
            $this->correo = $dato->correo;
            $this->reporte = $dato->reporte;
            $this->fecha_afiliacion = $dato->fecha_afiliacion;
            $this->expediente = $dato->expediente;
        }
        return $dato;
    }

    function recuperarExpedientePorId($id) {
        $this->consulta = "select expediente from $this->tabla where id = $id";
        $dato = $this->encuentraUno();
        if (isset($dato)) {
            $this->expediente = $dato->expediente;
        }
        return $dato ? $dato->expediente : null;
    }

    function insertarRegistro(){
        $this->id = $_POST['id'];
        $this->nombre = $_POST['nombre'];
        $this->apellido_paterno = $_POST['apellido_paterno'];
        $this->apellido_materno = $_POST['apellido_materno'];
        $this->rfc = $_POST['rfc'];
        $this->curp = $_POST['curp'];
        $this->direccion = $_POST['direccion'];
        $this->numero_Ext_Int = $_POST['numero_Ext_Int'];
        $this->codiigo_postal = $_POST['codiigo_postal'];
        $this->colonia = $_POST['colonia'];
        $this->telefono = $_POST['telefono'];
        $this->correo = $_POST['correo'];
        $this->reporte = $_POST['reporte'];
        $this->fecha_afiliacion = $_POST['fecha_afiliacion'];
    
        if ($_FILES['expediente']['error'] == UPLOAD_ERR_OK) {
            $file_tmp = $_FILES['expediente']['tmp_name'];
            $this->expediente = file_get_contents($file_tmp);
            echo "Tamaño del archivo: " . $_FILES['expediente']['size'] . " bytes.";
        } else {
            echo "Error en la carga del archivo. Código de error: " . $_FILES['expediente']['error'];
        }
        
        $expediente_escaped = addslashes($this->expediente);
    
        $this->consulta = 
        "insert into $this->tabla (nombre, apellido_paterno, apellido_materno, rfc, curp, direccion, numero_Ext_Int, codiigo_postal, colonia, telefono, correo, reporte, fecha_afiliacion, expediente) ".
        "values (" .
        "'$this->nombre', ".
        "'$this->apellido_paterno', ".
        "'$this->apellido_materno', ".
        "'$this->rfc', ".
        "'$this->curp', ".
        "'$this->direccion', ".
        "'$this->numero_Ext_Int', ".
        "'$this->codiigo_postal', ".
        "'$this->colonia', ".
        "'$this->telefono', ".
        "'$this->correo', ".
        "'$this->reporte', ".
        "'$this->fecha_afiliacion', ".
        "'$expediente_escaped')";
    
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
        $this->numero_Ext_Int = $_POST['numero_Ext_Int'];
        $this->codiigo_postal = $_POST['codiigo_postal'];
        $this->colonia = $_POST['colonia'];
        $this->telefono = $_POST['telefono'];
        $this->correo = $_POST['correo'];
        $this->reporte = $_POST['reporte'];
        $this->fecha_afiliacion = $_POST['fecha_afiliacion'];
        $this->expediente = isset($_FILES['expediente']['name']) ? $_FILES['expediente']['name'] : null;

        if (is_uploaded_file($_FILES['expediente']['tmp_name'])) {
            $file_tmp = $_FILES['expediente']['tmp_name'];
            $this->expediente = file_get_contents($file_tmp);

            $expediente_escaped = addslashes($this->expediente);
        
            $this->consulta = 
            "update $this->tabla set ".
            "nombre = '$this->nombre', ".
            "apellido_paterno = '$this->apellido_paterno', ".
            "apellido_materno = '$this->apellido_materno', ".
            "rfc = '$this->rfc', ".
            "curp = '$this->curp', ".
            "direccion = '$this->direccion', ".
            "numero_Ext_Int = '$this->numero_Ext_Int', ".
            "codiigo_postal = '$this->codiigo_postal', ".
            "colonia = '$this->colonia', ".
            "telefono = '$this->telefono', ".
            "correo = '$this->correo', ".
            "reporte = '$this->reporte', ".
            "fecha_afiliacion = '$this->fecha_afiliacion', ".
            "expediente = '$expediente_escaped' ".
            "where id = $this->id";
        } 
        else {
            $this->consulta = 
            "update $this->tabla set ".
            "nombre = '$this->nombre', ".
            "apellido_paterno = '$this->apellido_paterno', ".
            "apellido_materno = '$this->apellido_materno', ".
            "rfc = '$this->rfc', ".
            "curp = '$this->curp', ".
            "direccion = '$this->direccion', ".
            "numero_Ext_Int = '$this->numero_Ext_Int', ".
            "codiigo_postal = '$this->codiigo_postal', ".
            "colonia = '$this->colonia', ".
            "telefono = '$this->telefono', ".
            "correo = '$this->correo', ".
            "reporte = '$this->reporte', ".
            "fecha_afiliacion = '$this->fecha_afiliacion' ".
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