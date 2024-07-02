<?php 
require_once('../Logica/Afiliado.php');
require_once('../Sesion/header.php');

$afiliado = new Afiliado();
$afiliados = $afiliado->lista();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Afiliados</title>
</head>
<body>
    <div class="container-fluid py-3">
        <div class="form-group text-center">
            <a href="Insertar.php" class="btn btn-success">Ingresar a un nuevo afiliado</a>
        </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>RFC</th>
                        <th>CURP</th>
                        <th>Dirección</th>
                        <th>Número Exterior e Interior</th>
                        <th>Código Postal</th>
                        <th>Colonia</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Expediente</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($afiliados as $afiliado) {?>
                        <tr>
                            <td><span title="<?= $afiliado->id ?>"><?= $afiliado->id ?></span></td>
                            <td><span title="<?= $afiliado->nombre ?>"><?= $afiliado->nombre ?></span></td>
                            <td><span title="<?= $afiliado->apellido_paterno ?>"><?= $afiliado->apellido_paterno ?></span></td>
                            <td><span title="<?= $afiliado->apellido_materno ?>"><?= $afiliado->apellido_materno ?></span></td>
                            <td><span title="<?= $afiliado->rfc ?>"><?= $afiliado->rfc ?></span></td>
                            <td><span title="<?= $afiliado->curp ?>"><?= $afiliado->curp ?></span></td>
                            <td><span title="<?= $afiliado->direccion ?>"><?= $afiliado->direccion ?></span></td>
                            <td><span title="<?= $afiliado->numero_Ext_Int ?>"><?= $afiliado->numero_Ext_Int ?></span></td>
                            <td><span title="<?= $afiliado->codiigo_postal ?>"><?= $afiliado->codiigo_postal ?></span></td>
                            <td><span title="<?= $afiliado->colonia ?>"><?= $afiliado->colonia ?></span></td>
                            <td><span title="<?= $afiliado->telefono ?>"><?= $afiliado->telefono ?></span></td>
                            <td><span title="<?= $afiliado->correo ?>"><?= $afiliado->correo ?></span></td>
                            <td><span title="<?= $afiliado->expediente ?>"><?= $afiliado->expediente . " "?>
                            <br>
                                    <a href="../Archivos/Expedientes/<?= $afiliado->expediente ?> " type="application/pdf" target="_blank">Ver Expediente</a>
                                </span></td>
                            <td>
                            <a href="visualizar.php?id=<?= $afiliado->id ?>" class="btn btn-primary" title='Ver datalles '><i class="bi bi-binoculars"></i>&nbsp;Ver Detalles</a>&nbsp;
                            <a href="actualizar.php?id=<?= $afiliado->id ?>" class="btn btn-info btn-space" title='Editar '><i class="bi bi-pencil"></i>&nbsp;Editar Afiliado</a>&nbsp;
                            <a href="eliminar.php?id=<?= $afiliado->id ?>" class="btn btn-warning btn-space" title='Eliminar '><i class="bi bi-pencil"></i>&nbsp;Eliminar</a>&nbsp;
                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>