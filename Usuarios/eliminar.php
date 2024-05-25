<?php
require_once('../Logica/Usuario.php');

$usuario = new Usuario();
if (isset($_GET['id'])) {
    $usuario->eliminaRegistro($_GET['id']);
}
header('Location: index.php');
?>