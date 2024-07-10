<?php
require_once('../Logica/Usuario.php');
require_once('../Sesion/header.php');
$usuario = new Usuario();
if (isset($_POST['username'])) {
    $usuario->actualizaRegistro();
}else {
    if (isset($_GET['username'])) {
        $usuario->username = $_GET['username'];
        $usuario->recuperarUsuario($usuario->username);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Modificar Usuario</title>
</head>
<body>
<div class="container py-2">
    <?php if ($rolUsuarioActual == 1) { ?>
    <div class="form-group text-center">
        <a href="index.php" class="btn btn-success">&nbsp;Lista de Usuario</a>
    </div>
    <?php } ?>
    <form name="frmModProd" method="post" action="actualizar.php">
        <input type="hidden" name="id" value="<?= $usuario->username ?>">
        <table class="table">
                <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" name="username" value="<?= $usuario->username ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" name="password" value="<?= $usuario->password ?>" class="form-control" required>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">&nbsp;Actualizar</button>
                </div>
        </table>
    </form>
</div>
</body>
</html>