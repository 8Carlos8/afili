<?php
require_once('../Logica/Licencia.php');

$licencia = new Licencia();
if (isset($_GET['id'])) {
    $licencia->id = $_GET['id'];
    $vLicencia = $licencia->recuperarLicenciaPorId($licencia->id);

    if ($vLicencia) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="licencia.pdf"');
        echo $vLicencia;
    }
}
?>