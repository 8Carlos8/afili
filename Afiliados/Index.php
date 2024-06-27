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
    <title>Afiliados</title>
</head>
<style>
    body {
            background-color: white;
            font-family: 'Arial', sans-serif;
        }
        .btn-space {
            margin-block-end: 10px;
        }
</style>
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
                            <td><spam title="<?= $afiliado->id ?>"><?= $afiliado->id ?></spam></td>
                            <td><spam title="<?= $afiliado->nombre ?>"><?= $afiliado->nombre ?></spam></td>
                            <td><spam title="<?= $afiliado->apellido_paterno ?>"><?= $afiliado->apellido_paterno ?></spam></td>
                            <td><spam title="<?= $afiliado->apellido_materno ?>"><?= $afiliado->apellido_materno ?></spam></td>
                            <td><spam title="<?= $afiliado->rfc ?>"><?= $afiliado->rfc ?></spam></td>
                            <td><spam title="<?= $afiliado->curp ?>"><?= $afiliado->curp ?></spam></td>
                            <td><spam title="<?= $afiliado->direccion ?>"><?= $afiliado->direccion ?></spam></td>
                            <td><spam title="<?= $afiliado->numero_Ext_Int ?>"><?= $afiliado->numero_Ext_Int ?></spam></td>
                            <td><spam title="<?= $afiliado->codiigo_postal ?>"><?= $afiliado->codiigo_postal ?></spam></td>
                            <td><spam title="<?= $afiliado->colonia ?>"><?= $afiliado->colonia ?></spam></td>
                            <td><spam title="<?= $afiliado->telefono ?>"><?= $afiliado->telefono ?></spam></td>
                            <td><spam title="<?= $afiliado->correo ?>"><?= $afiliado->correo ?></spam></td>
                            <td><spam title="<?= $afiliado->expediente ?>"><?= $afiliado->expediente . " "?>
                            <br>
                                    <a href="../Archivos/<?= $afiliado->expediente ?> " type="application/pdf" target="_blank">Ver Expediente</a>
                                </spam></td>
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