<?php
require_once('../Logica/Promotor.php');
require_once('../Logica/Usuario.php');
require_once('../Sesion/header.php');

$promotor = new Promotor();
$usuario = new Usuario();
$usuarios = $usuario->lista();
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
    <title>Editar Promotor</title>
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
            <a href="index.php" class="btn btn-success">&nbsp;Lista Promotores</a>
        </div>
        <form name="frmModPro" method="post" action="actualizar.php">
            <input type="hidden" name="id" value="<?= $promotor->id ?>">
            <table class="table">
                <div class="form-group">
                    <label>Usuario</label>
                    <select name="id_usuario" id="id_usuario" class="form-control">
                        <?php foreach($usuarios as $usuario) { ?>
                        <option value="<?= $usuario->id ?>"><?= $usuario->nombre ." ". $usuario->apellido_paterno ." ". $usuario->apellido_materno ?></option>
                        <option value="<?= $usuario->id ?>"><?= $usuario->nombre ." ". $usuario->apellido_paterno ." ". $usuario->apellido_materno ?></option>
                        <?php } ?>
                </select>
                </div>
                <div class="form-group">
                    <label>Siglas Promotor</label>
                    <input type="text" id="siglas_promotor" name="siglas_promotor" value="<?= $promotor->siglas_promotor ?>" required>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">&nbsp;ENVIAR</button>
                </div>
            </table>
        </form>
    </div>
</body>
</html>