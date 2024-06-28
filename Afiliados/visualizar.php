<?php
require_once('../Logica/Afiliado.php');
require_once('../Sesion/header.php');

$afiliado = new Afiliado();
if ($_GET['id']) {
    $afiliado->id = $_GET['id'];
    $afiliado->recuperarRegistro($afiliado->id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Afiliado</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container py-2">
        <div class="form-group text-center">
            <a href="index.php" class="btn btn-success">&nbsp;Lista de Afiliados</a>
        </div>
        <table class="table">
            <tr>
                <td>
                    <label>ID</label>
                </td>
                <td>
                    <span><?= $afiliado->id ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Nombre</label>
                </td>
                <td>
                    <span><?= $afiliado->nombre ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Apellido Paterno</label>
                </td>
                <td>
                    <span><?= $afiliado->apellido_paterno ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Apellido Materno</label>
                </td>
                <td>
                    <span><?= $afiliado->apellido_materno ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Apellido Materno</label>
                </td>
                <td>
                    <span><?= $afiliado->apellido_materno ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>RFC</label>
                </td>
                <td><?= $afiliado->rfc ?></td>
            </tr>
            <tr>
                <td>
                    <label>CURP</label>
                </td>
                <td>
                    <span><?= $afiliado->curp ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Dirección</label>
                </td>
                <td>
                    <span><?= $afiliado->direccion ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Número Exterior e Interior</label>
                </td>
                <td>
                    <span><?= $afiliado->numero_Ext_Int ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Codigo Postal</label>
                </td>
                <td>
                    <span><?= $afiliado->codiigo_postal ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Colonia</label>
                </td>
                <td>
                    <span><?= $afiliado->colonia ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Telefono</label>
                </td>
                <td>
                    <span><?= $afiliado->telefono ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Correo</label>
                </td>
                <td>
                    <span><?= $afiliado->correo ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Expediente</label>
                </td>
                <td>
                    <spam title="<?= $afiliado->expediente ?>"><?= $afiliado->expediente . " "?>
                        <br>
                                <a href="../Archivos/Expedientes/<?= $afiliado->expediente ?>" type="application/pdf" target="_blank">Ver Expediente</a>
                            </spam></td>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>