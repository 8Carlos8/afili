<?php
require_once('../Logica/Licencia.php');
require_once('../Logica/Afiliado.php');
require_once('../Sesion/header.php');

$licencia = new Licencia();
$afiliado = new Afiliado();
$licencias = $licencia->lista();
$afiliados = $afiliado->lista();
if (isset($_POST['id'])) {
    $licencia->insertarRegistro();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Insertar Licencia</title>
</head>
<body>
    <div class="container py-3">
        <div class="form-group text-center">
            <a href="index.php" class="btn btn-success">&nbsp;Lista de Licencias</a>
        </div>
        <form name="frmInsLic" action="insertar.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="0">
            <div class="form-group">
                <label>ID Afiliado</label>
                <select name="id_afiliado" id="id_afiliado" class="form-control">
                    <option value="">Seleccionar Afiliado</option>
                    <?php foreach($afiliados as $afiliado) {?>
                        <option value="<?= $afiliado->id ?>"><?= $afiliado->nombre . " " . $afiliado->apellido_paterno . " " . $afiliado->apellido_materno ?></option>
                        <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Licencia</label>
                <input type="file" name="licencia" id="licencia" class="form-control" accept="application/pdf">
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">&nbsp;Registrar</button>
            </div>
        </form>
    </div>
</body>
</html>