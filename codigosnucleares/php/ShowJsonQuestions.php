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
    <h1 style="font-size:300%;font-family:courier;background-color:lightblue;">Preguntas JSON</h1><br>
    <?php 

    $data = file_get_contents('../json/Questions.json');
    if ($data === false)
        die("Error al abrir el JSON.");

    $array = json_decode($data);
    if ($array == null)
          die("Error al decodificar el json.");

          
    echo '<table border=1 style="border:3px solid black;margin-left:auto;margin-right:auto;"> <tr> <th> Autor </th> <th> Pregunta </th> <th> Respuesta Correcta </th></tr>';
        foreach($array->assessmentItems as $assessment)
        {
            echo '<tr><td>' . $assessment->author . '</td> <td>' .  $assessment->itemBody->p . '</td> <td>' .  $assessment->correctResponse->value . '</td></tr>';
        }
        echo '</table>';
    ?>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
