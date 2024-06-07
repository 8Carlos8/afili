<?php
require_once('../Logica/Afiliado.php');

$afiliado = new Afiliado();
if (isset($_GET['id'])) {
    $afiliado->eliminaRegistro($_GET['id']);
}

header('Location: index.php');
?>