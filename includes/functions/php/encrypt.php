
<?php

 //Encripta
 /*function encrypt ($valor) {
     return hash('md5', $valor);
 }*/

    $password='password';
    function encrypt($dato) {
        return openssl_encrypt($dato,"AES-128-ECB",$password);
    }

    function decrypt($dato) {
        return openssl_decrypt($dato,"AES-128-ECB",$password);
    }

    function encryptPassword($pass) {
        return hash('md5', $pass);
    }
?>
