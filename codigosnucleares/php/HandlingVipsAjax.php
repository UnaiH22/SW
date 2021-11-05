<?php
session_start();
if (!isset($_SESSION['user']))
{
    header("Location: Layout.php");
    die();
}
$regEmailProf = preg_match("/^(([a-z]+|[a-z]+\.[a-z]+)@ehu\.(eus|es))$/", $_SESSION['user']);
if (!$regEmailProf)
{
    header("Location: Layout.php");
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <?php include '../html/Head.html'?>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 <script language=JavaScript src="../js/ProcessVips.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    <h1 style="font-size:300%;font-family:courier;background-color:lightblue;">VIPS</h1><br>
    <form id="verVips" name="verVips" method="POST" enctype="multipart/form-data">

      <div class=form-group>
      <label for="emailVip">E-mail<span style="color: #800080">(*)</span>:</label>
      <input style="width: 400px" type="text" id="vips" name="vips"><br>
      </div>

      <input type="button" value="Es VIP?" name="verSiEsVip" id="verSiEsVip">
      <input type="button" value="Añadir VIP" name="añadirVIP" id="añadirVIP">
      <input type="button" value="Ver VIPs" name="listaVIPs" id="listaVIPs">
      <input type="button" value="Borrar VIP" name="borraVIP" id="borraVIP">
    </form>
    <div id = procesarVip>

    </div>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>