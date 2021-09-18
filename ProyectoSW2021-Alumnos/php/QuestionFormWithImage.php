<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

    <form action="../js/ValidateFieldsQuestionJS.js" method="post" enctype="multipart/form-data">
        <label for="email">E-mail<span style="color: #800080">(*)</span>:</label>
        <input type="text" id="email" name="email"><br><br>

        <label for="pregunta">Pregunta<span style="color: #800080">(*)</span>:</label>
        <input type="text" id="pregunta" name="pregunta"><br><br>

        <label for="respuestaCorrecta">Respuesta Correcta<span style="color: #800080">(*)</span>:</label>
        <input type="text" id="respuestaCorrecta" name="respuestaCorrecta"><br><br>

        <label for="respuestaIncorrecta1">Respuesta Incorrecta 1<span style="color: #800080">(*)</span>:</label>
        <input type="text" id="respuestaIncorrecta1" name="respuestaIncorrecta1"><br><br>

        <label for="respuestaIncorrecta2">Respuesta Incorrecta 2<span style="color: #800080">(*)</span>:</label>
        <input type="text" id="respuestaIncorrecta2" name="respuestaIncorrecta2"><br><br>

        <label for="respuestaIncorrecta3">Respuesta Incorrecta 3<span style="color: #800080">(*)</span>:</label>
        <input type="text" id="respuestaIncorrecta3" name="respuestaIncorrecta3"><br><br>

        <label for="dificultad">Dificultad<span style="color: #800080">(*)</span>:</label>
        <select id="dificultad" name="dificultad">
          <option selected="selected" value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option></select><br><br>

        <label for="tema">Tema<span style="color: #800080">(*)</span>:</label>
        <input type="text" id="tema" name="tema"><br><br>

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen"><br><br>

        <input type="submit" value="Enviar" name="enviar">

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
