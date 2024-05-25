<?php
require_once('../Logica/Promotor.php');

$promotor = new Promotor();
if (isset($_GET['id'])) {
    $promotor->eliminaRegistro($_GET['id']);
}

header('Location: index.php');
?>