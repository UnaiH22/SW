<?php
    if (isset($_POST['vips']))
    {
        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_URL, "http://localhost/SW/codigosnucleares/php/vipusers/");
        curl_setopt($ch, CURLOPT_URL, "https://sw.ikasten.io/~udelrio002/codigosnucleares/php/vipusers/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        $data = array('email' => $_POST['vips']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        echo $output;
        curl_close($ch);
    }
?>