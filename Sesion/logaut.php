<?php
    session_start();
    $username = $_SESSION['username'];
    if(!isset($username)  || empty($username)){
        session_unset();
        session_destroy();
        clearstatcache();
        header('Location:'.'../index.php');
    }
    session_unset();
        session_destroy();
        clearstatcache();
        header('Location:'.'../index.php');
?>