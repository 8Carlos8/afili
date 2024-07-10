<?php
require_once('../Logica/Licencia.php');
require_once('../Logica/Afiliado.php');
require_once('../Sesion/header.php');

$licencia = new Licencia();
$afiliado = new Afiliado();
$licencias = [];
$afiliados = $afiliado->lista();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_afiliado = $_POST['id_afiliado'];
    $licencias = $licencia->recuperarAfiliado($id_afiliado);
} else {
    $licencias = $licencia->lista();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../scripts/conf.js"></script>
    <title>Licencias</title>
</head>
<body>
    <div class="container py-3">
        <div class="form-group text-center">
            <a href="insertar.php" class="btn btn-success">Ingresa una nueva Licencia</a>
            <br>
            <br>
            <form method="POST" class="form-inline justify-content-center mb-3">
                <div class="form-group">
                    <label>ID Afiliado</label>
                    <select name="id_afiliado" id="id_afiliado" class="form-control" required>
                        <option value="">Seleccionar Afiliado</option>
                        <?php foreach($afiliados as $afiliado) {?>
                            <option value="<?= $afiliado->id ?>"><?= $afiliado->nombre . " " . $afiliado->apellido_paterno . " " . $afiliado->apellido_materno ?></option>
                            <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="index.php" class="btn btn-secondary ml-2">Restablecer</a>
            </form>
        </div>
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>ID Afiliado</th>
                <th>Licencia</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php 
                    foreach($licencias as $licencia){
                ?>
                <tr>
                    <td><span title="<?= $licencia->id ?>"><?= $licencia->id ?></span></td>
                    <?php
                        $afiliadoEncontrado = null;
                        foreach($afiliados as $afiliado){
                            if ($afiliado->id == $licencia->id_afiliado) {
                                $afiliadoEncontrado = $afiliado;
                                break;
                            }
                        }
                    ?>
                    <td><span title="<?= $licencia->id_afiliado ?>"><?= $afiliadoEncontrado ? $afiliadoEncontrado->nombre . " " . $afiliadoEncontrado->apellido_paterno . " " . $afiliadoEncontrado->apellido_materno : 'Afiliado no encontrado' ?></span></td>
                    <td>
                            <a href="ver_licencia.php?id=<?= $licencia->id ?>" target="_blank">Ver Licencia</a>
                    </td>
                    <td>
                        <a href="visualizar.php?id=<?= $licencia->id ?>" class="btn btn-primary" title='Ver datalles '><i class="bi bi-binoculars"></i>&nbsp;Ver Detalles</a>&nbsp;
                        <a href="actualizar.php?id=<?= $licencia->id ?>" class="btn btn-info btn-space" title='Editar '><i class="bi bi-pencil"></i>&nbsp;Editar Licencia</a>&nbsp;
                        <button class="btn btn-warning btn-space" onclick="confirmarEliminar(<?= $licencia->id ?>)" title='Eliminar'><i class="bi bi-trash"></i>&nbsp;Eliminar</button>&nbsp;
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>