<?php
session_start();
if (!isset($_SESSION['user']))
  {
    header("Location: LogIn.php");
    die();
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
    <h1 style="font-size:300%;font-family:courier;background-color:lightblue;">Preguntas XML</h1><br>
    <?php 
    if (file_exists('../xml/Questions.xml'))
        $questions = simplexml_load_file('../xml/Questions.xml');
    else
        die('Error abriendo el xml.');
    if ($questions === FALSE)
        die('Error al procesar el xml.');

    echo '<table border=1 style="border:3px solid black;margin-left:auto;margin-right:auto;"> <tr> <th> Autor </th> <th> Pregunta </th> <th> Respuesta Correcta </th></tr>';
        foreach($questions->xpath('assessmentItem') as $assessment)
        {
            echo '<tr><td>' . $assessment['author'] . '</td> <td>' .  $assessment->itemBody->p . '</td> <td>' .  $assessment->correctResponse->response . '</td></tr>';
        }
        echo '</table>';
    ?>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
