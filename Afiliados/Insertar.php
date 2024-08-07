<?php 
require_once('../Logica/Afiliado.php');
require_once('../Sesion/header.php');

$afiliado = new Afiliado();
if (isset($_POST['id'])) {
    $afiliado->insertarRegistro();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Insertar Afiliado</title>
</head>
<body>
    <div class="container py-3">
        <div class="form-group text-center">
            <a href="index.php" class="btn btn-success">&nbsp;Lista de Afiliados</a>
        </div>
        <form name="frmInsAfili" method="post" action="insertar.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="0">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del Afiliado" required>
            </div>
            <div class="form-group">
                <label>Apellido Paterno</label>
                <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" placeholder="Apellido Paterno del Afiliado" required>
            </div>
            <div class="form-group">
                <label>Apellido Materno</label>
                <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" placeholder="Apellido Materno del Afiliado" required>
            </div>
            <div class="form-group">
                <label>RFC</label>
                <input type="text" name="rfc" id="rfc" class="form-control" placeholder="RFC del Afiliado" required> 
            </div>
            <div class="form-group">
                <label>CURP</label>
                <input type="text" name="curp" id="curp" class="form-control" placeholder="CURP del Afiliado" required> 
            </div>
            <div class="form-group">
                <label>Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección del Local" required> 
            </div>
            <div class="form-group">
                <label>Número</label>
                <input type="text" name="numero_Ext_Int" id="numero_Ext_Int" class="form-control" placeholder="Número del Local" required> 
            </div>
            <div class="form-group">
                <label>Código Postal</label>
                <input type="number" name="codiigo_postal" id="codiigo_postal" class="form-control" placeholder="Código Postal del Local" required> 
            </div>
            <div class="form-group">
                <label>Colonia</label>
                <input type="text" name="colonia" id="colonia" class="form-control" placeholder="Colonia del Local" required> 
            </div>
            <div class="form-group">
                <label>Telefono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Teléfono del Afiliado" required>
            </div>
            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo del Afiliado">
            </div>
            <div class="form-group">
                <label>Reporte</label>
                <input type="text" name="reporte" id="reporte" class="form-control" placeholder="Reporte del Afiliado">
            </div>
            <div class="form-group">
                <label>Fecha de Afiliación</label>
                <input type="date" name="fecha_afiliacion" id="fecha_afiliacion" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Expediente</label>
                <input type="file" name="expediente" id="expediente" class="form-control" accept="application/pdf"> 
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">&nbsp;Registrar</button>
            </div>
        </form>
    </div>
</body>
</html>