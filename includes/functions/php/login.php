<?php
include("/includes/functions/php/db_connection.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("/includes/functions/php/encrypt.php");

//session_start(); // Iniciando sesion
$error=''; // Variable para almacenar el mensaje de error

 // Define $username y $password
        $mail=$_POST['loginMail'];
        $password=$_POST['loginPass'];

    if (empty($mail) || empty($password)) {
        echo '<script>window.setTimeout(function () {window.history.back();alert("Error");},10000);</script>';
    } else {


        // Estableciendo la conexion a la base de datos
        conectar_db();

        $mail    = encrypt($mail);
        $password =  encryptPassword($password);

        $sql = "SELECT name FROM users WHERE email = '" . $mail . "' and password='".$password."';";
        $resultado = mysqli_query($conectar, $sql);

                    while($unrow = mysqli_fetch_array($resultado)){
                        $array_resultado[] = $unrow;
                    }

        if (count($array_resultado) > 0) {
            $_SESSION['login_user_sys']=$username; // Iniciando la sesion
            echo "<script> window.location='/en/users/profile.php?Sessio=true'; </script>";
        } else {
            echo "El correo electrónico o la contraseña es inválida.";
            echo '<script>window.setTimeout(function () {window.history.back();},10000);</script>';
        }
    }

?>