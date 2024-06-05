<?php
require_once('../Logica/Administrador.php');
require_once('../Logica/Usuario.php');
require_once('../Sesion/header.php');

$administrador = new Administrador();
$usuario = new Usuario();
$administradores = $administrador->lista() ;
$usuarios = $usuario->lista();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administradores</title>
    <style>
        body {
            background-color: white;
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body>
<div class="form-group text-center">
            <i class="fas fa-folder-plus"></i>
            <a href="insertar.php" class="btn-btn-succes">Ingresar a un nuevo Administrador</a>
        </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Usuario</th>
                <th>ID Rol</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($administradores as $administrador) { ?>
                <?php foreach ($usuarios as $usuario) { ?>
                <tr>
                    <td><span title="<?= $administrador->id ?>"><?= $administrador->id ?></span></td>
                    <td><span title="<?= $administrador->id_usuario ?>"><?= $administrador->id_usuario ?></span></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>