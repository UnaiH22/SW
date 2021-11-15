<?php include 'DbConfig.php' ?>
<?php
    header("Location: Layout.php");
    die();
    $link = mysqli_connect($server, $user, $pass, $basededatos);
        
    $usuarios = mysqli_query($link,"select * from Usuarios");

    while ($row = mysqli_fetch_array($usuarios)) 
    {
        $query =  "update Usuarios set Contraseña = '" . md5($row['Contraseña']) . "' where Email = '" . $row['Email'] . "'";
        print_r ($query  .  "\n" );
        $update = mysqli_query($link,  $query);
    }
    mysqli_close( $link);

?>
