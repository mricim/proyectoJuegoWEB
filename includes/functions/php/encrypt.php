
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

    function encryptPassword($pass,$mail,$user) {
        $numChar = strlen($mail);

        $pass = $mail . $pass;
        $aux = hash('sha256',$pass);
        $pass = $aux . $user;
        $aux = hash('sha256',$pass);
        $pass = $aux . $numChar;

        return $pass;
    }
?>
