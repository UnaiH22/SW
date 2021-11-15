<?php 
    include 'DbConfig.php';
    $usr = $_REQUEST['usr'];
    $link = mysqli_connect($server, $user, $pass, $basededatos);
    $usuarios = mysqli_query($link,"select * from Usuarios where Email = '$usr'");
    if (mysqli_num_rows($usuarios) > 0)
    {
        $elusuario = mysqli_fetch_row($usuarios);
        $estado = $elusuario[5];
        $tipo = $elusuario[0];
        if ($tipo != 'Admin')
        {
            if ($estado == 'Baneado')
                if (!mysqli_query($link,"update Usuarios set Estado = 'Activo' where Email ='$usr'"))
                    echo '<p style="color:red;">Ha habido un error.</p>';
                else
                    echo 'El usuario <strong>' . $usr . '</strong> ha sido <span style="color:green;">Unbaneado</span> correctamente.';
            else
                if (!mysqli_query($link,"update Usuarios set Estado = 'Baneado' where Email ='$usr'"))
                    echo '<p style="color:red;">Ha habido un error.</p>';
                else
                    echo 'El usuario <strong>' . $usr . '</strong> ha sido <span style="color:red;">Baneado</span> correctamente.';
        }
        else
        {
            echo '<p style="color:red;">¿Enserio?</p>';
        }
    }
    else
        echo '<p style="color:red;">Usuario no encontrado.</p>';
    mysqli_close($link);
?>