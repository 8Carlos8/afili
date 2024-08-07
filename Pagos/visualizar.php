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
if ($_GET['id']) {
    $pago->id = $_GET['id'];
    $pago->recuperarRegistro($pago->id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Visualizar Pago</title>
</head>
<body>
    <div class="container py-3">
        <div class="form-group text-center">
        <a href="index.php" class="btn btn-success">&nbsp;Lista de Pagos</a>
        </div>
        <table class="table">
        <tr>
            <td>
                <label>ID</label>
            </td>
            <td>
                <span><?= $pago->id ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label>ID Afiliado</label>
            </td>
            <td>
                <span><?= $pago->id_afiliado ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label>ID Promotor</label>
            </td>
            <td>
                <span><?= $pago->id_promotor ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Código Factura</label>
            </td>
            <td>
                <span><?= $pago->codigo_factu ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Folio</label>
            </td>
            <td>
                <span><?= $pago->folio ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Nombre Comercial</label>
            </td>
            <td>
                <span><?= $pago->nombre_comercial ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Giro</label>
            </td>
            <td>
                <span><?= $pago->giro ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Giro 2</label>
            </td>
            <td>
                <span><?= $pago->giro2 ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Localidad</label>
            </td>
            <td>
                <span><?= $pago->localidad ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Pago Afiliación</label>
            </td>
            <td>
                <span><?= $pago->pago_afiliacion ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Modo de Pago</label>
            </td>
            <td>
                <span><?= $pago->modo_pago ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Estatus</label>
            </td>
            <td>
                <span><?= $pago->estado ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Dirección</label>
            </td>
            <td>
                <span><?= $pago->direccion ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Calle 1</label>
            </td>
            <td><?= $pago->calle1 ?></td>
        </tr>
        <tr>
            <td>
                <label>Calle 2</label>
            </td>
            <td>
                <span><?= $pago->calle2 ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Fecha</label>
            </td>
            <td><?= $pago->fecha ?></td>
        </tr>
        <tr>
            <td>
                <label>Form</label>
            </td>
            <td>
                <span><?= $pago->form ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Pago C</label>
            </td>
            <td>
                <span><?= $pago->pago_c ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Extemp</label>
            </td>
            <td>
                <span><?= $pago->extemp ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Salubridad</label>
            </td>
            <td>
                <span><?= $pago->salubridad ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <label>Siem</label>
            </td>
            <td>
                <span><?= $pago->siem ?></span>
            </td>
        </tr>
    </table>
    </div>
</body>
</html>