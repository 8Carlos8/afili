<?php
require_once('../Logica/Rol.php');
require_once('../Sesion/header.php');

$rol = new Rol();
$roles = $rol->lista();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles</title>
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
            <a href="insertar.php" class="btn-btn-succes">Ingresar un nuevo Rol</a>
        </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $rol) { ?>
                <tr>
                    <td><span title="<?= $rol->id ?>"><?= $rol->id ?></span></td>
                    <td><span title="<?= $rol->nombre_rol ?>"><?= $rol->nombre_rol ?></span></td>
                    <td>
                        <a href="visualizar.php?id=<?= $rol->id ?>" class="btn btn-primary" title='Ver datalles '><i class="bi bi-binoculars"></i>&nbsp;Ver Detalles</a>&nbsp;
                        <a href="actualizar.php?id=<?= $rol->id ?>" class="btn btn-warning" title='Editar '><i class="bi bi-pencil"></i>&nbsp;Editar Rol</a>&nbsp;
                        <a href="eliminar.php?id=<?= $rol->id ?>" class="btn btn-warning" title='Editar '><i class="bi bi-pencil"></i>&nbsp;Eliminar</a>&nbsp;
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>