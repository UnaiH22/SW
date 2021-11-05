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
    <h1 style="font-size:300%;font-family:courier;background-color:lightblue;">Ver VIPs</h1><br>
    <form id="verVips" name="verVips" method="POST" enctype="multipart/form-data">

      <div class=form-group>
      </div>

      <input type="submit" value="Ver VIPs" name="submit" id="submit">
    </form>
    <?php
    if (isset($_POST['submit']))
    {
        $curl = curl_init();
        //$url = "http://localhost/SW/codigosnucleares/php/vipusers/";
        $url = "http://sw.ikasten.io/~udelrio002/codigosnucleares/php/vipusers/";
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

