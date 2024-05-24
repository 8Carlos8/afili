<?php 
require_once('../Logica/Afiliado.php');
require_once('../Sesion/header.php');

$afiliado = new Afiliado();
$afiliados = $afiliado->lista();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afiliados</title>
</head>
<style>
    body {
            background-color: white;
            font-family: 'Arial', sans-serif;
        }
</style>
<body>
    <div class="container">
        <div class="form-group text-center">
            <i class="fas fa-folder-plus"></i>
            <a href="Insertar.php" class="btn-btn-succes">Ingresar a un nuevo afiliado</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>RFC</th>
                    <th>CURP</th>
                    <th>Dirección</th>
                    <th>Número</th>
                    <th>Código Postal</th>
                    <th>Colonia</th>
                    <th>Expediente</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($afiliados as $afiliado) {?>
                    <tr>
                        <td><spam title="<?= $afiliado->id ?>"><?= $afiliado->id ?></spam></td>
                        <td><spam title="<?= $afiliado->nombre ?>"><?= $afiliado->nombre ?></spam></td>
                        <td><spam title="<?= $afiliado->rfc ?>"<?= $afiliado->rfc_text ?>></spam></td>
                        <td><spam title="<?= $afiliado->curp ?>"<?= $afiliado->curp_text ?>></spam></td>
                        <td><spam title="<?= $afiliado->direccion ?>"<?= $afiliado->direccion ?>></spam></td>
                        <td><spam title="<?= $afiliado->num ?>"<?= $afiliado->num ?>></spam></td>
                        <td><spam title="<?= $afiliado->cod_postal ?>"<?= $afiliado->cod_postal ?>></spam></td>
                        <td><spam title="<?= $afiliado->colonia ?>"<?= $afiliado->colonia ?>></spam></td>
                        <td><spam title="<?= $afiliado->expediente ?>"<?= $afiliado->expediente ?>></spam></td>
                        <td>
                        <a href="visualizar.php?username=<?= $afiliado->id ?>" class="btn btn-primary" title='Ver datalles '><i class="bi bi-binoculars"></i>&nbsp;Ver Detalles</a>&nbsp;
                        <a href="actualizar.php?username=<?= $afiliado->id ?>" class="btn btn-warning" title='Editar '><i class="bi bi-pencil"></i>&nbsp;Editar Usuario</a>&nbsp;
                        <a href="eliminar.php?username=<?= $afiliado->id ?>" class="btn btn-warning" title='Editar '><i class="bi bi-pencil"></i>&nbsp;Eliminar</a>&nbsp;
                    </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="form-group text-center">
            <a href="">Regresar</a>
        </div>
    </div>
</body>
</html>