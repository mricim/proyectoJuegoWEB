
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include($_SERVER['DOCUMENT_ROOT'] . '/includes/functions/php/encrypt.php');


    $loginMail = encrypt($_POST['m']);
    if ($loginMail != "") {
        echo userExists($loginMail);
    } else {
        echo "Prueba"
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
                echo '0';
                return 0;
            } else {
                mysqli_close($conectar);
                echo '1';
                return 1;
            }
            /*foreach($array_resultado as $usuario){
            	echo "<br>".$usuario['id']." ".$usuario['name'];
            }*/
		}


?>
