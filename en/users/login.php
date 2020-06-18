<!DOCTYPE html>
<html>
<body>
<?php
header('Content-Type: text/html; charset=iso-8859-1');

include($_SERVER['DOCUMENT_ROOT'] . '/includes/functions/php/encrypt.php');
include_once($_SERVER['DOCUMENT_ROOT'] .'/includes/functions/php/db_connection.php');

    $loginMail = encrypt($_POST['loginMail']); //assert
    if ($loginMail != "") {
        echo userExists($loginMail);
    } else {
        echo "Error, user doesn't exist.";
    }

        //Si existe el usuario -> return 0
        //Si no existe el usuario -> return 1
		function userExists($mail) {
		    $conectar= conectar_db();
           // echo '<br>Mail: '.$mail.'<br>';
		    $consulta = "SELECT * FROM users WHERE email = '$mail'";
            $resultado = mysqli_query($conectar, $consulta);

            while($unrow = mysqli_fetch_array($resultado)){
            	$array_resultado[] = $unrow;
            }

            if (count($array_resultado) > 0) {
               // echo '<br>El usuario con email = '. $mail . 'ya existe.';
               mysqli_close($conectar);
                echo "<script> window.location='../../../en/users/userlogin.html?Login=true&User=".$loginMail."'; </script>";

            } else {
                mysqli_close($conectar);
                echo "<script> window.location='../../../en/users/userlogin.html?Login=false&User=".$loginMail."'; </script>";
            }
		}


?>
</body>
</html>