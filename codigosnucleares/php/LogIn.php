<?php include 'DbConfig.php' ?>
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

        $link = mysqli_connect($server, $user, $pass, $basededatos);
        $us_pw_limpia = mysqli_real_escape_string($link, $us_pw);
        $usuarios = mysqli_query($link,"select * from Usuarios where Email ='$us_email' and Contraseña = '$us_pw_limpia'");
        $usuarioDato = $usuarios->fetch_assoc();
        $cont= mysqli_num_rows($usuarios);
        mysqli_close( $link);

        if($cont == 0)
        {
            $error = "Datos incorrectos.";
            if ($us_pw_limpia != $us_pw)
              $error2 = "";
        }

        if ($error == "")
        {
            $link = mysqli_connect($server, $user, $pass, $basededatos);
            $tipo_user = mysqli_query($link,"select Tipo from Usuarios where Email ='$us_email'");
            $row = mysqli_fetch_row($tipo_user);
            $type = $row[0];
            mysqli_close( $link);
            $_SESSION['user'] = $us_email;
            $_SESSION['foto'] = $usuarioDato["Foto"];
            $_SESSION['rol'] = $type;
            header("Location: IncreaseGlobalCounter.php?addUser=true");
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
    <form id="register" name="register" method="POST" enctype="multipart/form-data">

      <div class=form-group>
      <label for="emailUser">E-mail<span style="color: #800080">(*)</span>:</label>
      <input style="width: 400px" type="text" id="emailUser" name="emailUser" placeholder="nombre222@ikasle.ehu.eus | nombre@ehu.es" value="<?php if ( isset($us_email) ) echo $us_email; ?>"><br>
      </div>

      <div class=form-group>
      <label for="passwordUser">Contraseña<span style="color: #800080">(*)</span>:</label>
      <input style="width: 300px" type="password" id="passwordUser" name="passwordUser"><br>
      <?php if(isset($error))
      {
          echo "<font color='red'>".$error."</font>";
      } ?>
      </div>

      <input type="submit" value="Enviar" name="enviar" id="enviar">
      <?php if (isset($error2)) echo '<br/> <img src = ../images/notpass.gif height = 220px width = 400px>'; ?>
    </form>
      
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
