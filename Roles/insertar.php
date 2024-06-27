<?php
require_once('../Logica/Rol.php');
require_once('../Sesion/header.php');

$rol = new Rol();
if (isset($_POST['id'])) {
    $rol->insertaRegistro();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Insertar Administrador</title>
</head>
<body>
    <div class="container py-3">
        <div class="form-group text-center">
            <a href="index.php" class="btn btn-success">&nbsp;Lista de Administradores</a>
        </div>
        <form name="frmInsAdm" action="insertar.php" method="post">
            <input type="hidden" name="id" value="0">
            <div class="form-group">
                <label>Nombre del Rol</label>
                <input type="text" name="nombre_rol" id="nombre_rol" class="form-control" required>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary">&nbsp;Registrar</button>
            </div>
        </form>
    </div>
</body>
</html>