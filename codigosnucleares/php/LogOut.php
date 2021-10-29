<?php
    session_start();
    $usEmail = $_SESSION['user'];
    if(isset($_SESSION['user']))
    {
        unset($_SESSION['user']);
        unset($_SESSION['foto']);
    }
    header("Location: DecreaseGlobalCounter.php?usEmail=" . $usEmail);
?>