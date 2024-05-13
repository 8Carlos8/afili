<?php
require_once("../Logica/Usuario.php");
$errores = array();
$usuario = new Usuario();
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($usuario->recuperarUsuario($username)) {
        if ($usuario->password == $password && $usuario->rol == 1) {
            session_start();
            $_SESSION['username'] = $usuario->username;
            $_SESSION['rol'] = 1;
            header("Location: Inicio.php");
        } else if ($usuario->password == $password) {
            session_start();
            $_SESSION['username'] = $usuario->username;
            header("Location: Inicio.php");
        } else {
            array_push($errores, "El usuario o contraseña son incorrectas");
        }
    } else {
        array_push($errores, "El usuario o contraseña son incorrectos");
    }
} else {
    if (isset($_POST['username']) && empty($_POST['password'])) {
        array_push($errores, "El nombre del usuario no puede estar vacio");
    }
    if (isset($_POST['password']) && empty($_POST['password'])) {
        array_push($errores, "La contraseña no puede estar vacia");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Inicio de Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            background-color: #8cc4df;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 100px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #8cc4df;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0b1629;
        }

        .alert-danger {
            background-color: #f44336;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>

</head>

<body>


    <header>
        <h1 class="titulo">
            <center>CodeGlide</center>
        </h1>
    </header>


    <div class="container">
        <?php if (isset($errores) && count($errores) > 0) { ?>
            <?php foreach ($errores as $error) { ?>
                <div class="alert alert-danger" role="alert"><?= $error ?></div>
            <?php } ?>
        <?php } ?>


        <form name="frmLogin" method="post" action="index.php">

            <h1 align="center">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="70" height="70" viewBox="0 0 24 24" stroke-width="2" stroke="#122543" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                    <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                </svg>
                Iniciar Sesión
            </h1>


            <div class="form-group">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="44" height="44" viewBox="0 0 24 24" stroke-width="2.5" stroke="#122543" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
                <label class="control-label">Usuario</label>
                <input type="text" name="username" value="" class="form-control">
            </div>

            <div class="form-group">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="44" height="44" viewBox="0 0 24 24" stroke-width="2.5" stroke="#122543" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                    <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                    <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                </svg>
                <label class="control-label">Contraseña</label>
                <input type="password" name="password" value="" class="form-control">
            </div>
            
            
            <div class="form-group text-center">
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">&nbsp;ENVIAR</button>
                </div>
                <p>¿No tienes usuario?
                    <a href="../Usuarios/insertar.php" class="btn btn-primary">&nbsp;Registrate</a>
                </p>
            </div>

        </form>
    </div>
</body>

</html>