
<?php

 //Encripta
 /*function encrypt ($valor) {
     return hash('md5', $valor);
 }*/


    function encrypt($dato) {
        $password='password';
        return openssl_encrypt($dato,"AES-256-cbc",$password,OPENSSL_RAW_DATA,"iv");
    }

    function decrypt($dato) {
        $password='password';
        return openssl_decrypt($dato,"AES-256-cbc",$password,OPENSSL_RAW_DATA,,"iv");
    }

    function encryptPassword($pass,$mail,$user) {
        $numChar = strlen($mail);

        $pass = $mail . $pass . $user;
        $aux = hash('sha256',$pass);
        //$pass = $aux . $user;
        //$aux = hash('sha256',$pass);
        $pass = $aux . $numChar;

        return $pass;
    }
?>
