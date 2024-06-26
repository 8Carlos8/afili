<?php
require_once('../Logica/Administrador.php');
require_once('../Logica/Usuario.php');
require_once('../Logica/Rol.php');
require_once('../Sesion/header.php');

$administrador = new Administrador();
$usuario = new Usuario();
$rol = new Rol();
$roles = $rol->lista();
$usuarios = $usuario->lista();
if (isset($_POST['id'])) {
    $administrador->actualizaRegistro();
} else {
    if (isset($_GET['id'])) {
        $administrador->id = $_GET['id'];
        $administrador->recuperarRegistro($administrador->id);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Actualiza Administrador</title>
</head>
<body>
    <div class="container py-3">
        <div class="form-group text-center">
            <a href="index.php" class="btn btn-success">&nbsp;Lista de Administradores</a>
        </div>
        <form name="frmActAdm" action="actualizar.php" method="post">
            <input type="hidden" name="id" value="<?= $administrador->id ?>">
            <table class="table">
                <div class="form-group">
                    <label>ID Usuario</label>
                    <select name="id_usuario" id="id_usuario" class="form-control">
                        <?php foreach ($usuarios as $usuario) { ?>
                            <option value="<?= $usuario->id ?>" <?= $usuario->id == $administrador->id_usuario ? 'selected' : '' ?>>
                                <?= $usuario->username ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>ID Rol</label>
                    <select name="id_rol" id="id_rol" class="form-control">
                        <?php foreach ($roles as $rol) { ?>
                            <option value="<?= $rol->id ?>" <?= $rol->id == $administrador->id_rol ? 'selected' : '' ?>>
                                <?= $rol->nombre_rol ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?= $administrador->nombre ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Apellido Paterno</label>
                    <input type="text" name="apellido_paterno" id="apellido_paterno" value="<?= $administrador->apellido_paterno ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Apellido Materno</label>
                    <input type="text" name="apellido_materno" id="apellido_materno" value="<?= $administrador->apellido_materno ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Correo</label>
                    <input type="email" name="correo" id="correo" value="<?= $administrador->correo ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Telefono</label>
                    <input type="number" name="telefono" id="telefono" value="<?= $administrador->telefono ?>" class="form-control">
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary">&nbsp;Actualizar</button>
                </div>
            </table>
        </form>
    </div>
</body>
</html>