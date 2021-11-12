<?php
    session_start();
    $usEmail = $_SESSION['user'];
    if(isset($_SESSION['user']))
    {
        unset($_SESSION['user']);
        unset($_SESSION['foto']);
        unset($_SESSION['rol']);
        session_destroy();
    }
    header("Location: DecreaseGlobalCounter.php?usEmail=" . $usEmail);
?>