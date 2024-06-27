<?php
require_once('../Logica/Promotor.php');
require_once('../Logica/Usuario.php');
require_once('../Logica/Rol.php');
require_once('../Sesion/header.php');

$promotor = new Promotor();
$usuario = new Usuario();
$rol = new Rol();
$usuarios = $usuario->lista();
$roles = $rol->lista();
if ($_GET['id']) {
    $promotor->id = $_GET['id'];
    $promotor->recuperarRegistro($promotor->id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Visualizar Promotor</title>
</head>
<body>
    <div class="container py-2">
        <div class="form-group text-center">
            <a href="index.php" class="btn btn-success">&nbsp;Lista de Promotores</a>
        </div>
        <table class="table">
            <tr>
                <td>
                    <label>Usuario</label>
                </td>
                <td>
                    <?php
                        // Buscar el usuario correspondiente
                        $usuarioEncontrado = null;
                        foreach ($usuarios as $usuario) {
                            if ($usuario->id == $promotor->id_usuario) {
                                $usuarioEncontrado = $usuario;
                                break;
                            }
                        }
                    ?>
                    <span title="<?= $promotor->id_usuario ?>"><?= $usuarioEncontrado ? $usuarioEncontrado->username : 'Usuario no encontrado' ?></span>
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
                            if ($rol->id == $promotor->id_rol) {
                            $rolEncontrado = $rol;
                            break;
                            }
                        }
                    ?>
                    <span title="<?= $promotor->id_rol ?>"><?= $rolEncontrado ? $rolEncontrado->nombre_rol : 'Rol no encontrado' ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Nombre</label>
                </td>
                <td>
                    <span><?= $promotor->nombre ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Apellido Paterno</label>
                </td>
                <td>
                    <span><?= $promotor->apellido_paterno ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Apellido Materno</label>
                </td>
                <td>
                    <span><?= $promotor->apellido_materno ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Correo</label>
                </td>
                <td>
                    <span><?= $promotor->correo ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Telefono</label>
                </td>
                <td><?= $promotor->telefono ?></td>
            </tr>
            <tr>
                <td>
                    <label>Siglas Promotor</label>
                </td>
                <td>
                    <span><?= $promotor->siglas_promotor ?></span>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>