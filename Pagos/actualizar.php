<?php
require_once('../Logica/Pago.php');
require_once('../Logica/Afiliado.php');
require_once('../Logica/Promotor.php');
require_once('../Sesion/header.php');

$pago = new Pago();
$afiliado = new Afiliado();
$promotor = new Promotor();
$afiliados = $afiliado->lista();
$promotores = $promotor->lista();
if (isset($_POST['id'])) {
    $pago->actualizarRegistro();
} else {
    if (isset($_GET['id'])) {
        $pago->id = $_GET['id'];
        $pago->recuperarRegistro($pago->id);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Actualizar Pago</title>
</head>
<body>
    <div class="container py-3">
        <div class="form-group text-center">
            <a href="index.php" class="btn btn-success">&nbsp;Lista de Pagos</a>
        </div>
        <form name="frmActPago" action="actualizar.php" method="post">
            <input type="hidden" name="id" value="<?= $pago->id ?>">
            <div class="form-group">
                <label>ID Afiliado</label>
                <select name="id_afiliado" id="id_afiliado" class="form-control">
                    <?php foreach($afiliados as $afiliado) { ?>
                        <option value="<?= $afiliado->id ?>" <?= $afiliado->id == $pago->id_afiliado ? 'selected' : ''?>>
                            <?= $afiliado->nombre . " " . $afiliado->apellido_paterno . " " . $afiliado->apellido_materno ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>ID Promotor</label>
                <select name="id_promotor" id="id_promotor" class="form-control" required>
                    <?php foreach($promotores as $promotor) { ?>
                        <option value="<?= $promotor->id ?>" <?= $promotor->id == $pago->id_promotor ? 'select' : '' ?>>
                            <?= $promotor->nombre ." " . $promotor->apellido_paterno . " " . $promotor->apellido_materno . " " . $promotor->siglas_promotor ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Código Factura</label>
                <input type="text" name="codigo_factu" id="codigo_factu" value="<?= $pago->codigo_factu ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Folio</label>
                <input type="text" name="folio" id="folio" class="form-control" value="<?= $pago->folio ?>">
            </div>
            <div class="form-group"> 
                <label>Nombre Comercial</label>
                <input type="text" name="nombre_comercial" id="nombre_comercial" class="form-control" value="<?= $pago->nombre_comercial ?>">
            </div>
            <div class="form-group">
                <label>Giro</label>
                <input type="text" name="giro" id="giro" class="form-control" value="<?= $pago->giro ?>">
            </div>
            <div class="form-group">
                <label>Giro 2</label>
                <input type="text" name="giro2" id="giro2" class="form-control" value="<?= $pago->giro2 ?>">
            </div>
            <div class="form-group">
                <label>Localidad</label>
                <input type="text" name="localidad" id="localidad" class="form-control" value="<?= $pago->localidad ?>">
            </div>
            <div class="form-group">
                <label>Pago Afiliación</label>
                <input type="text" name="pago_afiliacion" id="pago_afiliacion" class="form-control" value="<?= $pago->pago_afiliacion ?>">
            </div>
            <div class="form-group">
                <label>Estado</label>
                <select name="estado" id="estado" class="form-control">
                    <option value="">Seleccionar Estado</option>
                    <option value="nueva">Nueva</option>
                    <option value="renovacion">Renovación</option>
                </select>
            </div>
            <div class="form-group">
                <label>Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" value="<?= $pago->direccion ?>">
            </div>
            <div class="form-group">
                <label>Calle 1</label>
                <input type="text" name="calle1" id="calle1" class="form-control" value="<?= $pago->calle1 ?>">
            </div>
            <div class="form-group">
                <label>Calle 2</label>
                <input type="text" name="calle2" id="calle2" class="form-control" value="<?= $pago->calle2 ?>">
            </div>
            <div class="form-group">
                <label>Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="<?= isset($pago->fecha) ? date('Y-m-d', strtotime($pago->fecha)) : '' ?>">
            </div>
            <div class="form-group">
                <label>Form</label>
                <input type="text" name="form" id="form" class="form-control" value="<?= $pago->form ?>">
            </div>
            <div class="form-group">
                <label>Pago C</label>
                <input type="text" name="pago_c" id="pago_c" class="form-control" value="<?= $pago->pago_c ?>">
            </div>
            <div class="form-group">
                <label>Extemp</label>
                <input type="text" name="extemp" id="extemp" class="form-control" value="<?= $pago->extemp ?>">
            </div>
            <div class="form-group">
                <label>Salubridad</label>
                <input type="text" name="salubridad" id="salubridad" class="form-control" value="<?= $pago->salubridad ?>">
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary">&nbsp;Actualizar</button>
            </div>
        </form>
    </div>
</body>
</html>