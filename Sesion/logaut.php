<?php
    session_start();
    $user_name = $_SESSION['user_name'];
    if(!isset($user_name)  || empty($user_name)){
        session_unset();
        session_destroy();
        clearstatcache();
        header('Location:'.'../Sesion/index.php' );
    }
    session_unset();
        session_destroy();
        clearstatcache();
        header('Location:'.'../Sesion/index.php' );
?>