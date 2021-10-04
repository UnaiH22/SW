<?php include 'DbConfig.php' ?>
<?php
    if (isset($_POST['enviar']))
    {
        $error_email="";
        $error_nom="";
        $error_pw="";
        $error = "";
        $us_tipo = trim($_POST['tipoUser']);
        $us_email = trim($_POST['emailUser']);
        $us_nombre = trim($_POST['nombreApellidos']);
        $us_pw = trim($_POST['passwordUser']);
        $us_pw2 = trim($_POST['passwordUser2']);

        $regEmail = preg_match("/^(([a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es))|(([a-z]+|[a-z]+\.[a-z]+)@ehu\.(eus|es)))$/", $us_email);
        $regNombre = preg_match("/^[A-Za-z]{2,}\s[A-Za-z]{2,}$/", $us_nombre);

        $link = mysqli_connect($server, $user, $pass, $basededatos);
        $usuarios = mysqli_query($link,"select * from usuarios where Email ='$us_email'");
        $cont= mysqli_num_rows($usuarios);
        mysqli_close( $link);

        if (!$regEmail)
        {
            $error_email = "Email no válido.";
        }

        if($cont > 0)
        {
            $error_email .= "El email está en uso.";
        }

        if (!$regNombre)
        {
            $error_nom = "Nombre no válido.";
        }

        if (strlen($us_pw) < 8 || $us_pw != $us_pw2)
        {
            $error_pw = "La contraseña debe tener al menos 8 caracteres y las contraseñas tienen que coincidir.";
        }

        if ($error_email == "" && $error_nom == "" && $error_pw == "")
        {
            $link = mysqli_connect($server, $user, $pass, $basededatos);

            if (!strlen($_FILES["imagen"]["name"]) < 1) 
            {
                $target_dir = "../images/";
                $target_file = $target_dir . $_FILES["imagen"]["name"];
      
                if (!move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) 
                {
                  exit(1);
                }
      
                $image = $_FILES["imagen"]["name"]; // para guardar en una variable el nombre de la imagen
              } 
              else 
              {
                $image = "no_image";
              }
              $sql = "INSERT INTO usuarios(Tipo, Email, Nombre, Contraseña, Foto) VALUES ('$us_tipo','$us_email','$us_nombre','$us_pw','$image')";
              if (!mysqli_query($link, $sql)) {
                die('Error en la query: ' . mysqli_error($link));
              }
              echo "Registrado correctamente.";
              mysqli_close($link);
            header("Location: LogIn.php");
        }
        echo($error);
    }
?>

<!DOCTYPE html>
<html>
<head>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script language=JavaScript src="../js/ValidateFieldsQuestionJQ.js"></script>
  <script language=JavaScript src="../js/ShowImageInForm.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <form action = "" id="register" name="register" method="POST" enctype="multipart/form-data">

      <div class="form-check">
      Tipo de usuario<span style="color: #800080">(*)</span>:
      <input type="radio" id="estudiante" name="tipoUser" value="Estudiante" checked>
      <label for="estudiante">Estudiante</label>
      <input type="radio" id="profesor" name="tipoUser" value="Profesor">
      <label for="profesor">Profesor</label><br><br>
      </div>

      <div class=form-group>
      <label for="emailUser">E-mail<span style="color: #800080">(*)</span>:</label>
      <input style="width: 400px" type="text" id="emailUser" name="emailUser" placeholder="nombre222@ikasle.ehu.eus | nombre@ehu.es"><br>
      <?php if(isset($error_email))
      {
          echo "<font color='red'>".$error_email."</font>";
      } ?>
      </div>

      <div class=form-group>
      <label for="nombreApellidos">Nombre y Apellidos<span style="color: #800080">(*)</span>:</label>
      <input style="width: 300px" type="text" id="nombreApellidos" name="nombreApellidos" placeholder="Hugh Jass"><br>
      <?php if(isset($error_nom))
      {
          echo "<font color='red'>".$error_nom."</font>";
      } ?>
      </div>

      <div class=form-group>
      <label for="passwordUser">Contraseña<span style="color: #800080">(*)</span>:</label>
      <input style="width: 300px" type="password" id="passwordUser" name="passwordUser"><br>
      <?php if(isset($error_pw))
      {
          echo "<font color='red'>".$error_pw."</font>";
      } ?>
      </div>
      
      <div class=form-group>
      <label for="passwordUser2">Repetir contraseña<span style="color: #800080">(*)</span>:</label>
      <input style="width: 300px" type="password" id="passwordUser2" name="passwordUser2">
      </div>

      <label for="imagen">Imagen:</label>
      <input type="file" name="imagen" id="imagen" accept="image/*" onchange="readURL(event)">
      <button type="button" id="borrar" name="borrar" value="Borrar">Borrar</button><br>
      <img id="output" height="150"/><br>

      <input type="submit" value="Enviar" name="enviar" id="enviar">
      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>