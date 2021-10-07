<?php include 'DbConfig.php' ?>
<?php session_start();?>
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
    <h1 style="font-size:300%;font-family:courier;background-color:lightblue;"><?php echo $_REQUEST['usuario_nombre']?></h1><br>
      <form id="pregunts" name="pregunts" method="POST" enctype="multipart/form-data">
      <?php 
      if (isset($_REQUEST['usuario_nombre']))
      {
        $usuario_buscado = $_REQUEST['usuario_nombre'];
        $link = mysqli_connect($server, $user, $pass, $basededatos);
        $preguntas = mysqli_query($link,"select * from Preguntas where Email='$usuario_buscado'");
        $cont= mysqli_num_rows($preguntas);
        if($cont > 0)
        {
            echo '<table border=1 style="border:3px solid black;margin-left:auto;margin-right:auto;"> <tr> <th> Pregunta </th> <th> Respuesta Correcta </th> <th> Respuesta Incorrecta </th> <th> Respuesta Incorrecta </th> <th> Respuesta Incorrecta </th><th> Dificultad </th><th> Tema </th></tr>';
            while ($row = mysqli_fetch_row($preguntas)) 
            {
                echo '<tr><td>' .  $row[2] . '</td> <td>' .  $row[3] . '</td> <td>' .  $row[4] . '</td> <td>' .  $row[5] . '</td> <td>' .  $row[6] .'</td> <td>' .  $row[7] .'</td> <td>' .  $row[8] .'</td></tr>';
            }
            echo '</table>';
        }
        else
        {
            echo "<font size='5'>"."El usuario no tiene preguntas."."</font>";
        }
        $preguntas->close();
        mysqli_close( $link);
      }
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>