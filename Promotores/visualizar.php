<?php
require_once('../Logica/Promotor.php');
require_once('../Logica/Usuario.php');
require_once('../Sesion/header.php');

$promotor = new Promotor();
if ($_GET['id']) {
    $promotor->id = $_GET['id'];
    $promotor->recuperarRegistro($promotor->id);
}
$usuario = new Usuario();
$usuarios = $usuario->lista();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Promotor</title>
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
            <a href="index.php" class="btn btn-success">&nbsp;Lista de Promotores</a>
        </div>
        <table class="table">
            <tr>
                <td>
                    <label>ID</label>
                </td>
                <td>
                    <span><?= $promotor->id ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Usuario</label>
                </td>
                <td>
                    <?php foreach($usuarios as $usuario) { ?>
                    <span value="<?= $usuario->id?>"><?= $usuario->nombre ." ". $usuario->apellido_paterno ." ". $usuario->apellido_materno?></span>
                    <?php } ?>
                </td>
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