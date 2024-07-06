<?php
require_once('../Logica/Afiliado.php');

$afiliado = new Afiliado();
if (isset($_GET['id'])) {
    $afiliado->id = $_GET['id'];
    $expediente = $afiliado->recuperarExpedientePorId($afiliado->id);

    if ($expediente) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="expediente.pdf"');
        echo $expediente;
    } 
} 
?>