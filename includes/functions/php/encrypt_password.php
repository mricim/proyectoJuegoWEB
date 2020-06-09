
<?php

//Clave
$clave  = 'Cadena para encriptar la informacion de los usuarios';

//Metodo de encriptación
$method = 'AES-256-CBC';

$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");

 //Encripta
 function encrypt ($valor) {
     return openssl_encrypt ($valor, $method, $clave, false, $iv);
 };

 //Desencripta
 function decrypt ($valor) {
     $encrypted_data = base64_decode($valor);
     return openssl_decrypt($valor, $method, $clave, false, $iv);
 };

?>
