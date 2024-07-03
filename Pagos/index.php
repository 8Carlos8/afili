<?php
require_once('../Logica/Pago.php');
require_once('../Logica/Afiliado.php');
require_once('../Logica/Promotor.php');
require_once('../Sesion/header.php');

$pago = new Pago();
$afiliado = new Afiliado();
$promotor = new Promotor();
$pagos = $pago->lista();
$afiliados = $afiliado->lista();
$promotores = $promotor->lista();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Pagos</title>
</head>
<body>
    <div class="container-fluid py-3">
        <div class="form-group text-center">
            <a href="insertar.php" class="btn btn-success">Ingresa un nuevo Pago</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Afiliado</th>
                    <th>ID Promotor</th>
                    <th>Codigo Factura</th>
                    <th>Folio</th>
                    <th>Nombre Comercial</th>
                    <th>Giro</th>
                    <th>Giro 2</th>
                    <th>Localidad</th>
                    <th>Pago afiliación</th>
                    <th>Estado</th>
                    <th>Dirección</th>
                    <th>Calle 1</th>
                    <th>Calle 2</th>
                    <th>Fecha</th>
                    <th>Form</th>
                    <th>Pago c</th>
                    <th>Extemp</th>
                    <th>Salubridad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pagos as $pago) {?>
                    <tr>
                        <td><span title="<?= $pago->id ?>"><?= $pago->id ?></span></td>
                        <td><span title="<?= $pago->id_afiliado ?>">
                            <?php
                            foreach ($afiliados as $afiliado) {
                                if ($afiliado->id == $pago->id_afiliado) {
                                    echo $afiliado->nombre;
                                    break;
                                }
                            }
                            ?>
                        </span></td>
                        <td><span title="<?= $pago->id_promotor ?>">
                            <?php
                            foreach ($promotores as $promotor) {
                                if ($promotor->id == $pago->id_promotor) {
                                    echo $promotor->nombre;
                                    break;
                                }
                            }
                            ?>
                        <td><span title="<?= $pago->codigo_factu ?>"><?= $pago->codigo_factu ?></span></td>
                        <td><span title="<?= $pago->folio ?>"><?= $pago->folio ?></span></td>
                        <td><span title="<?= $pago->nombre_comercial ?>"><?= $pago->nombre_comercial ?></span></td>
                        <td><span title="<?= $pago->giro ?>"><?= $pago->giro ?></span></td>
                        <td><span title="<?= $pago->giro ?>"><?= $pago->giro2 ?></span></td>
                        <td><span title="<?= $pago->localidad ?>"><?= $pago->localidad ?></span></td>
                        <td><span title="<?= $pago->pago_afiliacion ?>"><?= $pago->pago_afiliacion ?></span></td>
                        <td><span title="<?= $pago->estado ?>"><?= $pago->estado ?></span></td>
                        <td><span title="<?= $pago->direccion ?>"><?= $pago->direccion ?></span></td>
                        <td><span title="<?= $pago->calle1 ?>"><?= $pago->calle2 ?></span></td>
                        <td><span title="<?= $pago->calle2 ?>"><?= $pago->calle2 ?></span></td>
                        <td><span title="<?= $pago->fecha ?>"><?= $pago->fecha ?></span></td>
                        <td><span title="<?= $pago->form ?>"><?= $pago->form ?></span></td>
                        <td><span title="<?= $pago->pago_c ?>"><?= $pago->pago_c ?></span></td>
                        <td><span title="<?= $pago->extemp ?>"><?= $pago->extemp ?></span></td>
                        <td><span title="<?= $pago->salubridad ?>"><?= $pago->salubridad ?></span></td>
                        <td>
                            <a href="visualizar.php?id=<?= $pago->id ?>" class="btn btn-primary" title='Ver datalles '><i class="bi bi-binoculars"></i>&nbsp;Ver Detalles</a>&nbsp;
                            <a href="actualizar.php?id=<?= $pago->id ?>" class="btn btn-info btn-space" title='Editar '><i class="bi bi-pencil"></i>&nbsp;Editar Pago</a>&nbsp;
                            <a href="eliminar.php?id=<?= $pago->id ?>" class="btn btn-warning btn-space" title='Eliminar '><i class="bi bi-pencil"></i>&nbsp;Eliminar</a>&nbsp;
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>