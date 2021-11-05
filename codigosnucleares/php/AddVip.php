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
    <h1 style="font-size:300%;font-family:courier;background-color:lightblue;">Añadir VIP</h1><br>
    <form id="añadirVips" name="añadirVips" method="POST" enctype="multipart/form-data">

      <div class=form-group>
      <label for="emailVip">E-mail<span style="color: #800080">(*)</span>:</label>
      <input style="width: 400px" type="text" id="vip" name="vip"><br>
      </div>

      <input type="submit" value="Añadir VIP" name="enviar" id="enviar">
    </form>
    <?php
    if (isset($_POST['vip']))
    {
        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_URL, "http://localhost/SW/codigosnucleares/php/vipusers/");
        curl_setopt($ch, CURLOPT_URL, "https://sw.ikasten.io/~udelrio002/codigosnucleares/php/vipusers/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        $data = array('email' => $_POST['vip']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
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

