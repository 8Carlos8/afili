<?php require_once('../Logica/Usuario.php');?> 
<?php
$usuario=new Usuario();

if(isset($_POST['id'])){
    $usuario->insertarRegistro();
}
?>
<form action="i2.php" class="ps-4 pe-4 mb-3">
    <div class="mt-3 mb-3">
        <label for="username" class="form-label">Usuario</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="usuario" placeholder="Nombre de Usuario">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
        <input type="hidden" id="rol" name="rol" value="2">
    </div>
    <div class="d-flex w-100 mt-3 justify-content-center">
    <input type="hidden" id="id" name="id" value="">
    <a href="i2.php" class="btn mt-3">Registrarse</a>
</div>
</form>
