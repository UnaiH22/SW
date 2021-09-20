<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script language=JavaScript src="../js/ShowImageInForm.js"></script>
  <script language="JavaScript">
    function verificar()
{
    var email = document.getElementById("email").value;
    var pregunta = document.getElementById("pregunta").value;

    var regExEmailStud = new RegExp("[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)");
    var regExEmailProf = new RegExp("([a-z]+|[a-z]+\.[a-z]+)@ehu\.(eus|es)");

    if (pregunta.length < 10)
    {
        alert("La pregunta debe de tener al menos 10 caracteres.");
        return false;
    }

    if (!regExEmailStud.test(email) && !regExEmailProf.test(email))
    {
        alert("Email no válido");
        return false;
    }
    return true;
}
  </script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    <form action="AddQuestionWithImage.php" id="fquestion" name="fquestion" method="post" enctype="multipart/form-data" onsubmit="return verificar()">
        <label for="email">E-mail<span style="color: #800080">(*)</span>:</label>
        <input type="text" id="email" name="email" required><br><br>

        <label for="pregunta">Pregunta<span style="color: #800080">(*)</span>:</label>
        <input type="text" id="pregunta" name="pregunta" required><br><br>

        <label for="respuestaCorrecta">Respuesta Correcta<span style="color: #800080">(*)</span>:</label>
        <input type="text" id="respuestaCorrecta" name="respuestaCorrecta" required><br><br>

        <label for="respuestaIncorrecta1">Respuesta Incorrecta 1<span style="color: #800080">(*)</span>:</label>
        <input type="text" id="respuestaIncorrecta1" name="respuestaIncorrecta1" required><br><br>

        <label for="respuestaIncorrecta2">Respuesta Incorrecta 2<span style="color: #800080">(*)</span>:</label>
        <input type="text" id="respuestaIncorrecta2" name="respuestaIncorrecta2" required><br><br>

        <label for="respuestaIncorrecta3">Respuesta Incorrecta 3<span style="color: #800080">(*)</span>:</label>
        <input type="text" id="respuestaIncorrecta3" name="respuestaIncorrecta3" required><br><br>

        <label for="dificultad">Dificultad<span style="color: #800080">(*)</span>:</label>
        <select id="dificultad" name="dificultad">
          <option selected="selected" value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option></select><br><br>

        <label for="tema">Tema<span style="color: #800080">(*)</span>:</label>
        <input type="text" id="tema" name="tema" required><br><br>

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" accept="image/*" onchange="readURL(event)"><br>
        <img id="output" height="150" /><br>

        <input type="submit" value="Enviar" name="enviar">
      </form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
