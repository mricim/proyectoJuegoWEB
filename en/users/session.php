<?php
if (strpos($_POST['send'], 'postlogin.html') == true) {
        $UserPass = $_POST["loginPass"];
        $UserLoginEmail = $_POST["loginMail"];

        //Inici sessió
        session_start();
        $errorSession = '';

        $UserLoginEmailEncrypt = encrypt($UserLoginEmail);
        $sql = "select name from users where email = ". $UserLoginEmailEncrypt . " and password = " . encryptPassword($UserPass,$UserLoginEmail,$userLogin) . ";";
        $query = mysqli_query($conectar,$sql);

        while ($unrow = mysqli_fetch_array($query)){
            $array_resultado[] = $unrow;
        }

        if (count($array_resultado) > 0) {
            $_SESSION['login_user_sys'] = $UserLoginEmail;
            header("/en/index.html?mailUser=".$UserLoginEmail);
        } else {
            $error = "Wrong email or password!";
        }
        echo 'Entra';
        echo '</form><script>window.onload = function(){document.forms[\'form\'].submit();}</script>';
?>