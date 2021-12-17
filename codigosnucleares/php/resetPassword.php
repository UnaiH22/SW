<?php include 'DbConfig.php';
session_start();
if(isset($_POST['enviar'])){
    if($_POST['passw']==$_POST['rpassw']){
        try {
            $dsn = "mysql:host=$server;dbname=$basededatos";
            $dbh = new PDO($dsn, $user, $pass);
            } catch (PDOException $e){
            echo $e->getMessage();
            }
            $pw_encrypted = md5($us_pw);
            $stmt = $dbh->prepare("update Usuarios set Contraseña = ? where Email = ?");
            $stmt->bindParam(1,$pw_encrypted);
            $stmt->bindParam(2,$_SESSION['email']);
            unset($_SESSION['email']);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            echo "<label>succesfuly updated</label>"
            $dbh = null;
            sleep(1);
            header('Location: Layout.php');
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
            <h1 style="font-size:300%;font-family:courier;background-color:lightblue;">FORGOT PASSWORD</h1><br>
            <form id="Forgot" name="register" method="POST" enctype="multipart/form-data">
                <div class=form-group>
                    <label for="emailUser">New password<span style="color: #800080">(*)</span>:</label>
                    <input style="width: 400px" type="password" id="passw" name="passw"><br>
                    <label for="emailUser">Repeat password<span style="color: #800080">(*)</span>:</label>
                    <input style="width: 400px" type="password" id="rpassw" name="rpassw"><br>
                </div>
                <div>
                    <input type="submit" value="Enviar" name="enviar" id="enviar">
                </div>
            </from>
        </div>
    </section>
    <?php include '../html/Footer.html' ?>
</body>
</html>