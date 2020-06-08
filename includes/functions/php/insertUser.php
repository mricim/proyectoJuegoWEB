<!DOCTYPE html>
<html>
<body>
<?php
//PARA VER LOS ERRORES
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('db_connection.php');
include('encrypt_password.php');
include('user_exists.php');


		//$insert_user = "INSERT INTO usuarios (nombre,numero,email,reg_date) VALUES ( 'nombre', 15, '".addslashes('correoelectronico@gmail.com')."', '2017-07-23')";
		//guardar usuarios


		//Valores del formulario de registro
		if ($_POST) {
		    $userName = "";
        	$userPass = "";
        	$userMail = "";

        	if (isset($_POST['name'])) {
        	    $auxName = $_POST['name'];
        	    $userName = $encrypt($auxName);
        	}
        	if (isset($_POST['password'])) {
        	    $auxPass = $_POST['password'];
                $userPass = $encrypt($auxPass);
            }
            if (isset($_POST['email'])) {
                $auxMail = $_POST['email'];
                //$userMail = $encrypt($auxMail);
            }

		}


        //Si no existe el usuario se añade a la BD
        $links = conectar_db();
        $exists = userExists($auxMail);
        $userMail = $encrypt($auxMail);
        if ($exists == 1) {

            $insert_user = "INSERT INTO users (name,email,password,date_register,last_conexion)
            		VALUES ( '$userName', '$userMail', '$userPass',now(),now())";
            $result_mensaje = mysqli_query($links, $insert_user);

            if (isset($result_mensaje) == FALSE) {
            	echo"Error: "+$insert_user+"<br>ERROR TIPO 2".$links->error;
            	echo "<br>No se a enviado el mensaje";
            	echo "<script> window.location='../../../example/users/registerdone.html?AddedUser=error'; </script>";
            } else {
                echo "Result mensaje: ".$result_mensaje."<br>";
            	echo"<br>Se a guardado en nuestra base de datos<br>";
            	echo"<br><b>Todo correcto</b><br>";
            }
            echo "<script> window.location='../../../example/users/registerdone.html?AddedUser=true'; </script>";
        } else {
            echo "<script> window.location='../../../example/users/registerdone.html?AddedUser=false'; </script>";
        }




		mysqli_close($links);









?>
</body>
</html>