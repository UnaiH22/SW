<?php
// Constantes para el acceso a datos...
//phpinfo();
/*DEFINE("_HOST_", "localhost");
DEFINE("_PORT_", "8080");
DEFINE("_USERNAME_", "root");
DEFINE("_DATABASE_", "prueba");
DEFINE("_PASSWORD_", "");*/

DEFINE("_HOST_", "localhost");
DEFINE("_PORT_", "8080");
DEFINE("_USERNAME_", "G19");
DEFINE("_DATABASE_", "db_G19");
DEFINE("_PASSWORD_", "35VHZskBwNxae");

require_once 'database.php';
$method = $_SERVER['REQUEST_METHOD'];
$resource = $_SERVER['REQUEST_URI'];
$cnx = Database::Conectar();
switch ($method) 
{
    case 'GET': 
		if(isset($_GET['id']))
		{
            $datos = "";
            $id = $_GET['id'];
            $sql = "SELECT * FROM vips WHERE email='$id'";
            $data=Database::EjecutarConsulta($cnx, $sql);

            if (isset($data[0]))
            {
                echo "<br><br><b>ENHORABUENA ".$id." ES VIP</b><br><img src=../images/ok.gif height = 220px width = 400px>";
                break;
            }
            else 
            {
                echo "<br><br><b>LO SIENTO ".$id." NO ES VIP</b><br><img src=../images/wrong.gif height = 220px width = 400px>";
                break;
            }
		}
		else
		{
			$sql = "SELECT * FROM vips;";
			$data = Database::EjecutarConsulta($cnx, $sql);
				
			echo $data;
			break;
		}
		break;

    case 'POST':
        $arguments = $_POST;
        $result = 0;
        $email = $arguments['email'];	

        $sql = "INSERT INTO vips (email) VALUES ('$email');";
        $num = Database::EjecutarNoConsulta($cnx, $sql);

		if ($num==0)
            echo json_encode(array('Ya es VIP' => $email));

        else 
            echo json_encode(array('Creado VIP' => $email));

        break;

    case 'DELETE':
        $email = $_REQUEST['id'];
        $sql = "DELETE FROM vips WHERE email = '$email';";
        $result = Database::EjecutarNoConsulta($cnx, $sql);	

        if ($result == 0)
            echo "No existe el email: " . $email ;
                
        else 
            echo json_encode(array('Deleted row' => $email));
	break;
}
Database::Desconectar($cnx);