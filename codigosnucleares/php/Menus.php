<?php
if(isset($_SESSION['foto']))
{
  $lafoto = $_SESSION['foto'];
}
?>
<div id='page-wrap'>
<header class='main' id='h1'>
  <span class="right"><a href="SignUp.php"><?php if(!isset($_SESSION['user']))echo "Registro";?></a></span>
        <span class="right"><a href="LogIn.php"><?php if(!isset($_SESSION['user']))echo "Login";?></a></span>
        <span class="right"> <?php if(isset($_SESSION['user']))echo $_SESSION['user'];?></span>
        <span class="right"><?php if(isset($_SESSION['foto'])) echo "<img src='../images/$lafoto' height='50px' width='50px'>"; ?> </span>
        <span class="right" ><a href="LogOut.php"><?php if(isset($_SESSION['user'])) echo "Logout"; else echo ""; ?></a></span>
</header>
<nav class='main' id='n1' role='navigation'>
  <span><a href='Layout.php'>Inicio</a></span>
  <span><a href='QuestionFormWithImage.php'> Insertar Pregunta</a></span>
  <span><a href='ShowQuestionsWithImage.php'> Ver Preguntas</a></span>
  <span><a href='Credits.php'>Creditos</a></span>
</nav>

