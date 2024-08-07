<?php
require_once('../Logica/Pago.php');
require_once('../Sesion/header.php');
require_once('../Logica/Afiliado.php');
require_once('../Logica/Promotor.php');

$pago = new Pago();
$afiliado = new Afiliado();
$promotor = new Promotor();
$afiliados = $afiliado->lista();
$promotores = $promotor->lista();

$pagos = $pago->lista(); // Método para obtener todos los pagos con el nombre completo del afiliado
$columna = isset($_POST['columna']) ? $_POST['columna'] : '';
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
$estado = isset($_POST['estado']) ? $_POST['estado'] : '';
$folio = isset($_POST['folio']) ? $_POST['folio'] : '';
$id_afiliado = isset($_POST['id_afiliado']) ? $_POST['id_afiliado'] : '';
$id_promotor = isset($_POST['id_promotor']) ? $_POST['id_promotor'] : '';
$fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : '';
$fecha_fin = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : '';
$localidad = isset($_POST['localidad']) ? $_POST['localidad'] : '';
$id_afiliado_rango = isset($_POST['id_afiliado_rango']) ? $_POST['id_afiliado_rango'] : '';
$id_promotor_rango = isset($_POST['id_promotor_rango']) ? $_POST['id_promotor_rango'] : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($columna)) {
        $pagos = $pago->buscarPagosPorColumna($columna);
    } elseif (!empty($fecha)) {
        $pagos = $pago->buscarPagosPorFecha($fecha);
    } elseif (!empty($estado)) {
        $pagos = $pago->buscarPagosPorEstado($estado);
    } elseif (!empty($folio)) {
        $pagos = $pago->buscarPagosPorFolio($folio);
    } elseif (!empty($id_afiliado)) {
        $pagos = $pago->buscarPagosPorAfiliado($id_afiliado);
    } elseif (!empty($id_promotor)) {
        $pagos = $pago->buscarPagosPorPromotor($id_promotor);
    } elseif (!empty($fecha_inicio) && !empty($fecha_fin)) {
        $pagos = $pago->buscarPagosPorRangoFechas($fecha_inicio, $fecha_fin);
    } elseif (!empty($localidad)) {
        $pagos = $pago->buscarPagosPorLocalidad($localidad);
    } elseif (!empty($id_afiliado_rango) && !empty($fecha_inicio) && !empty($fecha_fin)) {
        $pagos = $pago->buscarPagosPorAfiliadoYRangoFechas($id_afiliado_rango, $fecha_inicio, $fecha_fin);
    } elseif (!empty($id_promotor_rango) && !empty($fecha_inicio) && !empty($fecha_fin)) {
        $pagos = $pago->buscarPagosPorPromotorYRangoFechas($id_promotor_rango, $fecha_inicio, $fecha_fin);
    }
}

// Crear un array asociativo de afiliados para búsqueda eficiente
$afiliado_nombres = [];
foreach ($afiliados as $af) {
    $afiliado_nombres[$af->id] = $af->nombre . " " . $af->apellido_paterno . " " . $af->apellido_materno;
}

// Calcular las sumas
$total_afiliacion = 0;
$total_form = 0;
$total_pago_c = 0;
$total_extemp = 0;
$total_salubridad = 0;
$total_siem = 0;

foreach ($pagos as $p) {
    $total_afiliacion += $p->pago_afiliacion;
    $total_form += $p->form;
    $total_pago_c += $p->pago_c;
    $total_extemp += $p->extemp;
    $total_salubridad += $p->salubridad;
    $total_siem += $p->siem;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes de Pagos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .form-group {
            margin-bottom: 1rem;
        }
        .form-control {
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
<div class="container-fluid py-2">
    <div class="form-group text-center">
        <a href="index.php" class="btn btn-success">Lista de Pagos</a>
    </div>

    <h2 class="text-center">Buscar Pagos</h2>
    <br>
    <form method="POST" class="form-inline justify-content-center mb-3">
        <!-- Buscar por Fecha -->
        <div class="form-group mx-2">
            <label class="mr-2">Buscar por Fecha:</label>
            <input type="date" name="fecha" class="form-control">
        </div>
        <!-- Buscar por Folio -->
        <div class="form-group mx-2">
            <label class="mr-2">Buscar por Folio:</label>
            <input type="text" name="folio" class="form-control" placeholder="Folio">
        </div>
        <!-- Buscar por Afiliado -->
        <div class="form-group mx-2">
            <label class="mr-2">Buscar por Afiliado:</label>
            <select name="id_afiliado" class="form-control">
                <option value="">Seleccionar Afiliado</option>
                <?php foreach ($afiliados as $af) { ?>
                    <option value="<?= htmlspecialchars($af->id) ?>"><?= htmlspecialchars($af->nombre . " " . $af->apellido_paterno . " " . $af->apellido_materno) ?></option>
                <?php } ?>
            </select>
        </div>
        <!-- Buscar por Promotor -->
        <div class="form-group mx-2">
            <label class="mr-2">Buscar por Promotor:</label>
            <select name="id_promotor" class="form-control">
                <option value="">Seleccionar Promotor</option>
                <?php foreach ($promotores as $pm) { ?>
                    <option value="<?= htmlspecialchars($pm->id) ?>"><?= htmlspecialchars($pm->nombre . " " . $pm->apellido_paterno . " " . $pm->apellido_materno) ?></option>
                <?php } ?>
            </select>
        </div>
        <!-- Buscar por Rango de Fechas -->
        <div class="form-group mx-2">
            <label class="mr-2">Buscar por Rango de Fechas:</label>
            <input type="date" name="fecha_inicio" class="form-control">
            <input type="date" name="fecha_fin" class="form-control">
        </div>
        <!-- Buscar por Localidad -->
        <div class="form-group mx-2">
            <label class="mr-2">Buscar por Localidad:</label>
            <input type="text" name="localidad" class="form-control" placeholder="Localidad">
        </div>
        <!-- Buscar por Rango Afiliado -->
        <div class="form-group mx-2">
            <label class="mr-2">Buscar por Afiliado en Rango:</label>
            <select name="id_afiliado_rango" class="form-control">
                <option value="">Seleccionar Afiliado</option>
                <?php foreach ($afiliados as $af) { ?>
                    <option value="<?= htmlspecialchars($af->id) ?>"><?= htmlspecialchars($af->nombre . " " . $af->apellido_paterno . " " . $af->apellido_materno) ?></option>
                <?php } ?>
            </select>
            <input type="date" name="fecha_inicio" class="form-control mt-2" placeholder="Fecha Inicio">
            <input type="date" name="fecha_fin" class="form-control mt-2" placeholder="Fecha Fin">
        </div>
        <!-- Buscar por Rango Promotor -->
        <div class="form-group mx-2">
            <label class="mr-2">Buscar por Promotor en Rango:</label>
            <select name="id_promotor_rango" class="form-control">
                <option value="">Seleccionar Promotor</option>
                <?php foreach ($promotores as $pm) { ?>
                    <option value="<?= htmlspecialchars($pm->id) ?>"><?= htmlspecialchars($pm->nombre . " " . $pm->apellido_paterno . " " . $pm->apellido_materno) ?></option>
                <?php } ?>
            </select>
            <input type="date" name="fecha_inicio" class="form-control mt-2" placeholder="Fecha Inicio">
            <input type="date" name="fecha_fin" class="form-control mt-2" placeholder="Fecha Fin">
        </div>
        <button type="submit" class="btn btn-primary mx-2">Buscar</button>
        <a href="reporte.php" class="btn btn-secondary mx-2">Restablecer</a>
    </form>

    <!-- Tabla de Resultados -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Afiliado</th>
                <th>Nombre Comercial</th>
                <th>Fecha</th>
                <th>Afiliación</th>
                <th>Form</th>
                <th>Pago C</th>
                <th>Extemp</th>
                <th>Salubridad</th>
                <th>Siem</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagos as $p) { ?>
                <tr>
                    <td><?= htmlspecialchars($p->id) ?></td>
                    <td><span title="<?= htmlspecialchars($p->id_afiliado) ?>">
                            <?= isset($afiliado_nombres[$p->id_afiliado]) ? htmlspecialchars($afiliado_nombres[$p->id_afiliado]) : 'Desconocido' ?>
                        </span></td>
                    <td><?= htmlspecialchars($p->nombre_comercial) ?></td>
                    <td><?= htmlspecialchars($p->fecha) ?></td>
                    <td><?= htmlspecialchars($p->pago_afiliacion) ?></td>
                    <td><?= htmlspecialchars($p->form) ?></td>
                    <td><?= htmlspecialchars($p->pago_c) ?></td>
                    <td><?= htmlspecialchars($p->extemp) ?></td>
                    <td><?= htmlspecialchars($p->salubridad) ?></td>
                    <td><?= htmlspecialchars($p->siem) ?></td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">Totales</th>
                <th><?= number_format($total_afiliacion, 2) ?></th>
                <th><?= number_format($total_form, 2) ?></th>
                <th><?= number_format($total_pago_c, 2) ?></th>
                <th><?= number_format($total_extemp, 2) ?></th>
                <th><?= number_format($total_salubridad, 2) ?></th>
                <th><?= number_format($total_siem, 2) ?></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
