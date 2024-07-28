<?php require_once('Modelo.php');?>
<?php
class Usuario extends Modelo{
    public $id;
    public $username;
    public $password;

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
        $this->password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

        $this->consulta = 
        "insert into $this->tabla
        (username, password)".
        "values (".
        "'$this->username',".
        "'$this->password');";

        $this->ejecutaComandoIUD();
    }

    function actualizaRegistro(){
        $this->id = $_POST['id'];
        $this->username = $_POST['username'];
        $this->password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

        $this->consulta = 
        "update $this->tabla set ".
        "username = '$this->username', ".
        "password = '$this->password' ".
        "where username = '$this->username'";

        $this->ejecutaComandoIUD();
    }

    function eliminaRegistro($id){
        $this->consulta = 
        "delete from $this->tabla ".
        "where id = $id;";

        $this->ejecutaComandoIUD();
    }
    
    function verificarPassword($username, $password) {
        $this->consulta = "SELECT * FROM $this->tabla WHERE username = '$username'";
        $dato = $this->encuentraUno();

        if (isset($dato)) {
            return password_verify($password, $dato->password);
        }
        return false;
    }
}
?>