<?php
    include 'DecreaseGlobalCounter.php';
    session_start();
    $usEmail = $_SESSION['user'];
    if(isset($_SESSION['user']))
    {
        decrease();
        unset($_SESSION['user']);
        unset($_SESSION['foto']);
        unset($_SESSION['rol']);
        session_destroy();
    }
    header("Location: Layout.php");
?>