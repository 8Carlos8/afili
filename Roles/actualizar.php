<?php
require_once('../Logica/Rol.php');
require_once('../Sesion/header.php');

$rol = new Rol();
if (isset($_POST['id'])) {
    $rol->actualizaRegistro();
} else {
    if (isset($_GET['id'])) {
        $rol->id = $_GET['id'];
        $rol->recuperarRegistro($rol->id);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Actualizar Rol</title>
</head>
<body>
    <div class="container py-3">
        <div class="form-group text-center">
            <a href="index.php" class="btn btn-success">&nbsp;Lista de Roles</a>
        </div>
        <form name="frmModRol" action="actualizar.php" method="post">
            <input type="hidden" name="id" value="<?= $rol->id ?>">
            <table class="table">
                <div class="form-group">
                    <label>Nombre del Rol</label>
                    <input type="text" name="nombre_rol" id="nombre_rol" value="<?= $rol->nombre_rol ?>" class="form-control" required>
                </div>
                <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">&nbsp;Actualizar</button>
                </div>
            </table>
        </form>
    </div>
</body>
</html>