
<?php

 //Encripta
 /*function encrypt ($valor) {
     return hash('md5', $valor);
 }*/


    function encrypt($dato) {
        $key='password';
        //return openssl_encrypt($dato,"aes-256-cbc",$key);
        $iv='aaaaaaaaaaaaaaaa';
        return openssl_encrypt($dato,"aes-256-cbc",$key,0,$iv);
        //return base64_encode(openssl_encrypt($dato, "aes-256-cbc", AesCipher::fixKey($key), OPENSSL_RAW_DATA, $iv));
    }

    function decrypt($dato) {
        $key='password';
        return openssl_decrypt($dato,"aes-256-cbc",$key);
        //$iv='aaaaaaaaaaaaaaaa';
        //return openssl_decrypt($dato,"aes-256-cbc",$key,OPENSSL_RAW_DATA,$iv);
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
