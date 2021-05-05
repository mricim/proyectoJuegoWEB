<!DOCTYPE html>
<html>

<body>
    <?php
    //PARA VER LOS ERRORES
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include($_SERVER['DOCUMENT_ROOT'] . '/includes/functions/php/user_exists.php');

    $links = conectar_db();

    //$insert_user = "INSERT INTO usuarios (nombre,numero,email,reg_date) VALUES ( 'nombre', 15, '".addslashes('correoelectronico@gmail.com')."', '2017-07-23')";
    //guardar usuarios


    //Valores del formulario de registro

    if ($_POST) {
        if (isset($_POST['name'])) {
            $userName = encrypt($_POST['name']);
            echo '<br>userName= ' . $userName;
        }
        if (isset($_POST['password'])) {
            $userPass = encryptPassword($_POST['password'], $_POST['email'], $_POST['name']);
            echo '<br>userPass= ' . $userPass;
        }
        if (isset($_POST['email'])) {
            $userMail = encrypt($_POST['email']);
            echo '<br>userMail= ' . $userMail;
        }
    }

    //Si no existe el usuario se añade a la BD
    $exists = userExists($userMail);
    if ($exists == 1) {
        /*
        $links = conectar_db();
        $insert_user ="CREATE TABLE IF NOT EXISTS users "
                    + "(id INTEGER not NULL, "
                    + " name VARCHAR(255), "
                    + " email VARCHAR(255), "
                    + " password VARCHAR(255), "
                    + " date_register TIMESTAMP, "
                    + " last_conexion TIMESTAMP, "
                    + " PRIMARY KEY ( id ))";
        $result_mensaje = mysqli_query($links, $insert_user);
        */
        $links = conectar_db();
        mysqli_select_db($links, 'armegis');
        $insert_user = "INSERT INTO users (name,email,password,date_register,last_conexion) VALUES ( '$userName', '$userMail', '$userPass',now(),now())";
        $result_mensaje = mysqli_query($links, $insert_user);
        //var_dump($result_mensaje);
        if (!$result_mensaje) {
            echo "Error: " + $insert_user + "<br>ERROR TIPO 2" . $links->error;
            echo "<br>No se a enviado el mensaje";
            //echo "<script> window.location='../../../en/users/registerdone.html?AddedUser=error'; </script>";
        } else {
            echo "<br>Result mensaje: " . $result_mensaje . "<br>";
            echo "<br>Se a guardado en nuestra base de datos<br>";
            /*
            $links2 = conectar_db();
            var_dump($links2);
            $insert_user2 = "SELECT * FROM users";
            $result_mensaje2 = mysqli_query($links, $insert_user2);
            echo "<br>XXXXXXXXX<br>";
            var_dump($result_mensaje2);
            echo "<br>XXXXXXXXX<br>";
            while($row = mysqli_fetch_array($result_mensaje2, MYSQLI_ASSOC)) {
            var_dump($row);
            }
            echo "<br>XXXXXXXXX<br>";
            */
            echo "<br><b>Todo correcto</b><br>";
            //exit();
            echo "<script> window.location='../../../en/users/registerdone.html?AddedUser=true'; </script>";
        }
    } else {
        echo "<script> window.location='../../../en/users/registerdone.html?AddedUser=false'; </script>";
    }




    mysqli_close($links);









    ?>
</body>

</html>