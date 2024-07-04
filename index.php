<?php
require_once("Logica/Usuario.php");
$errores = array();
$usuario = new Usuario();
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($usuario->recuperarUsuario($username)) {
        if ($usuario->password == $password) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['username'] = $usuario->username;
            $_SESSION['id'] = $usuario->id;
            var_dump($_SESSION['id']);
            header("Location: Sesion/Inicio.php");
        } else {
            array_push($errores, "El usuario o contraseña son incorrectas");
        }
    } else {
        array_push($errores, "El usuario o contraseña son incorrectos");
    }
} else {
    if (isset($_POST['username']) && empty($_POST['password'])) {
        array_push($errores, "El nombre del usuario no puede estar vacio");
    }
    if (isset($_POST['password']) && empty($_POST['password'])) {
        array_push($errores, "La contraseña no puede estar vacia");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="sesion">
    <header>
        <h1 class="titulo">
            <center>CANACO</center>
        </h1>
    </header>
    <img src="../css/img/logo.png">
    <div class="container-s">
        <?php if (isset($errores) && count($errores) > 0) { ?>
            <?php foreach ($errores as $error) { ?>
                <div class="alert alert-danger-s" role="alert"><?= $error ?></div>
            <?php } ?>
        <?php } ?>

        <form name="frmLogin" method="post" action="index.php">
            <h1 align="center">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="70" height="70" viewBox="0 0 24 24" stroke-width="2" stroke="#122543" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="12" cy="12" r="9" />
                    <circle cx="12" cy="10" r="3" />
                    <path d="M6.75 16a8.5 8.5 0 0 1 10.5 0" />
                </svg>
            </h1>
            <div class="form-group-s">
                <label for="username">Nombre del usuario:</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group-s">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary-s btn-block">Iniciar sesión</button>
        </form>
        <br>
        <div class="form-group-s text-center">
                <p>¿No tienes usuario?
                <a href="Usuarios/insertar.php" class="btn btn-primary-s">&nbsp;Registrate</a>
        </div>
    </div>
</body>
</html>