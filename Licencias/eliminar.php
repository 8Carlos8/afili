<?php
require_once('../Logica/Licencia.php');

$licencia = new Licencia();
if (isset($_GET['id'])) {
    $licencia->eliminaRegistro($_GET['id']);
}

header('Location: index.php');
?>