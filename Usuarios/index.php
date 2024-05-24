<?php 
require_once('../Logica/Usuario.php');
require_once('../Sesion/header.php');

$usuario = new Usuario();
$usuarios = $usuario->lista();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <style>
        body {
            background-color: white;
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Username</th>
                <th>Password</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($usuarios as $usuario) {?>
                <tr>
                    <td><span title="<?= $usuario->id ?>"><?= $usuario->id?></span></td>
                    <td><span title="<?= $usuario->nombre ?>"><?= $usuario->nombre?></td>
                    <td><span title="<?= $usuario->apellido_paterno ?>"><?= $usuario->apellido_paterno?></td>
                    <td><span title="<?= $usuario->apellido_materno ?>"><?= $usuario->apellido_materno?></td>
                    <td><span title="<?= $usuario->correo ?>"><?= $usuario->correo?></td>
                    <td><span title="<?= $usuario->username ?>"><?= $usuario->username?></td>
                    <td><span title="<?= $usuario->password ?>"><?= $usuario->password?></td>
                    <td><span title="<?= $usuario->rol ?>"><?= $usuario->rol?></td>
                    <td>
                        <a href="visualizar.php?username=<?= $usuario->username ?>" class="btn btn-primary" title='Ver datalles '><i class="bi bi-binoculars"></i>&nbsp;Ver Detalles</a>&nbsp;
                        <a href="actualizar.php?username=<?= $usuario->username ?>" class="btn btn-warning" title='Editar '><i class="bi bi-pencil"></i>&nbsp;Editar Usuario</a>&nbsp;
                        <a href="eliminar.php?username=<?= $usuario->username ?>" class="btn btn-warning" title='Editar '><i class="bi bi-pencil"></i>&nbsp;Eliminar</a>&nbsp;
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>