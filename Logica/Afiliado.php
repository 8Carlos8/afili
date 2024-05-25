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
    
        // Verifica si se subió un archivo
        if(isset($_FILES['expediente']) && $_FILES['expediente']['error'] == 0){
            $file_tmp = $_FILES['expediente']['tmp_name'];
            $file_type = $_FILES['expediente']['type'];
    
            // Verifica que el archivo sea un PDF
            if($file_type == 'application/pdf'){
                $expe_con = file_get_contents($file_tmp);
            } else {
                die("Error: El archivo debe ser un PDF.");
            }
        } else {
            die("Error: No se pudo subir el archivo.");
        }
    
        try {
            $pdo = new PDO('mysql:host=your_host;dbname=your_db', 'your_user', 'your_password');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $stmt = $pdo->prepare("INSERT INTO $this->tabla (nombre, rfc, curp, direccion, num, cod_postal, colonia, expediente) VALUES (:nombre, :rfc, :curp, :direccion, :num, :cod_postal, :colonia, :expediente)");
    
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':rfc', $this->rfc);
            $stmt->bindParam(':curp', $this->curp);
            $stmt->bindParam(':direccion', $this->direccion);
            $stmt->bindParam(':num', $this->num, PDO::PARAM_INT);
            $stmt->bindParam(':cod_postal', $this->cod_postal);
            $stmt->bindParam(':colonia', $this->colonia);
            $stmt->bindParam(':expediente', $expe_con, PDO::PARAM_LOB);
    
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
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