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
        $error_email="";
        $error_nom="";
        $error_pw="";
        $error = "";
        $us_tipo = trim($_POST['tipoUser']);
        $us_email = trim($_POST['emailUser']);
        $us_nombre = trim($_POST['nombreApellidos']);
        $us_pw = trim($_POST['passwordUser']);
        $us_pw2 = trim($_POST['passwordUser2']);

        $regEmailStud = preg_match("/^([a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es))$/", $us_email);
        $regEmailProf = preg_match("/^(([a-z]+|[a-z]+\.[a-z]+)@ehu\.(eus|es))$/", $us_email);
        $regNombre = preg_match("/^[A-Za-z]{2,}\s[A-Za-z]{2,}$/", $us_nombre);

        $link = mysqli_connect($server, $user, $pass, $basededatos);
        $usuarios = mysqli_query($link,"select * from Usuarios where Email ='$us_email'");
        $cont= mysqli_num_rows($usuarios);
        mysqli_close( $link);


        if ($us_tipo == "Estudiante" && !$regEmailStud || $us_tipo == "Profesor" && !$regEmailProf)
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
                $default_images = array("brainlet1.jpg", "brainlet2.jpg", "brainlet3.jpg", "brainlet4.jpg", "brainlet5.jpg", "brainlet6.jpg", "brainlet7.jpg", "brainlet8.jpg", "brainlet9.jpg", "brainlet10.jpg");
                $random_img = rand(0,9);
                $image = $default_images[rand(0,9)];
              }
              $sql = "INSERT INTO Usuarios(Tipo, Email, Nombre, Contraseña, Foto) VALUES ('$us_tipo','$us_email','$us_nombre','$us_pw','$image')";
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
    <h1 style="font-size:300%;font-family:courier;background-color:lightblue;">Registrarse</h1><br>
      <form id="register" name="register" method="POST" enctype="multipart/form-data">

      <div class="form-check">
      Tipo de usuario<span style="color: #800080">(*)</span>:
      <input type="radio" id="estudiante" name="tipoUser" value="Estudiante" checked>
      <label for="estudiante">Estudiante</label>
      <input type="radio" id="profesor" name="tipoUser" value="Profesor">
      <label for="profesor">Profesor</label><br><br>
      </div>

      <div class=form-group>
      <label for="emailUser">E-mail<span style="color: #800080">(*)</span>:</label>
      <input style="width: 400px" type="text" id="emailUser" name="emailUser" placeholder="nombre222@ikasle.ehu.eus | nombre@ehu.es" value="<?php if ( isset($us_email) ) echo $us_email; ?>"><br>
      <?php if(isset($error_email))
      {
          echo "<font color='red'>".$error_email."</font>";
      } ?>
      </div>

      <div class=form-group>
      <label for="nombreApellidos">Nombre y Apellidos<span style="color: #800080">(*)</span>:</label>
      <input style="width: 300px" type="text" id="nombreApellidos" name="nombreApellidos" placeholder="Hugh Jass" value="<?php if ( isset($us_nombre) ) echo $us_nombre; ?>"><br>
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
      <img id="output" height="85"/><br>

      <input type="submit" value="Enviar" name="enviar" id="enviar">
      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>