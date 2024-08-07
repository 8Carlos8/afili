<?php
require_once('../Logica/Modelo.php');
require_once('../Logica/Pago.php');

$pago = new Pago();
$id_pago = isset($_GET['id']) ? intval($_GET['id']) : 0;
$pago->recuperarRegistro($id_pago);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobante de Pago</title>
    <style>
        @media print {
            body {
                width: 80mm;
                margin: 0;
            }
            .comprobante {
                font-family: Arial, sans-serif;
                font-size: 12px;
                line-height: 1.4;
            }
            .comprobante h1 {
                font-size: 16px;
                margin-bottom: 10px;
            }
            .comprobante p {
                margin: 0;
                padding: 2px 0;
            }
            .no-print {
                display: none;
            }
        }

        .comprobante {
            border: 1px solid #000;
            padding: 20px;
            max-width: 300px;
            margin: auto;
        }
        .comprobante h1 {
            text-align: center;
            font-size: 16px;
        }
        .comprobante p {
            font-size: 1.2em;
        }
        .no-print {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="comprobante">
        <h1>Comprobante de Pago</h1>
        <p><strong>Fecha:</strong> <?php echo htmlspecialchars($pago->fecha); ?></p>
        <p><strong>Nombre Comercial:</strong> <?php echo htmlspecialchars($pago->nombre_comercial); ?></p>
        <p><strong>Giro:</strong> <?php echo htmlspecialchars($pago->giro); ?></p>
        <p><strong>Localidad:</strong> <?php echo htmlspecialchars($pago->localidad); ?></p>
        <p><strong>Pago de Afiliación:</strong> $<?php echo htmlspecialchars($pago->pago_afiliacion); ?></p>
        <p><strong>Estado:</strong> <?php echo htmlspecialchars($pago->estado); ?></p>
        <p><strong>Dirección:</strong> <?php echo htmlspecialchars($pago->direccion); ?></p>
        <p><strong>Calle 1:</strong> <?php echo htmlspecialchars($pago->calle1); ?></p>
        <p><strong>Calle 2:</strong> <?php echo htmlspecialchars($pago->calle2); ?></p>
        <p><strong>Formulario:</strong> <?php echo htmlspecialchars($pago->form); ?></p>
        <p><strong>Pago C:</strong> $<?php echo htmlspecialchars($pago->pago_c); ?></p>
        <p><strong>Extemporáneo:</strong> $<?php echo htmlspecialchars($pago->extemp); ?></p>
        <p><strong>Salubridad:</strong> $<?php echo htmlspecialchars($pago->salubridad); ?></p>
    </div>
    <button class="no-print" onclick="window.print()">Imprimir Comprobante</button>
</body>
</html>
