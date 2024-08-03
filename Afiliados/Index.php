<?php
require_once('../Logica/Afiliado.php');
require_once('ver_expediente.php');
require_once('../Sesion/header.php');

$afiliado = new Afiliado();
$afiliados = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $afiliados = $afiliado->recuperarNombre($nombre, $apellido_paterno, $apellido_materno);
} else {
    $afiliados = $afiliado->lista();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../scripts/conf.js"></script>
    <title>Afiliados</title>
</head>
<body>
    <div class="container-fluid py-3">
        <div class="form-group text-center">
            <a href="Insertar.php" class="btn btn-success">Ingresar a un nuevo afiliado</a>
            <br>
            <br>
            <form method="POST" class="form-inline justify-content-center mb-3">
                <input type="text" name="nombre" class="form-control mr-2" placeholder="Nombre" required>
                <input type="text" name="apellido_paterno" class="form-control mr-2" placeholder="Apellido Paterno" required>
                <input type="text" name="apellido_materno" class="form-control mr-2" placeholder="Apellido Materno" required>
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="index.php" class="btn btn-secondary ml-2">Restablecer</a>
            </form>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>RFC</th>
                    <th>CURP</th>
                    <th>Dirección</th>
                    <th>Número Exterior e Interior</th>
                    <th>Código Postal</th>
                    <th>Colonia</th>
                    <th>Teléfono</th>
                    <th>Reporte</th>
                    <th>Fecha de Afiliación</th>
                    <th>Expediente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($afiliados as $afiliado) {?>
                    <tr>
                        <td><span title="<?= $afiliado->id ?>"><?= $afiliado->id ?></span></td>
                        <td><span title="<?= $afiliado->nombre ?>"><?= $afiliado->nombre ?></span></td>
                        <td><span title="<?= $afiliado->apellido_paterno ?>"><?= $afiliado->apellido_paterno ?></span></td>
                        <td><span title="<?= $afiliado->apellido_materno ?>"><?= $afiliado->apellido_materno ?></span></td>
                        <td><span title="<?= $afiliado->rfc ?>"><?= $afiliado->rfc ?></span></td>
                        <td><span title="<?= $afiliado->curp ?>"><?= $afiliado->curp ?></span></td>
                        <td><span title="<?= $afiliado->direccion ?>"><?= $afiliado->direccion ?></span></td>
                        <td><span title="<?= $afiliado->numero_Ext_Int ?>"><?= $afiliado->numero_Ext_Int ?></span></td>
                        <td><span title="<?= $afiliado->codiigo_postal ?>"><?= $afiliado->codiigo_postal ?></span></td>
                        <td><span title="<?= $afiliado->colonia ?>"><?= $afiliado->colonia ?></span></td>
                        <td><span title="<?= $afiliado->telefono ?>"><?= $afiliado->telefono ?></span></td>
                        <td><span title="<?= $afiliado->reporte ?>"><?= $afiliado->reporte ?></span></td>
                        <td><span title="<?= $afiliado->fecha_afiliacion ?>"><?= $afiliado->fecha_afiliacion ?></span></td>
                        <td>
                            <a href="ver_expediente.php?id=<?= $afiliado->id ?>" target="_blank">Ver Expediente</a>
                        </td>
                        <td>
                            <a href="visualizar.php?id=<?= $afiliado->id ?>" class="btn btn-primary" title='Ver detalles'><i class="bi bi-binoculars"></i>&nbsp;Ver Detalles</a>&nbsp;
                            <a href="actualizar.php?id=<?= $afiliado->id ?>" class="btn btn-info btn-space" title='Editar'><i class="bi bi-pencil"></i>&nbsp;Editar Afiliado</a>&nbsp;
                            <button class="btn btn-warning btn-space" onclick="confirmarEliminar(<?= $afiliado->id ?>)" title='Eliminar'><i class="bi bi-trash"></i>&nbsp;Eliminar</button>&nbsp;
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>