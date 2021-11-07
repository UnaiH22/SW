<?php
$curl = curl_init();
//$url = "http://localhost/SW/codigosnucleares/php/vipusers/";
$url = "https://sw.ikasten.io/~udelrio002/codigosnucleares/php/vipusers/";
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$str = curl_exec($curl);
echo $str;
?>