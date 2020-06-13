
<?php

 //Encripta
 /*function encrypt ($valor) {
     return hash('md5', $valor);
 }*/

function encrypt($data) {
$key='0123456789abcdef';
$iv='aaaaaaaaaaaaaaaa';
        if (strlen($key) < PHP_AES_Cipher::$CIPHER_KEY_LEN) {
            $key = str_pad("$key", PHP_AES_Cipher::$CIPHER_KEY_LEN, "0"); //0 pad to len 16
        } else if (strlen($key) > PHP_AES_Cipher::$CIPHER_KEY_LEN) {
            $key = substr($str, 0, PHP_AES_Cipher::$CIPHER_KEY_LEN); //truncate to 16 bytes
        }

        $encodedEncryptedData = base64_encode(openssl_encrypt($data, PHP_AES_Cipher::$OPENSSL_CIPHER_NAME, $key, OPENSSL_RAW_DATA, $iv));
        $encodedIV = base64_encode($iv);
        $encryptedPayload = $encodedEncryptedData.":".$encodedIV;

        return $encryptedPayload;

    }
/*
    function encrypt($dato) {
        $key='0123456789abcdef';
        //return openssl_encrypt($dato,"aes-256-cbc",$key);
        $iv='aaaaaaaaaaaaaaaa';
        //return base64_encode(openssl_encrypt($dato, "aes-256-cbc", AesCipher::fixKey($key), OPENSSL_RAW_DATA, $iv));
        //return openssl_encrypt($dato,"aes-128-cbc",$key,0,$iv);
        return openssl_encrypt($dato,"aes-128-cbc",$key,0,$iv);
    }
*/
    function decrypt($dato) {
        $key='0123456789abcdef';
        //return openssl_decrypt($dato,"aes-256-cbc",$key);
        $iv='aaaaaaaaaaaaaaaa';
        return openssl_decrypt($dato,"aes-128-cbc",$key,0,$iv);
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
