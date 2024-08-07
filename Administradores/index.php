<?php
require_once('../Logica/Administrador.php');
require_once('../Logica/Usuario.php');
require_once('../Logica/Rol.php');
require_once('../Sesion/header.php');

$administrador = new Administrador();
$usuario = new Usuario();
$rol = new Rol();
$administradores = $administrador->lista() ;
$usuarios = $usuario->lista();
$roles = $rol->lista();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../scripts/conf.js"></script>
    <title>Administradores</title>
</head>
<body>
    <div class="container-fluid py-3">
        <div class="form-group text-center">
            <i class="fas fa-folder-plus"></i>
            <a href="insertar.php" class="btn btn-success">Ingresar a un nuevo Administrador</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($administradores as $administrador) { 
                ?>
                        <tr>
                            <td><span title="<?= $administrador->id ?>"><?= $administrador->id ?></span></td>
                            <?php
                                // Buscar el usuario correspondiente
                                $usuarioEncontrado = null;
                                foreach ($usuarios as $usuario) {
                                    if ($usuario->id == $administrador->id_usuario) {
                                        $usuarioEncontrado = $usuario;
                                        break;
                                    }
                                }
                            ?>
                            <td><span title="<?= $administrador->id_usuario ?>"><?= $usuarioEncontrado ? $usuarioEncontrado->username : 'Usuario no encontrado' ?></span></td>
                            <?php
                                // Buscar el rol correspondiente
                                $rolEncontrado = null;
                                foreach ($roles as $rol) {
                                    if ($rol->id == $administrador->id_rol) {
                                    $rolEncontrado = $rol;
                                    break;
                                    }
                                }
                            ?>
                            <td><span title="<?= $administrador->id_rol ?>"><?= $rolEncontrado ? $rolEncontrado->nombre_rol : 'Rol no encontrado' ?></span></td>
                            <td><span title="<?= $administrador->nombre ?>"><?= $administrador->nombre ?></span></td>
                            <td><span title="<?= $administrador->apellido_paterno ?>"><?= $administrador->apellido_paterno ?></span></td>
                            <td><span title="<?= $administrador->apellido_materno ?>"><?= $administrador->apellido_materno ?></span></td>
                            <td><span title="<?= $administrador->correo ?>"><?= $administrador->correo ?></span></td>
                            <td><span title="<?= $administrador->telefono ?>"><?= $administrador->telefono ?></span></td>
                            <td>
                                <a href="visualizar.php?id=<?= $administrador->id ?>" class="btn btn-primary" title='Ver datalles '><i class="bi bi-binoculars"></i>&nbsp;Ver Detalles</a>&nbsp;
                                <a href="actualizar.php?id=<?= $administrador->id ?>" class="btn btn-info" title='Editar '><i class="bi bi-pencil"></i>&nbsp;Editar Administrador</a>&nbsp;
                                <button class="btn btn-warning btn-space" onclick="confirmarEliminar(<?= $administrador->id ?>)" title='Eliminar'><i class="bi bi-trash"></i>&nbsp;Eliminar</button>&nbsp;
                            </td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>