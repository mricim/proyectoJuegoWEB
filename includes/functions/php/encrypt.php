
<?php

 //Encripta
 /*function encrypt ($valor) {
     return hash('md5', $valor);
 }*/


    function encrypt($dato) {
        $key='password';
        $iv='00000000';
        return openssl_encrypt($dato,"aes-256-cbc",$key,OPENSSL_RAW_DATA,$iv);
    }

    function decrypt($dato) {
        $key='password';
        $iv='00000000';
        return openssl_decrypt($dato,"aes-256-cbc",$key,OPENSSL_RAW_DATA,$iv);
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
