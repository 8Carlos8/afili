<?php 
require_once('../Logica/Afiliado.php');
require_once('../Sesion/header.php');
$afiliado = new Afiliado();

if (isset($_POST['id'])) {
    $afiliado->insertarRegistro();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Afiliado</title>
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
            <a href="index.php" class="btn btn-success">&nbsp;Lista de Afiliados</a>
        </div>
        <form name="frmInsAfili" method="post" action="insertar.php">
            <input type="hidden" name="id" value="0">
            <div class="form-group">
                <label>Nombre del Afiliado</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label>RFC</label>
                <input type="text" name="rfc" id="rfc" class="form-control" required> 
            </div>
            <div class="form-group">
                <label>CURP</label>
                <input type="text" name="curp" id="curp" class="form-control" required> 
            </div>
            <div class="form-group">
                <label>Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" required> 
            </div>
            <div class="form-group">
                <label>Número</label>
                <input type="num" name="num" id="num" class="form-control" required> 
            </div>
            <div class="form-group">
                <label>Códigp Postal</label>
                <input type="num" name="cod_postal" id="cod_postal" class="form-control" required> 
            </div>
            <div class="form-group">
                <label>Colonia</label>
                <input type="text" name="colonia" id="colonia" class="form-control" required> 
            </div>
            <div class="form-group">
                <label>Expediente</label>
                <input type="file" name="expediente" id="expediente" class="form-control" required> 
            </div>
            <div class="form-group text-center">
                <a href="index.php">Regresar</a>
                <button type="submit" class="btn btn-primary btn-lg btn-block">&nbsp;ENVIAR</button>
            </div>
        </form>
        <div></div>
    </div>
    <div>

    </div>
</body>
</html>