<?php 
include_once("header.php"); 
include_once("../Logica/Administrador.php");
include_once("../Logica/Rol.php");
include_once("../Logica/Promotor.php");
include_once("../Logica/Usuario.php");

$administrador = new Administrador();
$promotor = new Promotor();
$rol = new Rol();
$usuario = new Usuario();
$usuarios = $usuario->lista();
$roles = $rol->lista();
$administradores = $administrador->lista();
$promotores = $promotor->lista();

$usuarioActual = null;
$rolUsuarioActual = null;

foreach ($administradores as $administrador) {
    if ($administrador->id_usuario == $_SESSION['id']) {
        $usuarioActual = $administrador;
        $rolUsuarioActual = 1;
        
        if (isset($_GET['idAd'])) {
            $administrador->id = $_GET['idAd'];
            $administrador->recuperarRegistro($administrador->id);
        }
        break;
    } else {
        $rolUsuarioActual = 0;
    }
}

if ($usuarioActual == null) {
    foreach ($promotores as $promotor) {
        if ($promotor->id_usuario == $_SESSION['id']) {
            $usuarioActual = $promotor;
            $rolUsuarioActual = 2;
            
            if (isset($_GET['idPr'])) {
                $promotor->id = $_GET['idPr'];
                $promotor->recuperarRegistro($promotor->id);
            }
            break;
        } else {
            $rolUsuarioActual = 0;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body {
            
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        .btn-success {
            background-color: #23c93c;
            border: none;
            border-radius: 10px;
            transition: background-color 0.3s;
        }

        .btn-success:hover {
            background-color: #1e9c2b;
        }
    </style>
</head>
<body>
    <?php if ($rolUsuarioActual == 1) { ?>
        <div class="container py-2">
            <div class="form-group text-center">
                <a href="../Usuarios/index.php" class="btn btn-success form-control">Usuarios</a>
            </div>
        </div>
        <div class="container py-2">
            <div class="form-group text-center">
                <a href="../Promotores/index.php" class="btn btn-success form-control">Promotores</a>
            </div>
        </div>
        <div class="container py-2">
            <div class="form-group text-center">
                <a href="../Roles/index.php" class="btn btn-success form-control">Roles</a>
            </div>
        </div>
        <div class="container py-2">
            <div class="form-group text-center">
                <a href="../Administradores/index.php" class="btn btn-success form-control">Administradores</a>
            </div>
        </div>
    <?php } ?>

    <?php if ($rolUsuarioActual == 2 || $rolUsuarioActual == 1 || $rolUsuarioActual == 0) { ?>
        <div class="container py-2">
            <div class="form-group text-center">
                <a href="../Afiliados/index.php" class="btn btn-success form-control">Afiliados</a>
            </div>
        </div>
        <div class="container py-2">
            <div class="form-group text-center">
                <a href="" class="btn btn-success form-control">Pagos</a>
            </div>
        </div>
    <?php } ?>
</body>
</html>