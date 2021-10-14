<?php
if(isset($_SESSION['user']))
{
  $lafoto = $_SESSION['foto'];
  $user_email = $_SESSION['user'];
  $newUrl = 'QuestionFormWithImage.php?useremail='.$user_email;
}
else
  $newUrl = 'QuestionFormWithImage.php';

?>
<div id='page-wrap'>
<header class='main' id='h1'>
  <span class="right"><a href="SignUp.php"><?php if(!isset($user_email))echo "Registro";?></a></span>
        <span class="right"><a href="LogIn.php"><?php if(!isset($user_email))echo "Login";?></a></span>
        <span class="right"> <?php if(isset($user_email))echo $user_email;?></span>
        <span class="right"><?php if(isset($lafoto)) echo "<img src='../images/$lafoto' height='50px' width='50px'>"; ?> </span>
        <span class="right" ><a href="LogOut.php"><?php if(isset($user_email)) echo "Logout"; else echo ""; ?></a></span>
</header>
<nav class='main' id='n1' role='navigation'>
  <span><a href='Layout.php'>Inicio</a></span>
  <span><?php if(!isset($_SESSION['user'])) echo "<a href=$newUrl> <font color='red'>Insertar Pregunta</font></a>"; else echo "<a href=$newUrl> Insertar Pregunta</a>";?></span>
  <span><?php if(!isset($_SESSION['user'])) echo "<a href=ShowQuestionsWithImage.php> <font color='red'>Ver Preguntas</font></a>"; else echo "<a href=ShowQuestionsWithImage.php> Ver Preguntas</a>";?></span>
  <span><?php if(!isset($_SESSION['user'])) echo "<a href=ShowXmlQuestions.php> <font color='red'>Ver Preguntas XML</font></a>"; else echo "<a href=ShowXmlQuestions.php> Ver Preguntas XML</a>";?></span>
  <span><?php if(!isset($_SESSION['user'])) echo "<a href=ShowJsonQuestions.php> <font color='red'>Ver Preguntas JSON</font></a>"; else echo "<a href=ShowJsonQuestions.php> Ver Preguntas JSON</a>";?></span>
  <span><a href='Credits.php'>Creditos</a></span>
  <span></span>
  <span><a href='SearchUser.php'>Buscar Usuario</a></span>
</nav>

