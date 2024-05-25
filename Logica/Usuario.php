<?php require_once('Modelo.php');?>
<?php
class Usuario extends Modelo{
    public $id;
    public $nombre;
    public $apellido_paterno;
    public $apellido_materno;
    public $correo;
    public $username;
    public $password;
    public $rol;

    function __construct(){
        parent::__construct();
        $this->tabla = 'usuario';
    }

    function lista(){
        $this->consulta = "select * from $this->tabla";
        return $this->encuentraTodos();
    }

    function recuperarUsuario($user){
        $this->consulta = "select * from $this->tabla where username = '$user'";
        $dato = $this->encuentraUno();

        if (isset($dato)) {
            $this->id = $dato->id;
            $this->nombre = $dato->nombre;
            $this->apellido_paterno = $dato->apellido_paterno;
            $this->apellido_materno = $dato->apellido_materno;
            $this->correo = $dato->correo;
            $this->username = $dato->username;
            $this->password = $dato->password;
            $this->rol = $dato->rol;

            $this->ejecutaComandoIUD();
        }
        return (isset($dato));
    }

    function insertarRegistro(){
        $this->id = $_POST['id'];
        $this->nombre = $_POST['nombre'];
        $this->apellido_paterno = $_POST['apellido_paterno'];
        $this->apellido_materno = $_POST['apellido_materno'];
        $this->correo = $_POST['correo'];
        $this->username = $_POST['username'];
        $this->password = $_POST['password'];
        $this->rol = $_POST['rol'];

        $this->consulta = 
        "insert into $this->tabla
        (nombre, apellido_paterno, apellido_materno, correo, username, password, rol)".
        "values (".
        "'$this->nombre',".
        "'$this->apellido_paterno',".
        "'$this->apellido_materno',".
        "'$this->correo',".
        "'$this->username',".
        "'$this->password',".
        "$this->rol);";

        $this->ejecutaComandoIUD();
    }

    function actualizaRegistro(){
        $this->id = $_POST['id'];
        $this->nombre = $_POST['nombre'];
        $this->apellido_paterno = $_POST['apellido_paterno'];
        $this->apellido_materno = $_POST['apellido_materno'];
        $this->correo = $_POST['correo'];
        $this->username = $_POST['username'];
        $this->password = $_POST['password'];
        $this->rol = $_POST['rol'];

        $this->consulta = 
        "update $this->tabla set ".
        "nombre = '$this->nombre', ".
        "apellido_paterno = '$this->apellido_paterno', ".
        "apellido_materno = '$this->apellido_materno', ".
        "correo = '$this->correo', ".
        "username = '$this->username', ".
        "password = '$this->password', ".
        "rol = $this->rol ".
        "where username = '$this->username'";

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