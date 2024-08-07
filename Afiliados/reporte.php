<?php
require_once('../Logica/Afiliado.php');
require_once('../Sesion/header.php');

$afiliado = new Afiliado();
$afiliados = $afiliado->lista();
$colonia = isset($_POST['colonia']) ? $_POST['colonia'] : '';
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
$rfc = isset($_POST['rfc']) ? $_POST['rfc'] : '';
$curp = isset($_POST['curp']) ? $_POST['curp'] : '';
$fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : '';
$fecha_fin = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : '';
$codigo_postal = isset($_POST['codigo_postal']) ? $_POST['codigo_postal'] : '';
$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($colonia)) {
        $afiliados = $afiliado->recuperarPorColonia($colonia);
    } elseif (!empty($fecha)) {
        $afiliados = $afiliado->recuperarPorFechaAfiliacion($fecha);
    } elseif (!empty($rfc)) {
        $afiliados = $afiliado->recuperarPorRFC($rfc);
    } elseif (!empty($curp)) {
        $afiliados = $afiliado->recuperarPorCURP($curp);
    } elseif (!empty($fecha_inicio) && !empty($fecha_fin)) {
        $afiliados = $afiliado->recuperarPorRangoFechas($fecha_inicio, $fecha_fin);
    } elseif (!empty($codigo_postal)) {
        $afiliados = $afiliado->recuperarPorCodigoPostal($codigo_postal);
    } elseif (!empty($direccion)) {
        $afiliados = $afiliado->recuperarPorDireccion($direccion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas de Afiliados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid py-3">
    <div class="form-group text-center">
        <a href="index.php" class="btn btn-success">Lista de Afiliados</a>
        <br><br>
        <form method="POST" class="form-inline justify-content-center mb-3">
            <div class="form-group text-center">
                <label class="mr-2">Buscar por Colonia:</label>
                <input type="text" name="colonia" class="form-control mr-2" placeholder="Colonia">
                <br>
            </div>
            <div class="form-group text-center">
                <label class="mr-2">Buscar por Fecha de Afiliación:</label>
                <input type="date" name="fecha" class="form-control mr-2" placeholder="Fecha de Afiliación">
            </div>
            <div class="form-group text-center">
                <br>
                <label class="mr-2">Buscar por RFC:</label>
                <input type="text" name="rfc" class="form-control mr-2" placeholder="RFC">
                <br>
            </div>
            <div class="form-group text-center">
                <label class="mr-2">Buscar por Curp:</label>
                <input type="text" name="curp" class="form-control mr-2" placeholder="CURP">
                <br>
            </div>
            <div class="form-group text-center">
                <label class="mr-2">Buscar por Rango de Fecha:</label>
                <input type="date" name="fecha_inicio" class="form-control mr-2" placeholder="Fecha Inicio">
                <input type="date" name="fecha_fin" class="form-control mr-2" placeholder="Fecha Fin">
                <br>
            </div>
            <div class="form-group text-center py-3">
                <label class="mr-2">Buscar por Codigo Postal:</label>
                <input type="text" name="codigo_postal" class="form-control mr-2" placeholder="Código Postal">
                <br>
            </div>
            <br>
            <div class="form-group text-center">
                <label class="mr-2">Buscar por Dirección:</label>
                <input type="text" name="direccion" class="form-control mr-2" placeholder="Dirección">
                <br>
            </div>
            <div class="form-group text-center">
                
            </div>
            <div class="form-group text-center">
                
            </div>
            <div class="form-group text-center">
                
            </div>
            <div class="form-group text-center">
                
            </div>
            <div class="form-group text-center">
                
            </div>
            <div class="form-group text-center">
                
            </div>
            <div class="form-group text-center">
                
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="reporte.php" class="btn btn-secondary ml-2">Restablecer</a>
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
            <?php foreach($afiliados as $afiliado) { ?>
                <tr>
                    <td><?= $afiliado->id ?></td>
                    <td><?= $afiliado->nombre ?></td>
                    <td><?= $afiliado->apellido_paterno ?></td>
                    <td><?= $afiliado->apellido_materno ?></td>
                    <td><?= $afiliado->rfc ?></td>
                    <td><?= $afiliado->curp ?></td>
                    <td><?= $afiliado->direccion ?></td>
                    <td><?= $afiliado->numero_Ext_Int ?></td>
                    <td><?= $afiliado->codiigo_postal ?></td>
                    <td><?= $afiliado->colonia ?></td>
                    <td><?= $afiliado->telefono ?></td>
                    <td><?= $afiliado->reporte ?></td>
                    <td><?= $afiliado->fecha_afiliacion ?></td>
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
<script>
    function confirmarEliminar(id) {
        if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {
            window.location.href = 'eliminar.php?id=' + id;
        }
    }
</script>
</body>
</html>
