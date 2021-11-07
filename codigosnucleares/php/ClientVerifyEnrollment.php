<?php
  function verificarMatricula($email)
  {
    $soapclient = new SoapClient('http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl');
    $result = $soapclient->comprobar($email);
    return $result;
  }
?>