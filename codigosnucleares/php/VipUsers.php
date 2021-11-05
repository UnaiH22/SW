<?php
// Constantes para el acceso a datos...
//phpinfo();
DEFINE("_HOST_", "localhost");
DEFINE("_PORT_", "8080");
DEFINE("_USERNAME_", "root");
DEFINE("_DATABASE_", "prueba");
DEFINE("_PASSWORD_", "");
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

    case 'PUT':
        parse_str(file_get_contents('php://input'), $arguments);
        $result = 0;
        $pattern = "/vipusers\/(\d+)/";
        preg_match($pattern, $resource, $matches);

        if (count($matches) > 0) 
        {
            $id = intval($matches[1]);
            $sql = "UPDATE users SET ";
            $explodedArgs = array();
            foreach ($arguments as $k => $v) 
            {
                $k = Database::Limpiar($cnx, $k);
                $v = Database::Limpiar($cnx, $v);
                $explodedArgs[] = "$k = '$v'";
            }

            $sql .= implode(', ', $explodedArgs);
            $sql .= " WHERE id = $id;";
            $result = Database::EjecutarNoConsulta($cnx, $sql);

        } 
        else
            $result = 0;

        echo json_encode(array('affectedRows' => $result));
        break;

    case 'DELETE':
        $arguments = array();
        $pattern = "/vipusers\/(.+)/";
        preg_match($pattern, $resource, $matches);
        if (count($matches) > 0) 
		{
            $email = $matches[1];
			//echo $email;
            $sql = "DELETE FROM vips WHERE email = '$email';";
            $result = Database::EjecutarNoConsulta($cnx, $sql);	

            if ($result == 0)
                echo "No existe el email:" . $email ;
                
            else 
                echo json_encode(array('Deleted row' => $email));
		}
	break;
}
Database::Desconectar($cnx);

// } catch (Exception $ex) {
     // header('HTTP/1.0 400 Bad Request');
// }
//echo json_encode($response, true); // $response será un array con los datos de nuestra respuesta.
// echo '<p>';
// echo json_encode(array('method' => $method, 'arguments' => $arguments, 'uri' => $resource), true);
// $response será un array con los datos de nuestra respuesta.
