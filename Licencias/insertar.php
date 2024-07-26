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
    <script src="../scripts/buscarAfiliado.js"></script>
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
                <input type="text" id="buscar_afiliado" onkeyup="filtrarAfiliado()" class="form-control mt-2" placeholder="Buscar Afiliado">
                <br>
                <select name="id_afiliado" id="id_afiliado" class="form-control">
                    <option value="">Seleccionar Afiliado</option>
                    <?php foreach($afiliados as $afiliado) {?>
                        <option value="<?= $afiliado->id ?>"><?= $afiliado->nombre . " " . $afiliado->apellido_paterno . " " . $afiliado->apellido_materno ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tipo</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="">Seleccionar Licencia</option>
                    <option value="Refrendo De Giros Normales">Refrendo De Giros Normales</option>
                    <option value="Refrendo De Bebidas Alcoholicas">Refrendo De Bebidas Alcoholicas</option>
                    <option value="Apertura Ordinaria">Apertura Ordinaria</option>
                    <option value="Apertura Rapida">Apertura Rapida</option>
                </select>
            </div>
            <div class="form-group">
                <label>Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
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