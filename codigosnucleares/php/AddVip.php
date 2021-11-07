<?php
    if (isset($_POST['vips']))
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/SW/codigosnucleares/php/vipusers/");
        //curl_setopt($ch, CURLOPT_URL, "https://sw.ikasten.io/~udelrio002/codigosnucleares/php/vipusers/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        $data = array('email' => $_POST['vips']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);

        if ($output == "Ya es VIP.")
            echo "<font color='red'>El usuario introducido ya es VIP.</font>";
        else
        {
            $obj = json_decode($output, true);
            echo '¡El usuario ' . '<strong>' . $obj["Creado VIP"] . '</strong> ha sido añadido como VIP!<br/> <img src = ../images/añadido.gif height = 220px width = 400px>';
        }
        curl_close($ch);
    }
?>