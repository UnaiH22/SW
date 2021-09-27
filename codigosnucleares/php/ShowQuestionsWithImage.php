<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include 'DbConfig.php' ?>
  <section class="main" id="s1">
    <div>
      <?php
      $link= mysqli_connect($server, $user, $pass, $basededatos);
      $quizes = mysqli_query($link, "select * from Preguntas"); 
      echo '<table border=1> <tr> <th> Sugerido por </th> <th> Pregunta </th> <th> Respuesta Correcta </th> <th> Respuesta Incorrecta </th> <th> Respuesta Incorrecta </th> <th> Respuesta Incorrecta </th> <th> Dificultad </th> <th> Tema </th> <th> Imagen </th>
      </tr>';
      while ($row = mysqli_fetch_row($quizes)) 
      {
        echo '<tr><td>' . $row[1] . '</td> <td>' . $row[2] . '</td> <td>' . $row[3] . '</td> <td>' . $row[4] . '</td> <td>' . $row[5] . '</td> <td>' . $row[6] . '</td> <td>' . $row[7] . '</td> <td>' . $row[8] . '</td> <td>' . "<img src='../images/$row[9].jpg' height='50px' width='100px'>" . '</td></tr>';
      }
      echo '</table>';
      $quizes->close();
      mysqli_close($link);
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
