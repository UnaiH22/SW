<?php
  session_start();
  if (!isset($_SESSION['user']))
  {
    header("Location: LogIn.php");
    die();
  }
  if (isset($_SESSION['user']) && $_SESSION['rol'] == "Admin")
  {
    header("Location: LogIn.php");
    die();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 <script language=JavaScript src="../js/ValidateFieldsQuestionJQ.js"></script>
 <script language=JavaScript src="../js/ShowImageInForm.js"></script>
 <script language=JavaScript src="../js/AddQuestionsAjax.js"></script>
 <script language=JavaScript src="../js/ShowQuestionsAjax.js"></script>
 <script language=JavaScript src="../js/CountQuestions.js"></script>
 <script language=JavaScript src="../js/GetUserCounter.js"></script>
 <link href="https://fonts.googleapis.com/css2?family=Fira+Mono&display=swap" rel="stylesheet">
<style>
  .lasPreguntas
  {
    position: relative;
    right: -150px;
    top: -350px;
    width: 200px;
    font-family: 'Fira Mono', monospace;
    font-weight: bold;
    font-size: 20px;
    border: 1px solid pink;
  }
  .losUsuarios
  {
    position: relative;
    right: -150px;
    top: -250px;
    width: 200px;
    font-family: 'Fira Mono', monospace;
    font-weight: bold;
    font-size: 20px;
    border: 1px solid greenyellow;
  }

  .showPreguntas
  {
    position: relative;
    top: -80px;
  }
</style>

  <?php include '../html/Head.html'?>
</head>

<body id = "body">
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    <h1 style="font-size:300%;font-family:courier;background-color:lightblue;">Gestionar Preguntas</h1><br>
      <form enctype="multipart/form-data" method="post" name="formPreguntas" id="formPreguntas">
        <label for="email">E-mail<span style="color: #800080">(*)</span>:</label>
        <input type="text" style="width: 200px" id="email" name="email" readonly value="<?php if(isset($_REQUEST['email']))echo $_REQUEST['email'];?>"><br><br>

        <label for="pregunta">Pregunta<span style="color: #800080">(*)</span>:</label>
        <input type="text" style="width: 200px" id="pregunta" name="pregunta"><br><br>

        <label for="respuestaCorrecta">Respuesta Correcta<span style="color: #800080">(*)</span>:</label>
        <input type="text" style="width: 200px" id="respuestaCorrecta" name="respuestaCorrecta"><br><br>

        <label for="respuestaIncorrecta1">Respuesta Incorrecta 1<span style="color: #800080">(*)</span>:</label>
        <input type="text" style="width: 200px" id="respuestaIncorrecta1" name="respuestaIncorrecta1"><br><br>

        <label for="respuestaIncorrecta2">Respuesta Incorrecta 2<span style="color: #800080">(*)</span>:</label>
        <input type="text" style="width: 200px" id="respuestaIncorrecta2" name="respuestaIncorrecta2"><br><br>

        <label for="respuestaIncorrecta3">Respuesta Incorrecta 3<span style="color: #800080">(*)</span>:</label>
        <input type="text" style="width: 200px" id="respuestaIncorrecta3" name="respuestaIncorrecta3"><br><br>

        <label for="dificultad">Dificultad<span style="color: #800080">(*)</span>:</label>
        <select id="dificultad" name="dificultad">
          <option selected="selected" value=1>Baja</option>
          <option value=2>Media</option>
          <option value=3>Alta</option></select><br><br>

        <label for="tema">Tema<span style="color: #800080">(*)</span>:</label>
        <input type="text" style="width: 200px" id="tema" name="tema"><br><br>

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" accept="image/*" onchange="readURL(event)">
        <button type="button" id="borrar" name="borrar" value="Borrar">Borrar</button><br>
        <div id="marco">
        </div>
        <br>
        <input type="button" value="Enviar" name="enviar" id="enviar">

      </form>

      <div id="misPreguntas" class = "lasPreguntas">
      </div>
      <div id = "totalUsuarios" class = "losUsuarios">
      </div>
      <div id="preguntasFeedback" class = "showPreguntas">
      </div>

      </div>
        <input type="button" value="Ver preguntas" name="ver" id="ver" onclick=verPreguntas() class = "showPreguntas">
        
        <div id="resultado">  
      </div>
      
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
