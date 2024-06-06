<?php
require_once('../Logica/Administrador.php');
require_once('../Logica/Usuario.php');
require_once('../Logica/Rol.php');
require_once('../Sesion/header.php');

$admnistrador = new Administrador();
$usuario = new Usuario();
$rol = new Rol();
$roles = $rol->lista();
$usuarios = $usuario->lista();
if (isset($_POST['id'])) {
    $admnistrador->insertarRegistro();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Administrador</title>
    <style>
        body{
            background-color: white;
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-group text-center">
            <a href="index.php" class="btn btn-success">&nbsp;Lista de Administradores</a>
        </div>
        <form name="frmInsAdm" action="insertar.php" method="post">
            <input type="hidden" name="id" value="0">
            <div class="form-group">
                <label>ID Usuario</label>
                <select name="id_usuario" id="id_usuario" class="form-control">
                    <option value="">Seleccionar Usuario</option>
                    <?php foreach ($usuarios as $usuario) { ?>
                        <option value="<?= $usuario->id ?>"><?= $usuario->username ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>ID Rol</label>
                <select name="id_rol" id="id_rol" class="form-control">
                    <option value="">Seleccionar Rol</option>
                    <?php foreach ($roles as $rol) { ?>
                        <option value="<?= $rol->id ?>"><?= $rol->nombre_rol ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div class="form-group">
                <label>Apellido Paterno</label>
                <input type="text" name="apellido_paterno" id="apellido_paterno" required>
            </div>
            <div class="form-group">
            <label>Apellido Materno</label>
                <input type="text" name="apellido_materno" id="apellido_materno" required>
            </div>
            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="correo" id="correo">
            </div>
            <div class="form-group">
                <label>Telefono</label>
                <input type="number" name="telefono" id="telefono" required>
            </div>
            <div class="form-group text-center">
                <a href="index.php">Regresar</a>
                <button class="btn btn-primary btn-lg btn-block">&nbsp; Registrar</button>
            </div>
        </form>
    </div>
</body>
</html>