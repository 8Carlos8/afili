<?php
require_once('../Logica/Licencia.php');
require_once('../Logica/Afiliado.php');
require_once('../Sesion/header.php');

$licencia = new Licencia();
$afiliado = new Afiliado();
$afiliados = $afiliado->lista();
if ($_GET['id']) {
    $licencia->id = $_GET['id'];
    $licencia->recuperarRegistro($licencia->id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Visualizar Licencia</title>
</head>
<body>
    <div class="container py-3">
        <div class="form-group text-center">
            <a href="index.php" class="btn btn-success">&nbsp;Lista de Licencias</a>
        </div>
        <table class="table">
            <tr>
                <td>
                    <label>ID</label>
                </td>
                <td>
                    <span><?= $licencia->id ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>ID Afiliado</label>
                </td>
                <td>
                    <?php foreach($afiliados as $afiliado){ ?>
                    <span title="<?= $licencia->id_afiliado ?>"><?= $afiliado->nombre . " " . $afiliado->apellido_paterno . " " . $afiliado->apellido_materno ?></span>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Licencia</label>
                </td>
                <td>
                    <?php if(!empty($licencia->licencia)) {?>
                        <a href="ver_licencia.php?id=<?= $licencia->id ?>" target="_blank">Ver Licencia</a>
                    <?php } ?>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>