<?php
require_once('../Logica/Afiliado.php');
require_once('../Sesion/header.php');

$afiliado = new Afiliado();
if (isset($_POST['id'])) {
    $afiliado->actualizaRegistro();
} else {
    if (isset($_GET['id'])) {
        $afiliado->id = $_GET['id'];
        $afiliado->recuperarRegistro($afiliado->id);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Afiliado</title>
    <style>
        body{
            background-color: white;
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body>
    <div class="form-group text-center">
        <a href="index.php" class="btn btn-success">&nbsp;Lista de Afiliados</a>
    </div>
    <form name="frmModAfi" action="actualizar.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $afiliado->id ?>">
        <table class="table">
            <div class="form-group">
                <label>Nombre del Afiliado</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?= $afiliado->nombre ?>">
            </div>
            <div class="form-group">
                <label>RFC</label>
                <input type="text" name="rfc" id="rfc" class="form-control" value="<?= $afiliado->rfc ?>">
            </div>
            <div class="form-group">
                <label>CURP</label>
                <input type="text" name="curp" id="curp" class="form-control" value="<?= $afiliado->curp ?>">
            </div>
            <div class="form-group">
                <label>Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" value="<?= $afiliado->direccion ?>">
            </div>
            <div class="form-group">
                <label>Número</label>
                <input type="text" name="num" id="num" class="form-control" value="<?= $afiliado->numero ?>">
            </div>
            <div class="form-group">
                <label>Código Postal</label>
                <input type="number" name="cod_postal" id="cod_postal" class="form-control" value="<?= $afiliado->codiigo_postal ?>">
            </div>
            <div class="form-group">
                <label>Colonia</label>
                <input type="text" name="colonia" id="colonia" class="form-control" value="<?= $afiliado->colonia ?>">
            </div>
            <div class="form-group">
                <label>Expediente</label>
                <br>
                <span><?= $afiliado->expediente ?></span>
                <br>
                <a href="../Archivos/<?= $afiliado->expediente ?>" type="application/pdf" target="_blank">Ver Expediente</a>
                <input type="file" name="expediente" id="expediente" class="form-control" value="<?= $afiliado->expediente ?>" accept="application/pdf">
            </div>
            <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">&nbsp;ENVIAR</button>
                </div>
        </table>
    </form>
</body>
</html>