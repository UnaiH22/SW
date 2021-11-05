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
    <h1 style="font-size:300%;font-family:courier;background-color:lightblue;">Buscar VIPs</h1><br>
    <form id="verVips" name="verVips" method="GET" enctype="multipart/form-data">

      <div class=form-group>
      <label for="emailVip">E-mail<span style="color: #800080">(*)</span>:</label>
      <input style="width: 400px" type="text" id="vips" name="vips"><br>
      </div>

      <input type="submit" value="Consultar" name="enviar" id="enviar">
    </form>
    <?php
    if (isset($_GET['vips']))
    {
        $curl = curl_init();
        $url = "http://localhost/SW/codigosnucleares/php/vipusers/" . $_GET['vips'];
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $str = curl_exec($curl);
        echo $str;
    }
    ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

