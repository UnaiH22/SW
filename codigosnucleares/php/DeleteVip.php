<?php
$ch = curl_init();
$url = "http://localhost/SW/codigosnucleares/php/vipusers/" . $_POST['vips'];
//$url = "https://sw.ikasten.io/~udelrio002/codigosnucleares/php/vipusers/" . $_POST['vips'];
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
$output = curl_exec($ch);

if ($output == ("No existe el email: " . $_POST['vips']))
    echo "<font color='red'>El usuario introducido no está en la lista VIP.</font>";
else
{
    $obj = json_decode($output, true);
    echo '¡El usuario ' . '<strong>' . $obj["Deleted row"] . '</strong> ha sido eliminado de la lista VIP!<br/> <img src = ../images/eliminado.gif height = 220px width = 400px>';
}
curl_close($ch);
?>