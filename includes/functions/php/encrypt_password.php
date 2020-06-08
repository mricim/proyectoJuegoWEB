<html>

<head>
</head>

<body>
<?php

//Clave
$clave  = 'Cadena para encriptar la informacion de los usuarios';

//Metodo de encriptación
$method = 'aes-256-cbc';

$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");

 //Encripta
 $encrypt = function ($valor) use ($method, $clave, $iv) {
     return openssl_encrypt ($valor, $method, $clave, false, $iv);
 };

 //Desencripta
 $decrypt = function ($valor) use ($method, $clave, $iv) {
     $encrypted_data = base64_decode($valor);
     return openssl_decrypt($valor, $method, $clave, false, $iv);
 };

?>
</body>
</html>