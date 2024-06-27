<?php
require_once('../Logica/Promotor.php');
require_once('../Logica/Usuario.php');
require_once('../Logica/Rol.php');
require_once('../Sesion/header.php');

$promotor = new Promotor();
$usuario = new Usuario();
$rol = new Rol();
$roles = $rol->lista();
$usuarios = $usuario->lista();
if (isset($_POST['id'])) {
    $promotor->insertarRegistro();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Insertar Promotor</title>
</head>
<body>
    <div class="container py-3">
        <div class="form-group text-center">
            <a href="index.php" class="btn btn-success">&nbsp;Lista de Promotores</a>
        </div>
        <form name="frmInsPro" method="post" action="insertar.php">
            <input type="hidden" name="id" value="0">
            <table class="table">
                <div class="form-group">
                    <label>Usuario</label>
                    <select name="id_usuario" id="id_usuario" class="form-control">
                        <option value="">Seleccionar Usuario</option>
                        <?php foreach ($usuarios as $usuario) { ?>
                            <option value="<?= $usuario->id ?>"><?= $usuario->username ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Rol</label>
                    <select name="id_rol" id="id_rol" class="form-control">
                        <option value="">Seleccionar Rol</option>
                        <?php foreach ($roles as $rol) { ?>
                            <?php
                                if ($rol->nombre_rol == "Promotor") { ?>
                                    <option value="<?= $rol->id ?>"><?= $rol->nombre_rol ?></option>
                                <?php break; } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del Promotor" required>
                </div>
                <div class="form-group">
                    <label>Apellido Paterno</label>
                    <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" placeholder="Apellido Paterno del Promotor" required>
                </div>
                <div class="form-group">
                <label>Apellido Materno</label>
                    <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" placeholder="Apellido Materno del Promotor" required>
                </div>
                <div class="form-group">
                    <label>Correo</label>
                    <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo del Promotor">
                </div>
                <div class="form-group">
                    <label>Telefono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Teléfono del Promotor" required>
                </div>
                <div class="form-group">
                    <label>Siglas del Promotor</label>
                    <input type="text" name="siglas_promotor" id="siglas_promotor" class="form-control" placeholder="Siglas del Promotor" required>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary">&nbsp;Registrar</button>
                </div>
            </table>
        </form>
    </div>
</body>
</html>