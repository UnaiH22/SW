<?php
$ch = curl_init();
//$url = "http://localhost/SW/codigosnucleares/php/vipusers/" . $_POST['vips'];
$url = "https://sw.ikasten.io/~udelrio002/codigosnucleares/php/vipusers/" . $_POST['vips'];
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
$output = curl_exec($ch);
echo $output;
curl_close($ch);
?>