<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <form action="QuestionForm.php" method="post">
        <label for="email">E-mail<span style="color: #800080">(*)</span>:</label>
        <input type="text" id="email" name="email"><br><br>

      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
