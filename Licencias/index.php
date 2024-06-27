<?php
require_once('../Logica/Licencias.php');
require_once('../Logica/Afiliado.php');
require_once('../Sesion/header.php');

$licencia = new Licencia();
$afiliado = new Afiliado();
$licencias = $licencia->lista();
$afiliados = $afiliado->lista();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Licencias</title>
    <style>
        body {
            background-color: white;
            font-family: 'Arial', sans-serif;
            }
        .btn-space {
            margin-block-end: 10px;
            }
    </style>
</head>
<body>
    <div class="container py-3">
        <div class="form-group text-center">
            <a href="insertar.php" class="btn btn-success">Ingresa una nueva Licencia</a>
        </div>
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>ID Afiliado</th>
                <th>Licencia</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php 
                    foreach($licencias as $licencia){
                        foreach($afiliados as $afiliado){
                ?>
                <tr>
                    <td><span title="<?= $licencia->id ?>"><?= $licencia->id ?></span></td>
                    <td><span title=""></span></td>
                    <td><span title="<?= $licencia->licencia ?>"><?= $licencia->licencia . "" ?>
                    <br>
                            <a href="../Archivos/Licencias/<?= $licencia->licencia ?>" type="application/pdf" target="_blank">Ver Licencia</a>
                        </span>
                    </td>
                    <td>
                        <a href="visualizar.php?id=<?= $licencia->id ?>" class="btn btn-primary" title='Ver datalles '><i class="bi bi-binoculars"></i>&nbsp;Ver Detalles</a>&nbsp;
                        <a href="actualizar.php?id=<?= $licencia->id ?>" class="btn btn-info btn-space" title='Editar '><i class="bi bi-pencil"></i>&nbsp;Editar Licencia</a>&nbsp;
                        <a href="eliminar.php?id=<?= $licencia->id ?>" class="btn btn-warning btn-space" title='Eliminar '><i class="bi bi-pencil"></i>&nbsp;Eliminar</a>&nbsp;
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>