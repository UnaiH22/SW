<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=" async defer></script> <!-- google maps sin llave (se ve un poco oscuro) -->
  <script language=JavaScript src="../js/LocationInfo.js"></script>
  <style type="text/css">
      #map 
      {
        height: 300px;
        width: 400px;
        right: -1000px;
        top: -230px;
      }
    </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

    <h1 style="font-size:300%;font-family:courier;background-color:lightblue;">Datos de los Autores</h1><br>
      <h3>Unai del Rio  / Unai Heras</h3>
      <h4>Ingeniería del Software</h4>
      <img src='../images/avatar.png' alt="foto" height="70" width="70" />
      <img src='../images/kaladin.jpg' alt="foto2" height="100" width="70" /><br>

      <div id = "location">
      </div>

      <div id = "map">
      </script>
      </div>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
