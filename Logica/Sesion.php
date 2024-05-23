<?php require_once('Modelo.php');?>
<?php
class Sesion extends Modelo{
    public static function autenticar($username, $password, $rol) {
        try {
            $conn = new self();
            $miconsulta = "SELECT * FROM usuario WHERE username = :username AND password = :password";
            $stmt = $conn->mbd->prepare($miconsulta);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            $result = $stmt->fetchAll();

            if (count($result) > 0) {
                foreach ($result as $registro) {
                    session_start();
                    $_SESSION["rol"] = $registro['rol'];
                    $_SESSION["id"] =  $registro['id'];
                    $_SESSION["username"] = $registro['username'];
                    $_SESSION["password"] = $registro['password'];

                    if ($_SESSION["rol"] == '1') {
                        header('Location: ruta');//sustituir la ruta
                    } elseif ($_SESSION["rol"] == '2') {
                        header('Location: ruta');//sustituir la ruta
                    } else {
                        header('Location: Eventos/index.php');
                    }
                }
            } else {
                header('Location: index.php?error=1');
            }
        } catch (PDOException $e) {
            header('Location: index.php?error=2');
        }
    }

    public static function autenticarRol($roles) {
        if (!isset($_SESSION)) {
            session_start();
        }
        
        if (!in_array($_SESSION["rol"], $roles)) {
            header('Location: index.php?error=1');
        }
    }

    public static function validarRol($roles) {
        if (!isset($_SESSION)) {
            session_start();
        }
        
        if (in_array($_SESSION["rol"], $roles)) {
            return true;
        }
        return false;
    }

} // fin de la clase
?>