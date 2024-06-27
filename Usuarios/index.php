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
    <link rel="stylesheet" href="../css/style.css">
    <title>Lista de Usuarios</title>
</head>
<body>
    <div class="container">
        <br>
        <div class="form-group text-center">
            <a href="insertar.php" class="btn btn-success">Ingresa Nuevo Usuario</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($usuarios as $usuario) {?>
                    <tr>
                        <td><span title="<?= $usuario->id ?>"><?= $usuario->id?></span></td>
                        <td><span title="<?= $usuario->username ?>"><?= $usuario->username?></td>
                        <td><span title="<?= $usuario->password ?>"><?= $usuario->password?></td>
                        <td>
                            <a href="visualizar.php?username=<?= $usuario->username ?>" class="btn btn-primary" title='Ver datalles '><i class="bi bi-binoculars"></i>&nbsp;Ver Detalles</a>&nbsp;
                            <a href="actualizar.php?username=<?= $usuario->username ?>" class="btn btn-warning" title='Editar '><i class="bi bi-pencil"></i>&nbsp;Editar Usuario</a>&nbsp;
                            <a href="eliminar.php?id=<?= $usuario->id ?>" class="btn btn-warning" title='Eliminar '><i class="bi bi-pencil"></i>&nbsp;Eliminar</a>&nbsp;
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>