<?php
require_once('../Logica/Usuario.php');
require_once('../Sesion/header.php');
$usuario = new Usuario();
    if ($_GET['username']) {
        $usuario->username = $_GET['username'];
        $usuario->recuperarUsuario($usuario->username);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <style>
        body {
            background-color: #f06c6c;
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body>
<div class="container py-2">
    <div class="form-group text-center">
        <a href="index.php" class="btn btn-success"><img src="../images/view-list.svg">&nbsp;Lista de Usuario</a>
    </div>
    <table class="table">

            <tr>
                <td>
                <label>ID</label>
                </td>
                <td>
                    <span><?= $usuario->id ?></span>
                </td>
            </tr>
            <tr>
                <td><label>Usuario</label></td>
                <td><?= $usuario->username ?></td>
            </tr>
            <tr>
                <td><label>Contraseña</label></td>
                <td><span><?= $usuario->password ?></span></td>
            </tr>
        </table>
</div>
</body>
</html>