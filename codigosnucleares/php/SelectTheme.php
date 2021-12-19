<?php include 'DbConfig.php';
    session_start();
    try {
        $dsn = "mysql:host=$server;dbname=$basededatos";
        $dbh = new PDO($dsn, $user, $pass);
        } catch (PDOException $e){
        echo $e->getMessage();
        }
        $stmt = $dbh->prepare("SELECT DISTINCT Tema FROM Preguntas");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $temas='';
        while($row = $stmt->fetch()){
            $temas.='<a href=Play.php?tema='.$row['Tema'].'>'.$row['Tema'].'</a><br>';
        }
        $dbh = null;
    
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <?php include '../html/Head.html'?>
  <style>
input {
  font-size: 16px;
  font-size: max(16px, 1em);
  font-family: inherit;
  padding: 0.25em 0.5em;
  background-color: #fff;
  border: 1px solid;
  border-radius: 4px;
}
  </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    <h1 style="font-size:300%;font-family:courier;background-color:lightblue;">Temas</h1><br>

    <div><?php
        if(isset($temas)){
            echo $temas;
        }
    ?></div>
      
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>