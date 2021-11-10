<?php
    if (isset($_POST['vips']))
    {
        $curl = curl_init();
        //$url = "http://localhost/SW/codigosnucleares/php/vipusers/" . $_POST['vips'];
        $url = "https://sw.ikasten.io/~udelrio002/vips/vipusers/" . $_POST['vips'];
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $str = curl_exec($curl);
        echo $str;
    }
?>