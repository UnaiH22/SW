<?php 
    include 'DbConfig.php';
    session_start();
    $admin = $_SESSION['user'];
    $link = mysqli_connect($server, $user, $pass, $basededatos);
    $users = mysqli_query($link,"select * from Usuarios where Email !='$admin'");
    $cont= mysqli_num_rows($users);
    if($cont > 0)
    {
        //echo '<table border=1 style="border:3px solid black;margin-left:auto;margin-right:auto;"> <tr> <th> Usuario </th> <th> Nombre </th> <th> Contraseña </th> <th> Imagen </th><th> Estado </th><th> Cambiar Estado </th><th> Eliminar </th></tr>';
        echo '<table border=1 style="border:3px solid black;margin-left:auto;margin-right:auto;"> <tr> <th> Usuario </th> <th> Nombre </th> <th> Contraseña </th> <th> Imagen </th><th> Estado </th></tr>';
        while ($row = mysqli_fetch_row($users)) 
        {
            //echo '<tr><td>' .  $row[1] . '</td> <td>' .  $row[2] . '</td> <td>' .  $row[3] . '</td> <td>' . "<img src='../images/$row[4]' height='50px' width='50px'>" . '</td><td>' . $row[5] . '</td><td>' . "<button onclick=\"banear('$row[1]');\">Ban</button>" .'</td><td>' . "<button onclick=\"eliminar('$row[1]');\">Eliminar</button>" .'</td></tr>';
            echo '<tr><td>' .  $row[1] . '</td> <td>' .  $row[2] . '</td> <td>' .  $row[3] . '</td> <td>' . "<img src='../images/$row[4]' height='50px' width='50px'>" . '</td><td>' . $row[5] . '</td></tr>';
        }
        echo '</table>';
    }
    $users->close();
    mysqli_close($link);
?>