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
    $pago->insertarRegistro();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../scripts/buscarAfiliado.js"></script>
    <title>Insertar Pago</title>
</head>
<body>
    <div class="container py-3">
        <div class="form-group text-center">
            <a href="index.php" class="btn btn-success">&nbsp;Lista de Pagos</a>
        </div>
        <form name="frmInsPago" action="insertar.php" method="post">
            <input type="hidden" name="id" value="0">
            <div class="form-group">
                <label>ID Afiliado</label>
                <input type="text" id="buscar_afiliado" onkeyup="filtrarAfiliado()" class="form-control mt-2" placeholder="Buscar Afiliado">
                <br>
                <select name="id_afiliado" id="id_afiliado" class="form-control">
                    <option value="">Seleccionar Afiliado</option>
                    <?php foreach($afiliados as $afiliado) { ?>
                        <option value="<?= $afiliado->id ?>"><?= $afiliado->nombre . " " . $afiliado->apellido_paterno . " " . $afiliado->apellido_materno ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>ID Promotor</label>
                <select name="id_promotor" id="id_promotor" class="form-control" required>
                    <option value="">Seleccionar Promotor</option>
                    <?php foreach($promotores as $promotor) { ?>
                        <option value="<?= $promotor->id ?>"><?= $promotor->nombre ." " . $promotor->apellido_paterno . " " . $promotor->apellido_materno . " " . $promotor->siglas_promotor ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Código Factura</label>
                <input type="text" name="codigo_factu" id="codigo_factu" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Folio</label>
                <input type="text" name="folio" id="folio" class="form-control" required>
            </div>
            <div class="form-group"> 
                <label>Nombre Comercial</label>
                <input type="text" name="nombre_comercial" id="nombre_comercial" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Giro</label>
                <input type="text" name="giro" id="giro" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Giro 2</label>
                <input type="text" name="giro2" id="giro2" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Localidad</label>
                <input type="text" name="localidad" id="localidad" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Pago Afiliación</label>
                <input type="text" name="pago_afiliacion" id="pago_afiliacion" class="form-control" required>
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
                <input type="text" name="direccion" id="direccion" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Calle 1</label>
                <input type="text" name="calle1" id="calle1" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Calle 2</label>
                <input type="text" name="calle2" id="calle2" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Form</label>
                <input type="text" name="form" id="form" class="form-control">
            </div>
            <div class="form-group">
                <label>Pago C</label>
                <input type="text" name="pago_c" id="pago_" class="form-control">
            </div>
            <div class="form-group">
                <label>Extemp</label>
                <input type="text" name="extemp" id="extemp" class="form-control">
            </div>
            <div class="form-group">
                <label>Salubridad</label>
                <input type="text" name="salubridad" id="salubridad" class="form-control">
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary">&nbsp;Registrar</button>
            </div>
        </form>
    </div>
</body>
</html>