<?php
session_start();
if (!isset($_SESSION['user']))
{
    header("Location: Layout.php");
    die();
}
if (isset($_SESSION['rol']) && $_SESSION['rol'] != "Profesor")
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
  <style>
     .button
    {
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }
    .esvip
    {
      background-color: #008CBA;
    }
    .añadirvip
    {
      background-color: #4CAF50;
    }

    .vervip
    {
      background-color: #555555;
    }

    .borrarvip
    {
      background-color: #f44336;
    }
    .button:hover
    {
      background-color: lightslategray;
    }
  </style>
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
      <p>
        <input type="button" value="Ver VIPs" name="listaVIPs" id="listaVIPs" class = "vervip button">
        <input type="button" value="Es VIP?" name="verSiEsVip" id="verSiEsVip" class = "esvip button">
        <input type="button" value="Añadir VIP" name="añadirVIP" id="añadirVIP" class = "añadirvip button">
        <input type="button" value="Borrar VIP" name="borraVIP" id="borraVIP" class = "borrarvip button">
      </p>
    </form>
    <div id = procesarVip>

    </div>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>