<?php
require_once('../Logica/Licencia.php');
require_once('../Logica/Afiliado.php');
require_once('../Sesion/header.php');

$licencia = new Licencia();
$afiliado = new Afiliado();
$afiliados = $afiliado->lista();
if (isset($_POST['id'])) {
    $licencia->actualizaRegistro();
} else {
    if (isset($_GET['id'])) {
        $licencia->id = $_GET['id'];
        $licencia->recuperarRegistro($licencia->id);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Actualizar Licencia</title>
</head>
<body>
    <div class="container py-3">
        <div class="form-group text-center">
            <a href="index.php" class="btn btn-success">&nbsp;Lista de Licencias</a>
        </div>
        <form name="frmActLic" action="actualizar.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $licencia->id ?>">
            <table class="table">
            <div class="form-group">
                <label>ID Afiliado</label>
                    <select name="id_afiliado" id="id_afiliado" class="form-control">
                        <?php foreach($afiliados as $afiliado) { ?>
                            <option value="<?= $afiliado->id ?>" <?= $afiliado->id == $licencia->id_afiliado ? 'selected' : ''?>>
                                <?= $afiliado->nombre . " " . $afiliado->apellido_paterno . " " . $afiliado->apellido_materno ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Licencia:</label>
                    <?php if (!empty($licencia->licencia)) { ?>
                        <a href="ver_licencia.php?id=<?= $licencia->id ?>" target="_blank">Ver Licencia</a>
                    <?php } ?>
                    <input type="file" name="licencia" id="licencia" class="form-control" accept="application/pdf">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">&nbsp;Actualizar</button>
                </div>
            </table>
        </form>
    </div>
</body>
</html>