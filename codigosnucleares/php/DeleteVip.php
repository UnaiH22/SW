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
    <h1 style="font-size:300%;font-family:courier;background-color:lightblue;">Borrar VIP</h1><br>
    <form id="borrarVips" name="borrarVips" method="GET" enctype="multipart/form-data">

      <div class=form-group>
      <label for="emailVip">E-mail<span style="color: #800080">(*)</span>:</label>
      <input style="width: 400px" type="text" id="borravip" name="borravip"><br>
      </div>

      <input type="submit" value="Borrar" name="submit" id="submit">
    </form>
    <?php
    if (isset($_GET['submit']))
    {
        $ch = curl_init();
        //$url = "http://localhost/SW/codigosnucleares/php/vipusers/" . $_GET['borravip'];
        $url = "https://sw.ikasten.io/~udelrio002/codigosnucleares/php/vipusers/" . $_GET['borravip'];
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        $output = curl_exec($ch);
        echo $output;
        curl_close($ch);
    }
    ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

