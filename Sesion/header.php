<?php
include_once("../Logica/Usuario.php");
session_start();
$usuario = new Usuario();

$username = $_SESSION['username'];
$usuarios = $usuario->recuperarUsuario($username);

if (!isset($username)  || empty($username)) {
    header("Location: Inicio.php");
}
if (isset($_SESSION['rol'])) {
    $rol = $_SESSION['rol'];
}
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Mi Cuenta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body {
            background-color: #111D7E;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #111D7E;
        }

        .navbar-brand {
            color: #111D7E;
        }

        .nav-link {
            color: #111D7E;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #111D7E;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../Sesion/Inicio.php" style="color: white;">Menu Principal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Usuarios/actualizar.php?username=<?= $usuario->username ?>" style="color: white;">Cambio de Datos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logaut.php" style="color: white;">Cerrar Sesión</a>
            </li>
        </ul>
        <a class="navbar-brand" style="color: white;"><?= $username ?></a>
    </nav>
</body>

</html>