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