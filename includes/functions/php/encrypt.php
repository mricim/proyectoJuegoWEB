
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
        password_hash($pass, PASSWORD_DEFAULT, array("cost"=>15));
    }
?>
