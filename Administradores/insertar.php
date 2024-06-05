<?php
require_once('../Logica/Administrador.php');
require_once('../Logica/Usuario.php');
require_once('../Sesion/header.php');

$admnistrador = new Administrador();
$usuario = new Usuario();
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
        </form>
    </div>
</body>
</html>