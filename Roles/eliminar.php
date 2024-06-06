<?php
require_once('../Logica/Rol.php');

$rol = new Rol();
if (isset($_GET['id'])) {
    $rol->eliminaRegistro($_GET['id']);
}

header('Location: index.php');
?>