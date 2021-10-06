<?php
    session_start();
    if(isset($_SESSION['user']))
    {
        unset($_SESSION['user']);
        unset($_SESSION['foto']);
    }
    header("Location: Layout.php");
?>