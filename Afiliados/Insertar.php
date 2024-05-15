<?php require_once('../Logica/Persona.php');?>
<?php
$afiliado = new Persona();

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
                <input type="text" name="rfc_text" id="rfc_text" class="form-control" required> 
            </div>
            <div class="form-group">
                <label>RFC PDF</label>
                <input type="file" name="rfc_pdf" id="rfc_pdf" class="form-control" required> 
            </div>
            <div class="form-group">
                <label>CURP</label>
                <input type="text" name="curp_text" id="curp_text" class="form-control" required> 
            </div>
            <div class="form-group">
                <label>CURP PDF</label>
                <input type="file" name="curp_pdf" id="curp_pdf" class="form-control" required> 
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
                <label>Comprobante Domicilio</label>
                <input type="file" name="comprobante_domi" id="comprobante_domi" class="form-control" required> 
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
                <label>INE</label>
                <input type="file" name="ine" id="ine" class="form-control" required> 
            </div>
            <div class="form-group">
                <label>Contrato de Arrendamiento</label>
                <input type="file" name="contrato_arrenda" id="contrato_arrenda" class="form-control" required> 
            </div>
            <div class="form-group">
                <label>Croquis</label>
                <input type="file" name="croquis" id="croquis" class="form-control" required> 
            </div>
            <div class="form-group">
                <label>Imagen 1</label>
                <input type="file" name="img1" id="img1" class="form-control" required> 
            </div>
            <div class="form-group">
                <label>Imagen 2</label>
                <input type="file" name="img2" id="img2" class="form-control" required> 
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