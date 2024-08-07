<?php
require_once('../Logica/Afiliado.php');

// Asumiendo que ya tienes el ID del afiliado que quieres mostrar
$id_afiliado = 1; // Ejemplo de ID

$afiliado = new Afiliado();
$registro = $afiliado->recuperarRegistro($id_afiliado);

if ($registro) {
    $html = "
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            .recibo {
                position: relative;
                width: 700px;
                height: 1000px;
                border: 1px solid #000;
                padding: 20px;
                margin: 0 auto;
            }
            .campo {
                position: absolute;
                font-size: 14px;
            }
            .recibi-de { top: 120px; left: 50px; }
            .rfc { top: 160px; left: 50px; }
            .modo-pago { top: 200px; left: 50px; }
            .cantidad { top: 240px; left: 50px; }
            .concepto { top: 280px; left: 50px; }
            .direccion { top: 320px; left: 50px; }
            .denominacion { top: 360px; left: 50px; }
            .giro { top: 400px; left: 50px; }
            .entre-calles { top: 440px; left: 50px; }
            .telefono { top: 480px; left: 50px; }
            .correo { top: 520px; left: 50px; }
            .curp { top: 560px; left: 400px; }
            .fecha { top: 600px; left: 400px; }
            .nombre-promotor { top: 640px; left: 50px; }
        </style>
    </head>
    <body>
        <div class='recibo'>
            <div class='campo recibi-de'>{$registro->nombre} {$registro->apellido_paterno} {$registro->apellido_materno}</div>
            <div class='campo rfc'>{$registro->rfc}</div>
            <div class='campo modo-pago'>EFECTIVO</div>
            <div class='campo cantidad'>1000</div>
            <div class='campo concepto'>Inscripción</div>
            <div class='campo direccion'>{$registro->direccion} {$registro->numero_Ext_Int}, C.P. {$registro->codiigo_postal}</div>
            <div class='campo denominacion'>{$registro->colonia}</div>
            <div class='campo giro'>Comercio</div>
            <div class='campo entre-calles'>Entre calle A y B</div>
            <div class='campo telefono'>{$registro->telefono}</div>
            <div class='campo correo'>{$registro->correo}</div>
            <div class='campo curp'>{$registro->curp}</div>
            <div class='campo fecha'>" . date('Y-m-d') . "</div>
            <div class='campo nombre-promotor'>Nombre del Promotor</div>
        </div>
    </body>
    </html>
    ";

    echo $html;
} else {
    echo "No se encontró el registro del afiliado.";
}
?>
