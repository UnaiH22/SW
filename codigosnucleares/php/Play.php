<?php include 'DbConfig.php';
    session_start();
    try {
        $dsn = "mysql:host=$server;dbname=$basededatos";
        $dbh = new PDO($dsn, $user, $pass);
        } catch (PDOException $e){
        echo $e->getMessage();
        }
        $stmt = $dbh->prepare("SELECT Pregunta, CorrectAns, IncAns1, IncAns2, IncAns3, Imagen FROM Preguntas WHERE Tema = ?");
        $stmt->bindParam(1,$_GET['tema']);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $preguntas=$stmt->fetchAll();
        shuffle($preguntas);
        $_SESSION['preguntas']=$preguntas;
        $_SESSION['cont']=0;
        

        $dbh = null;
    
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script language="JavaScript" src="../js/NextQuestion.js"></script>
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
        <h1 style="font-size:300%;font-family:courier;background-color:lightblue;">Jugar</h1><br>
        <h3 id=pregunta></h3><br>
        <img id='image' src=><br>
        <input type='radio' name='ans' id='ans1' value=/>a<br>
        <input type='radio' name='ans' id='ans2' value=/>b<br>
        <input type='radio' name='ans' id='ans3' value=/>c<br>
        <input type='radio' name='ans' id='ans4' value=/>d<br>

        <input type="button" value="Siguiente pregunta" name="next" id="next">
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>