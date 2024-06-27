<?php
require_once('../Logica/Rol.php');
require_once('../Sesion/header.php');

$rol = new Rol();
if ($_GET['id']) {
    $rol->id = $_GET['id'];
    $rol->recuperarRegistro($rol->id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Visualizar Rol</title>
</head>
<body>
    <div class="container py-2">
        <div class="form-group text-center">
            <a href="index.php" class="btn btn-success">&nbsp;Lista de Roles</a>
        </div>
        <table class="table">
            <tr>
                <td>
                    <label>ID</label>
                </td>
                <td>
                    <span><?= $rol->id ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Nombre del Rol</label>
                </td>
                <td>
                    <span><?= $rol->nombre_rol ?></span>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>