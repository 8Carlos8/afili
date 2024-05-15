<?php require_once('../Logica/Persona.php')?>
<?php 
$afiliado = new Persona();
$afiliados = $afiliado->lista();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afiliados</title>
</head>
<body>
    <div class="container">
        <div class="form-group text-center">
            <i class="fas fa-folder-plus"></i>
            <a href="Insertar.php" class="btn-btn-succes">Ingresar a un nuevo afiliado</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>RFC Text</th>
                    <th>RFC PDF</th>
                    <th>CURP Text</th>
                    <th>CURP PDF</th>
                    <th>Dirección</th>
                    <th>Número</th>
                    <th>Comprobante de Domicilio</th>
                    <th>Código Postal</th>
                    <th>Colonia</th>
                    <th>INE</th>
                    <th>Contrato de Arrendamiento</th>
                    <th>Croquis</th>
                    <th>Imagen 1</th>
                    <th>Imagen 2</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($afiliados as $afiliado) {?>
                    <tr>
                        <td><spam title="<?= $afiliado->id ?>"><?= $afiliado->id ?></spam></td>
                        <td><spam title="<?= $afiliado->nombre ?>"><?= $afiliado->nombre ?></spam></td>
                        <td><spam title="<?= $afiliado->rfc_text ?>"<?= $afiliado->rfc_text ?>></spam></td>
                        <td><spam title="<?= $afiliado->rfc_pdf ?>"<?= $afiliado->rfc_pdf ?>></spam></td>
                        <td><spam title="<?= $afiliado->curp_text ?>"<?= $afiliado->curp_text ?>></spam></td>
                        <td><spam title="<?= $afiliado->curp_pdf ?>"<?= $afiliado->curp_pdf ?>></spam></td>
                        <td><spam title="<?= $afiliado->direccion ?>"<?= $afiliado->direccion ?>></spam></td>
                        <td><spam title="<?= $afiliado->num ?>"<?= $afiliado->num ?>></spam></td>
                        <td><spam title="<?= $afiliado->comprobante_domi ?>"<?= $afiliado->comprobante_domi ?>></spam></td>
                        <td><spam title="<?= $afiliado->cod_postal ?>"<?= $afiliado->cod_postal ?>></spam></td>
                        <td><spam title="<?= $afiliado->colonia ?>"<?= $afiliado->colonia ?>></spam></td>
                        <td><spam title="<?= $afiliado->ine ?>"<?= $afiliado->ine ?>></spam></td>
                        <td><spam title="<?= $afiliado->contrato_arrenda ?>"<?= $afiliado->contrato_arrenda ?>></spam></td>
                        <td><spam title="<?= $afiliado->croquis ?>"<?= $afiliado->croquis ?>></spam></td>
                        <td><spam title="<?= $afiliado->img1 ?>"<?= $afiliado->img1 ?>></spam></td>
                        <td><spam title="<?= $afiliado->img2 ?>"<?= $afiliado->img2 ?>></spam></td>
                        <td>
                            <a href="Editar.php?id=<?= $afiliado->id ?>" title="Editar Afiliado"><img src="../images/pencil.svg"></a>&nbsp;
                            <a href="Visualizar.php=id<?= $afiliado->id ?>" title="Visualizar Afiliado"><img src="../images/view-list.svg"></a>&nbsp;
                            <a href=""></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="form-group text-center">
            <a href="">Regresar</a>
        </div>
    </div>
</body>
</html>