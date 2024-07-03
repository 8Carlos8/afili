<?php
require_once('../Logica/Pago.php');

$pago = new Pago();
if (isset($_GET['id'])) {
    $pago->eliminarRegistro($_GET['id']);
}

header('Location: index.php');
?>