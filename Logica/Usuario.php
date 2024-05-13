<?php require_once('Modelo.php');?>
<?php
class Usuario extends Modelo{
    public $id;
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
            $this->username = $dato->username;
            $this->password = $dato->password;

            $this->ejecutaComandoIUD();
        }
        return (isset($dato));
    }

    function insertarRegistro(){
        $this->id = $_POST['id'];
        $this->username = $_POST['username'];
        $this->password = $_POST['password'];
        $this->rol = $_POST['rol'];

        $this->consulta = 
        "insert into $this->tabla
        (username, password, rol)".
        "values (".
        "'$this->username',".
        "'$this->password',".
        "$this->rol);";

        $this->ejecutaComandoIUD();
    }

    function actualizaRegistro(){
        $this->id = $_POST['id'];
        $this->username = $_POST['username'];
        $this->password = $_POST['password'];
        $this->rol = $_POST['rol'];

        $this->consulta = 
        "update $this->tabla set".
        "username = '$this->username',".
        "password = '$this->password',".
        "rol = $this->rol".
        "where id = $this->id";

        $this->ejecutaComandoIUD();
    }

    function eliminaRegistro($id){
        $this->consulta = 
        "delete from $this->tabla".
        "where id = $this->id;";

        $this->$ejecutaComandoIUD();
    }
}
?>