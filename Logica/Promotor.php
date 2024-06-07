<?php require_once('Modelo.php'); ?>
<?php
class Promotor extends Modelo{
    public $id;
    public $id_usuario;
    public $id_rol;
    public $nombre;
    public $apellido_paterno;
    public $apellido_materno;
    public $correo;
    public $telefono;
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
            $this->id_rol = $dato->id_rol;
            $this->nombre = $dato->nombre;
            $this->apellido_paterno = $dato->apellido_paterno;
            $this->apellido_materno = $dato->apellido_materno;
            $this->correo = $dato->correo;
            $this->telefono = $dato->telefono;
            $this->siglas_promotor = $dato->siglas_promotor;
        }
    }

    function insertarRegistro(){
        $this->id = $_POST['id'];
        $this->id_usuario = $_POST['id_usuario'];
        $this->id_rol = $_POST['id_rol'];
        $this->nombre = $_POST['nombre'];
        $this->apellido_paterno = $_POST['apellido_paterno'];
        $this->apellido_materno = $_POST['apellido_materno'];
        $this->correo = $_POST['correo'];
        $this->telefono = $_POST['telefono'];
        $this->siglas_promotor = $_POST['siglas_promotor'];

        $this->consulta =
        "insert into $this->tabla (id_usuario, id_rol, nombre, apellido_paterno, apellido_materno, correo, telefono, siglas_promotor)".
        "values (".
        "$this->id_usuario,".
        "$this->id_rol,".
        "'$this->nombre',".
        "'$this->apellido_paterno',".
        "'$this->apellido_materno',".
        "'$this->correo',".
        "'$this->telefono',".
        "'$this->siglas_promotor');";

        $this->ejecutaComandoIUD();
    }

    function actualizaRegistro(){
        $this->id = $_POST['id'];
        $this->id_usuario = $_POST['id_usuario'];
        $this->id_rol = $_POST['id_rol'];
        $this->nombre = $_POST['nombre'];
        $this->apellido_paterno = $_POST['apellido_paterno'];
        $this->apellido_materno = $_POST['apellido_materno'];
        $this->correo = $_POST['correo'];
        $this->telefono = $_POST['telefono'];
        $this->siglas_promotor = $_POST['siglas_promotor'];

        $this->consulta = 
        "update $this->tabla set ".
        "id_usuario = $this->id_usuario,".
        "id_rol = $this->id_rol,".
        "nombre = '$this->nombre',".
        "apellido_paterno = '$this->apellido_paterno',".
        "apellido_materno = '$this->apellido_materno',".
        "correo = '$this->correo',".
        "telefono = '$this->telefono',".
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