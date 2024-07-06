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
    <link rel="stylesheet" href="../css/style.css">
    <script src="../scripts/conf.js"></script>
    <title>Roles</title>
</head>
<body>
    <div class="container-fluid py-3">
        <div class="form-group text-center">
            <i class="fas fa-folder-plus"></i>
            <a href="insertar.php" class="btn btn-success">Ingresar un nuevo Rol</a>
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
                            <a href="actualizar.php?id=<?= $rol->id ?>" class="btn btn-info" title='Editar '><i class="bi bi-pencil"></i>&nbsp;Editar Rol</a>&nbsp;
                            <button class="btn btn-warning btn-space" onclick="confirmarEliminar(<?= $rol->id ?>)" title='Eliminar'><i class="bi bi-trash"></i>&nbsp;Eliminar</button>&nbsp;
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>