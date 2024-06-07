<?php
require_once('../Logica/Administrador.php');
require_once('../Logica/Usuario.php');
require_once('../Logica/Rol.php');
require_once('../Sesion/header.php');

$administrador = new Administrador();
$usuario = new Usuario();
$rol = new Rol();
$usuarios = $usuario->lista();
$roles = $rol->lista();
if ($_GET['id']) {
    $administrador->id = $_GET['id'];
    $administrador->recuperarRegistro($administrador->id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Administrador</title>
    <style>
        body {
            background-color: white;
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container py-2">
        <div class="form-group text-center">
            <a href="index.php" class="btn btn-success">&nbsp;Lista de Administradores</a>
        </div>
        <table class="table">
            <tr>
                <td>
                    <label>ID</label>
                </td>
                <td>
                    <span><?= $administrador->id ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Usuario</label>
                </td>
                <td>
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
                    <span title="<?= $administrador->id_usuario ?>"><?= $usuarioEncontrado ? $usuarioEncontrado->username : 'Usuario no encontrado' ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Rol</label>
                </td>
                <td>
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
                    <span title="<?= $administrador->id_rol ?>"><?= $rolEncontrado ? $rolEncontrado->nombre_rol : 'Rol no encontrado' ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Nombre</label>
                </td>
                <td>
                    <span><?= $administrador->nombre ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Apellido Paterno</label>
                </td>
                <td>
                    <span><?= $administrador->apellido_paterno ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Apellido Materno</label>
                </td>
                <td>
                    <span><?= $administrador->apellido_materno ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Correo</label>
                </td>
                <td>
                    <span><?= $administrador->correo ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Telefono</label>
                </td>
                <td><?= $administrador->telefono ?></td>
            </tr>
        </table>
    </div>
</body>
</html>