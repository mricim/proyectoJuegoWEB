
<?php
header('Content-Type: text/html; charset=iso-8859-1');

include($_SERVER['DOCUMENT_ROOT'] . '/includes/functions/php/encrypt.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/functions/php/db_connection.php');

$loginMail = encrypt($_POST['m']); //assert
if ($loginMail != "") {
    echo userExists($loginMail);
}

//Si existe el usuario -> return 0
//Si no existe el usuario -> return 1
function userExists($mail)
{
    $conectar = conectar_db();
    // echo '<br>Mail: '.$mail.'<br>';
    $consulta = "SELECT * FROM users WHERE email = '$mail'";
    $resultado = mysqli_query($conectar, $consulta);
    /*
    echo "<br><br><br><br>";
    var_dump($resultado);
    echo "<br><br><br><br>";
    */
    $array_resultado = array();
    try {
        while ($unrow = mysqli_fetch_array($resultado)) {
            $array_resultado[] = $unrow;
        }
    } catch (Exception $a) {
    }
    if (count($array_resultado) > 0) {
        // echo '<br>El usuario con email = '. $mail . 'ya existe.';
        mysqli_close($conectar);
        //echo '0';
        return 0;
    } else {
        mysqli_close($conectar);
        //echo '1';
        return 1;
    }
}


?>
