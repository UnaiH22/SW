<?php
    session_start();
    if($_SESSION['cont']<count($_SESSION['preguntas'])){
        $pregunta = $_SESSION['preguntas'][$_SESSION['cont']];
        $p=$pregunta['Pregunta'];
        $r1=$pregunta['CorrectAns'];
        $r2=$pregunta['IncAns1'];
        $r3=$pregunta['IncAns1'];
        $r4=$pregunta['IncAns1'];
        $respuestas=array($r1,$r2,$r3,$r4);
        shuffle($respuestas);
        echo json_encode(array('pregunta' => $p,'r1' => $respuestas[0],'r2' =>$respuestas[1],'r3' =>$respuestas[2],'r4' =>$respuestas[3],'img' => $pregunta['Imagen']));
        $_SESSION['cont']++;
    }
?>