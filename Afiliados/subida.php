<?php
require_once('../Logica/Afiliado.php');
if (isset($_FILES['expediente'])) {
    extract($_POST);
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $carpeta_des = "../pdf/";

    $nombre_archivo = basename($_FILES['expediente']['name']);
    $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES['expediente']['name'], $carpeta_des . $nombre_archivo)) {
        
    }
}
?>