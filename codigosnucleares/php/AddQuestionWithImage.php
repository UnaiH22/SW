<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include '/DbConfig.php' ?>
  <section class="main" id="s1">
    <div>

    <?php
      $link = mysqli_connect("$server", "$user", "$pass", "$basededatos");

      $target_dir = "../images/";
      $target_file = $target_dir . basename($_FILES["imagen"]["name"]);

      if(!move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file))
      {
        exit(1);
      }

      $image=basename($_FILES["imagen"]["name"],".jpg"); // para guardar en una variable el nombre de la imagen

      $sql="INSERT INTO Preguntas(Email, Pregunta, CorrectAns, IncAns1, IncAns2, IncAns3, Dificultad, Tema, Imagen) VALUES ('$_POST[email]','$_POST[pregunta]','$_POST[respuestaCorrecta]','$_POST[respuestaIncorrecta1]','$_POST[respuestaIncorrecta2]','$_POST[respuestaIncorrecta3]','$_POST[dificultad]','$_POST[tema]', '$image')";

      if (!mysqli_query($link ,$sql))
      {
        die('Error: ' . mysqli_error($link));
      }
      echo "Pregunta añadida correctamente.";
      echo "<p> <a href='ShowQuestionsWithImage.php'> Ver Preguntas </a>";
      mysqli_close($link); 
      ?>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
