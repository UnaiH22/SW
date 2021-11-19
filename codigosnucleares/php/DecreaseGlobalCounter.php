<?php
session_start();

function decrease()
{
    $usEmail = $_SESSION['user'];

    if (file_exists('../xml/UserCounter.xml'))
        $xml = simplexml_load_file('../xml/UserCounter.xml');
    else
        die('Error abriendo el xml.');
            
    if ($xml === FALSE)
        die('Error al procesar el xml.');

    foreach($xml->xpath('user') as $us)
    {
        if ($usEmail == $us)
            unset($us[0][0]);
    }

    $xmlDocument = new DOMDocument('1.0');
    $xmlDocument->preserveWhiteSpace = false;
    $xmlDocument->formatOutput = true;
    $xmlDocument->loadXML($xml->asXML());
    $xmlDocument->saveXML();

    if(!$xmlDocument->save('../xml/UserCounter.xml'))
        die('Error al intentar guardar los datos en el xml.');
}
?>