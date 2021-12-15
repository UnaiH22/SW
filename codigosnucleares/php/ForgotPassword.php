<?php include 'DbConfig.php';
if(isset($_POST['enviar'])){
    try {
        $dsn = "mysql:host=$server;dbname=$basededatos";
        $dbh = new PDO($dsn, $user, $pass);
    } catch (PDOException $e){
        echo $e->getMessage();
    }
    $stmt = $dbh->prepare("SELECT COUNT(*) FROM Usuarios WHERE Email = ?");
    $stmt->bindParam(1,$_POST['emailUser']);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $cont = $stmt->fetch();
    $cont=$cont['COUNT(*)'];
    $dbh = null;
    if($cont=1){
        $para      = $_POST['emailUser'];
        $titulo    = 'Restablecer contraseña';
        $mensaje   = 'Codigo de recuperacion: ' . substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),1,6);

        mail($para, $titulo, $mensaje);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <?php include '../html/Head.html'?>
</head>
<body>
    <?php include '../php/Menus.php' ?>
    <section class="main" id="s1">
        <div>
            <h1 style="font-size:300%;font-family:courier;background-color:lightblue;">Login</h1><br>
            <form id="Forgot" name="register" method="POST" enctype="multipart/form-data">
            <div class=form-group>
                <label for="emailUser">E-mail<span style="color: #800080">(*)</span>:</label>
                <input style="width: 400px" type="text" id="emailUser" name="emailUser" placeholder="nombre222@ikasle.ehu.eus | nombre@ehu.es" value="<?php if ( isset($us_email) ) echo $us_email; ?>"><br>
            </div>
            <div>
                <input type="submit" value="Enviar" name="enviar" id="enviar">
            </div>
        </div>
    </section>
    <?php include '../html/Footer.html' ?>
</body>
</html>