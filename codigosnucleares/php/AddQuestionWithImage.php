<?php
session_start();
if (!isset($_SESSION['user']))
{
  header("Location: Layout.php");
  die();
}
$reg = preg_match("/^(([a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es))|(([a-z]+|[a-z]+\.[a-z]+)@ehu\.(eus|es)))$/", $_POST['email']);
$error = "";
$us_email = $_SESSION['user'];

if (isset($_POST['pregunta']) && strlen($_POST['pregunta']) < 10) {
  $error .= nl2br("La pregunta debe tener 10 caracteres.\n");
}

if (isset($_POST['respuestaCorrecta']) && strlen($_POST['respuestaCorrecta']) == 0) {
  $error .= nl2br("La respuesta correcta está vacía.\n");
}

if (isset($_POST['respuestaIncorrecta1']) && strlen($_POST['respuestaIncorrecta1']) == 0) {
  $error .= nl2br("La respuesta incorrecta1 está vacía.\n");
}

if (isset($_POST['respuestaIncorrecta2']) && strlen($_POST['respuestaIncorrecta2']) == 0) {
  $error .= nl2br("La respuesta incorrecta2 está vacía.\n");
}

if (isset($_POST['respuestaIncorrecta3']) && strlen($_POST['respuestaIncorrecta3']) == 0)
{
  $error .= nl2br("La respuesta incorrecta3 está vacía.\n");
}

if (isset($_POST['tema']) && strlen($_POST['tema']) == 0) {
  $error .= nl2br("El tema está vacío.\n");
}


// die(print_r($_POST,1));
// die("E:". $error);
?>

<!DOCTYPE html>
<html>

<head>
  <?php include '../html/Head.html' ?>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <?php include 'DbConfig.php' ?>
  <section class="main" id="s1">
    <div>
      <?php
      if ($error == "") 
      {
        $link = mysqli_connect($server, $user, $pass, $basededatos);

        if (!strlen($_FILES["imagen"]["name"]) < 1) 
        {
          $target_dir = "../images/";
          $target_file = $target_dir . $_FILES["imagen"]["name"];

          if (!move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file))
            exit(1);

          $image = $_FILES["imagen"]["name"]; // para guardar en una variable el nombre de la imagen
          $sql = "INSERT INTO Preguntas(Email, Pregunta, CorrectAns, IncAns1, IncAns2, IncAns3, Dificultad, Tema, Imagen) VALUES ('$us_email','$_POST[pregunta]','$_POST[respuestaCorrecta]','$_POST[respuestaIncorrecta1]','$_POST[respuestaIncorrecta2]','$_POST[respuestaIncorrecta3]','$_POST[dificultad]','$_POST[tema]', '$image')";
        } 
        else 
        {
          $image = "no_image";
          $sql = "INSERT INTO Preguntas(Email, Pregunta, CorrectAns, IncAns1, IncAns2, IncAns3, Dificultad, Tema, Imagen) VALUES ('$us_email','$_POST[pregunta]','$_POST[respuestaCorrecta]','$_POST[respuestaIncorrecta1]','$_POST[respuestaIncorrecta2]','$_POST[respuestaIncorrecta3]','$_POST[dificultad]','$_POST[tema]', '$image')";
        }

        if (!mysqli_query($link, $sql))
          die('Error en la query: ' . mysqli_error($link));

        if (file_exists('../xml/Questions.xml'))
          $xml = simplexml_load_file('../xml/Questions.xml');
        else
          die('Error abriendo el xml.');
        
        if ($xml === FALSE)
          die('Error al procesar el xml.');

        $question = $xml->addChild('assessmentItem');
        $question->addAttribute('subject', trim($_POST['tema']));
        $question->addAttribute('author', $us_email);

        $itembody = $question->addChild('itemBody');
        $itembody->addChild('p', trim($_POST['pregunta']));

        $correctResponse = $question->addChild('correctResponse');
        $correctResponse->addChild('response', trim($_POST['respuestaCorrecta']));

        $incorrectResponses = $question->addChild('incorrectResponses');
        $incorrectResponses->addChild('response', trim($_POST['respuestaIncorrecta1']));
        $incorrectResponses->addChild('response', trim($_POST['respuestaIncorrecta2']));
        $incorrectResponses->addChild('response', trim($_POST['respuestaIncorrecta3']));

        $xmlDocument = new DOMDocument('1.0');
        $xmlDocument->preserveWhiteSpace = false;
        $xmlDocument->formatOutput = true;
        $xmlDocument->loadXML($xml->asXML());
        $xmlDocument->saveXML();

        if(!$xmlDocument->save('../xml/Questions.xml'))
          die('Error al intentar guardar los datos en el xml.');

        echo "Pregunta añadida correctamente a la BD.";
        echo "<br>";
        echo "Pregunta añadida correctamente al XML.";
        echo "<p> <a href='ShowQuestionsWithImage.php'> Ver Preguntas </a>";
        mysqli_close($link);
      } else {
        echo( $error );
      }
      ?>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>