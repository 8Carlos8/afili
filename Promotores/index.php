<?php
require_once('../Sesion/header.php');
require_once('../Logica/Promotor.php');
require_once('../Logica/Usuario.php');
require_once('../Logica/Rol.php');

$promotor = new Promotor();
$usuario = new Usuario();
$rol = new Rol();
$promotores = $promotor->lista();
$usuarios = $usuario->lista();
$roles = $rol->lista();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Promotores</title>
</head>
<body>
    <div class="container-fluid py-3">
        <div class="form-group text-center">
            <a href="insertar.php" class="btn btn-success">Ingresar Nuevo Promotor</a>
        </div>
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Siglas Promotor</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php                
                    foreach($promotores as $promotor) {
                ?>
                    <tr>
                        <td><span title="<?= $promotor->id ?>"><?= $promotor->id?></span></td>
                            <?php
                                $usuarioEncontrado = null;
                                foreach ($usuarios as $usuario) {
                                    if ($usuario->id == $promotor->id_usuario) {
                                        $usuarioEncontrado = $usuario;
                                        break;
                                    }
                                }
                            ?>
                        <td><span title="<?= $promotor->id_usuario ?>"><?= $usuarioEncontrado ? $usuarioEncontrado->username : 'Usuario no encontrado' ?></span></td>
                            <?php
                                $rolEncontrado = null;
                                foreach ($roles as $rol) {
                                    if ($rol->id == $promotor->id_rol) {
                                        $rolEncontrado = $rol;
                                        break;
                                    }
                                }
                            ?>
                        <td><span title="<?= $promotor->id_rol ?>"><?= $rolEncontrado ? $rolEncontrado->nombre_rol : 'Rol no encontrado' ?></span></td>
                        <td><span title="<?= $promotor->nombre ?>"><?= $promotor->nombre ?></span></td>
                        <td><span title="<?= $promotor->apellido_paterno ?>"><?= $promotor->apellido_paterno ?></span></td>
                        <td><span title="<?= $promotor->apellido_materno ?>"><?= $promotor->apellido_materno ?></span></td>
                        <td><span title="<?= $promotor->correo ?>"><?= $promotor->correo ?></span></td>
                        <td><span title="<?= $promotor->telefono ?>"><?= $promotor->telefono ?></span></td>
                        <td><span title="<?= $promotor->siglas_promotor ?>"><?= $promotor->siglas_promotor ?></span></td>
                        <td>
                        <a href="visualizar.php?id=<?= $promotor->id ?>" class="btn btn-primary btn-space" title='Ver datalles '><i class="bi bi-binoculars"></i>&nbsp;Ver Detalles</a>&nbsp;
                        <a href="actualizar.php?id=<?= $promotor->id ?>" class="btn btn-info btn-space" title='Editar '><i class="bi bi-pencil"></i>&nbsp;Editar Afiliado</a>&nbsp;
                        <a href="eliminar.php?id=<?= $promotor->id ?>" class="btn btn-warning" title='Eliminar '><i class="bi bi-pencil"></i>&nbsp;Eliminar</a>&nbsp;
                        </td>
                    </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>