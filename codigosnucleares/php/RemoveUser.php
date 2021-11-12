<?php 
    include 'DbConfig.php';
    $usr = $_REQUEST['usr'];
    $link = mysqli_connect($server, $user, $pass, $basededatos);
    $usuarios = mysqli_query($link,"select * from Usuarios where Email = '$usr'");
    if (mysqli_num_rows($usuarios) > 0)
    {
        $tipo = mysqli_fetch_row($usuarios)[0];
        if ($tipo != "Admin")
        {
            if (!mysqli_query($link,"delete from usuarios where Email = '$usr'"))
                echo '<p style="color:red;">Ha habido un error.</p>';
            else
                echo 'El usuario <strong>' . $usr . '</strong> ha sido <span style="color:red;">Eliminado</span> correctamente.';
        }
        else
            echo '<p style="color:red;">¡No te puedes eliminar a ti mismo!</p>';
    }
    else
        echo '<p style="color:red;">Usuario no encontrado.</p>';
    mysqli_close($link);
?>