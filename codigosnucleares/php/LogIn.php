<?php include 'DbConfig.php';
include 'IncreaseGlobalCounter.php' ?>
<?php
    session_start();
    if (isset($_SESSION['user']))
    {
      header("Location: Layout.php");
      die();
    }
    if (isset($_POST['enviar']))
    {
        $error = "";
        $us_email = trim($_POST['emailUser']);
        $us_pw = trim($_POST['passwordUser']);

        try {
          $dsn = "mysql:host=$server;dbname=$basededatos";
          $dbh = new PDO($dsn, $user, $pass);
          } catch (PDOException $e){
          echo $e->getMessage();
          }
          $pw_encrypted = md5($us_pw);
          $stmt = $dbh->prepare("SELECT * FROM Usuarios WHERE Email = ? and Contraseña = ?");
          $stmt->bindParam(1,$us_email);
          $stmt->bindParam(2,$pw_encrypted);
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $cont=0;

          if($usuarioDato = $stmt->fetch()){

            $cont++;
            $estado_usuario = $usuarioDato['Estado'];

            if ($estado_usuario == "Activo"){
            $_SESSION['user'] = $us_email;
            $_SESSION['foto'] = $usuarioDato["Foto"];
            $_SESSION['rol'] = $type;
            incrementar();
            header("Location: Layout.php");
            }else{
            $error .= "Estas Baneado.";
            }
            
          }

        if($cont == 0){
          $error = "Datos incorrectos.";
        }
        $dbh = null;
    }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <?php include '../html/Head.html'?>
  <style>
input {
  font-size: 16px;
  font-size: max(16px, 1em);
  font-family: inherit;
  padding: 0.25em 0.5em;
  background-color: #fff;
  border: 1px solid;
  border-radius: 4px;
}
  </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    <h1 style="font-size:300%;font-family:courier;background-color:lightblue;">Login</h1><br>
    <form id="register" name="register" method="POST" enctype="multipart/form-data">

      <div class=form-group>
      <label for="emailUser">E-mail<span style="color: #800080">(*)</span>:</label>
      <input style="width: 400px" type="text" id="emailUser" name="emailUser" placeholder="nombre222@ikasle.ehu.eus | nombre@ehu.es" value="<?php if ( isset($us_email) ) echo $us_email; ?>"><br>
      </div>

      <div class=form-group>
      <label for="passwordUser">Contraseña<span style="color: #800080">(*)</span>:</label>
      <input style="width: 300px" type="password" id="passwordUser" name="passwordUser">
      <a href='ForgotPassword.php'>&ensp;Forgot password</a><br>
      <?php if(isset($error))
      {
          echo "<font color='red'>".$error."</font>";
      } ?>
      </div>
      <div>
      <input type="submit" value="Enviar" name="enviar" id="enviar">
    </div>
      <?php if (isset($error2)) echo '<br/> <img src = ../images/notpass.gif height = 220px width = 400px>';
            else if (isset($error) && $error == 'Estas Baneado.')
            echo '<br/><img src = ../images/banned.gif height = 220px width = 400px>';
       ?>
    </form>
      
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
