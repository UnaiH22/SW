<?php
session_start();

if (file_exists('../xml/UserCounter.xml'))
    $xml = simplexml_load_file('../xml/UserCounter.xml');
else
    die('Error abriendo el xml.');
            
if ($xml === FALSE)
    die('Error al procesar el xml.');

// por si el usuario cierra sin darle a logout, no se añade extra...
$found = false;
foreach($xml->xpath('user') as $us)
{
    if ($_SESSION['user'] == $us)
        $found = true;
    if ($us == "")
        unset($us[0][0]);
}
if (isset($_REQUEST['addUser']))
{
    if (!$found)
    {
        $xml->addChild('user', $_SESSION['user']);

        $xmlDocument = new DOMDocument('1.0');
        $xmlDocument->preserveWhiteSpace = false;
        $xmlDocument->formatOutput = true;
        $xmlDocument->loadXML($xml->asXML());
        $xmlDocument->saveXML();

        if(!$xmlDocument->save('../xml/UserCounter.xml'))
            die('Error al intentar guardar los datos en el xml.');
    }
}
header("Location: Layout.php");
?>