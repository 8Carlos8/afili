<?php
require_once('../Sesion/header.php');
require_once('../Logica/Promotor.php');
require_once('../Logica/Usuario.php');

$promotor = new Promotor();
$usuario = new Usuario();
$promotores = $promotor->lista();
$usuarios = $usuario->lista();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotores</title>
    <style>
        body {
            background-color: white;
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="form-group text-center">
            <i class="fas fa-folder-plus"></i>
            <a href="insertar.php" class="btn-btn-succes">Ingresar a un nuevo afiliado</a>
        </div>
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Usuario</th>
                <th>Siglas Promotor</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php foreach($promotores as $promotor) {?>
                    <?php foreach($usuarios as $usuario) {?>
                    <tr>
                        <td><span title="<?= $promotor->id ?>"><?= $promotor->id?></span></td>
                        <td><span title="<?= $promotor->id_usuario . $usuario->id ?>"><?= $usuario->nombre ." ". $usuario->apellido_paterno ." ". $usuario->apellido_materno?></span></td>
                        <td><span title="<?= $promotor->siglas_promotor ?>"><?= $promotor->siglas_promotor ?></span></td>
                        <td>
                        <a href="visualizar.php?id=<?= $promotor->id ?>" class="btn btn-primary" title='Ver datalles '><i class="bi bi-binoculars"></i>&nbsp;Ver Detalles</a>&nbsp;
                        <a href="actualizar.php?id=<?= $promotor->id ?>" class="btn btn-warning" title='Editar '><i class="bi bi-pencil"></i>&nbsp;Editar Promotor</a>&nbsp;
                        <a href="eliminar.php?id=<?= $promotor->id ?>" class="btn btn-warning" title='Editar '><i class="bi bi-pencil"></i>&nbsp;Eliminar</a>&nbsp;
                        </td>
                    </tr>
                    <?php }
                } ?>
            </tbody>
        </table>
    </div>
</body>
</html>