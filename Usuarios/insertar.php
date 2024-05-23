<?php require_once('../Logica/Usuario.php');?>
<?php
    $usuario=new Usuario();

    if(isset($_POST['id'])){
        $usuario->insertarRegistro();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrar Nuevo Usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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

    </style>

</head>
<body>
    <div class="container">
        <form name="frmInsProd" method="post" action="insertar.php">
        <input type="hidden" name="id" value="0">              

                <h1 align="center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="70" height="70" viewBox="0 0 24 24" stroke-width="2" stroke="#122543" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                      <path d="M16 19h6" />
                      <path d="M19 16v6" />
                      <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                    </svg>
                Registrate</h1>

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="" required>
                </div>

                <div class="form-group">
                    <label>Apellido Paterno</label>
                    <input type="text" name="apellido_paterno" value="" required>
                </div>

                <div class="form-group">
                    <label>Apellido Materno</label>
                    <input type="text" name="apellido_materno" value="" required>
                </div>

                <div class="form-group">
                    <label>Correo</label>
                    <input type="text" name="correo" value="" required>
                </div>

                <div class="form-group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="44" height="44" viewBox="0 0 24 24" stroke-width="2.5" stroke="#122543" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                      <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg>
                    <label class="control-label">Usuario</label>
                    <input type="text" name="username" value="" class="form-control" required>
                </div>

                <div class="form-group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="44" height="44" viewBox="0 0 24 24" stroke-width="2.5" stroke="#122543" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                      <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                      <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                    </svg>
                    <label class="control-label">Contraseña</label>
                    <input type="password" name="password" value="" class="form-control" required>
                    <input type="hidden"name="rol" value="1"> 
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">&nbsp;ENVIAR</button>
                </div>
                    
                <div class="form-group text-center">
                    <p>¿Ya tienes usuario?
                    <a href="../Sesion/index.php" class="btn btn-primary">&nbsp;Iniciar Sesión</a>
                </div>
            
        </form>
    </div>
</body>
</html>