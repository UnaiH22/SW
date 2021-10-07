<?php include 'DbConfig.php' ?>
<?php session_start();?>
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
    <h1 style="font-size:300%;font-family:courier;background-color:lightblue;">Buscar Usuario</h1><br>
      <form id="search" name="search" method="POST" enctype="multipart/form-data">

      <div class=form-group>
      <label for="buscador">Usuario<span style="color: #800080">(*)</span>:</label>
      <input style="width: 400px" type="text" id="buscador" name="buscador"><br>
      </div>

      <input type="submit" value="Enviar" name="buscar" id="buscar"><br><br>
      </form>
      <?php 
      if (isset($_POST['buscar']))
      {
        $valor_buscador = $_POST['buscador'];
        $link = mysqli_connect($server, $user, $pass, $basededatos);
        $usuarios = mysqli_query($link,"select * from Usuarios where Email LIKE '$valor_buscador%'");
        $cont= mysqli_num_rows($usuarios);

        if($cont > 0 && $valor_buscador != "")
        {
            echo '<table border=1 style="border:3px solid black;margin-left:auto;margin-right:auto;"> <tr> <th> Usuario </th> <th> Nombre </th> <th> Foto </th></tr>';
            while ($row = mysqli_fetch_row($usuarios)) 
            {
                echo '<tr><td>' . "<a href=VerPreguntasUsuario.php?usuario_nombre=$row[1]> $row[1]</a>" . '</td> <td>' . $row[2] . '</td> <td>' . "<img src='../images/$row[4]' height='80px' width='100px'>" . '</td></tr>';
            }
            echo '</table>';
        }
        else
        {
            echo "<font size='5'>"."No se han encontrado resultados."."</font>";
        }
        $usuarios->close();
        mysqli_close( $link);
      }
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>