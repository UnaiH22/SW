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
                    echo 'Ha habido un error.';
                else
                    echo '¡El usuario <strong>' . $usr . '</strong> ha <span style="color:pink;"> vuelto a la vida</span> correctamente!';
            else
                if (!mysqli_query($link,"update Usuarios set Estado = 'Baneado' where Email ='$usr'"))
                    echo 'Ha habido un error.';
                else
                    echo '¡El usuario <strong>' . $usr . '</strong> ha sido <span style="color:red;">arrojado al abismo </span> correctamente!';
        }
        else
        {
            echo '¿Enserio?';
        }
    }
    else
        echo 'Usuario no encontrado.';
    mysqli_close($link);
?>