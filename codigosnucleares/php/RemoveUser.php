<?php 
    session_start();
    if (!isset($_SESSION['user']))
    {
        header("Location: Layout.php");
        exit();
    }
    if (isset($_SESSION['rol']))
    {
        if ($_SESSION['rol'] != "Admin")
        {
            header("Location: Layout.php");
            exit();
        }
    };
        
    include 'DbConfig.php';
    $usr = $_REQUEST['usr'];
    $link = mysqli_connect($server, $user, $pass, $basededatos);
    $usuarios = mysqli_query($link,"select * from Usuarios where Email = '$usr'");
    if (mysqli_num_rows($usuarios) > 0)
    {
        $tipo = mysqli_fetch_row($usuarios)[0];
        if ($tipo != "Admin")
        {
            if (!mysqli_query($link,"delete from Usuarios where Email = '$usr'"))
                echo 'Ha habido un error.';
            else
                echo '¡El usuario <strong>' . $usr . '</strong> ha sido <span style="color:red;">Eliminado</span> correctamente!';
        }
        else
            echo 'No te puedes eliminar a ti mismo';
    }
    else
        echo 'Usuario no encontrado.';
    mysqli_close($link);
?>