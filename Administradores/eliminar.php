<?php
require_once('../Logica/Administrador.php');

$administrador = new Administrador();
if (isset($_GET['id'])) {
    $administrador->eliminaRegistro($_GET['id']);
}

header('Location: index.php');
?>