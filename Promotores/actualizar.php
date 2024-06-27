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
if (isset($_POST['id'])) {
    $promotor->actualizaRegistro();
} else {
    if (isset($_GET['id'])) {
        $promotor->id = $_GET['id'];
        $promotor->recuperarRegistro($promotor->id);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Editar Promotor</title>
</head>
<body>
    <div class="container py-3">
        <div class="form-group text-center">
            <a href="index.php" class="btn btn-success">&nbsp;Lista Promotores</a>
        </div>
        <form name="frmModPro" method="post" action="actualizar.php">
            <input type="hidden" name="id" value="<?= $promotor->id ?>">
            <table class="table">
            <div class="form-group">
                    <label>ID Usuario</label>
                    <select name="id_usuario" id="id_usuario" class="form-control">
                        <?php foreach ($usuarios as $usuario) { ?>
                            <option value="<?= $usuario->id ?>" <?= $usuario->id == $promotor->id_usuario ? 'selected' : '' ?>>
                                <?= $usuario->username ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>ID Rol</label>
                    <select name="id_rol" id="id_rol" class="form-control">
                        <?php foreach ($roles as $rol) { ?>
                            <option value="<?= $rol->id ?>" <?= $rol->id == $promotor->id_rol ? 'selected' : '' ?>>
                                <?= $rol->nombre_rol ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?= $promotor->nombre ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Apellido Paterno</label>
                    <input type="text" name="apellido_paterno" id="apellido_paterno" value="<?= $promotor->apellido_paterno ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Apellido Materno</label>
                    <input type="text" name="apellido_materno" id="apellido_materno" value="<?= $promotor->apellido_materno ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Correo</label>
                    <input type="email" name="correo" id="correo" value="<?= $promotor->correo ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Telefono</label>
                    <input type="number" name="telefono" id="telefono" value="<?= $promotor->telefono ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Siglas Promotor</label>
                    <input type="text" id="siglas_promotor" name="siglas_promotor" value="<?= $promotor->siglas_promotor ?>" class="form-control">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">&nbsp;Actualizar</button>
                </div>
            </table>
        </form>
    </div>
</body>
</html>