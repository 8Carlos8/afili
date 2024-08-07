<?php
require_once('../Logica/Afiliado.php');

if (isset($_GET['id'])) {
    $afiliado = new Afiliado();
    $afiliado->id = $_GET['id'];
    $expediente = $afiliado->recuperarExpedientePorId($afiliado->id);

    if ($expediente) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="expediente.pdf"');
        echo $expediente;
    } else {
        echo "No se encontró el expediente.";
    }
} else {
    //echo "ID no proporcionado.";
}
?>
