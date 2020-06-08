<!DOCTYPE html>
<html>
<body>
<?php
//PARA VER LOS ERRORES
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('db_connection.php');
include('encrypt_password.php');


		//$consultar_mensaje = "INSERT INTO usuarios (nombre,numero,email,reg_date) VALUES ( 'nombre', 15, '".addslashes('correoelectronico@gmail.com')."', '2017-07-23')";
		//guardar usuarios
		$links = conectar_db();

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
                $userMail = $encrypt($auxMail);
            }

		}


		$consultar_mensaje = "INSERT INTO users (name,email,password,date_register,last_conexion)
		VALUES ( '$userName', '$userMail', '$userPass',now(),now())";
		$result_mensaje = mysqli_query($links, $consultar_mensaje);

		if (isset($result_mensaje) == FALSE) {
			echo"Error: "+$consultar_mensaje+"<br>ERROR TIPO 2".$links->error;
			echo "<br>No se a enviado el mensaje";
		} else {
		    echo "Result mensaje: ".$result_mensaje."AAA<br>";
			echo"<br>Se a guardado en nuestra base de datos<br>";
			echo"<br><b>Todo correcto</b><br>";
			}

		mysqli_close($links);



					//ver usuarios
		$conectar= conectar_db();//CONECTAR PARA EL PRODUCTO
		$consultar= "SELECT * FROM users ORDER BY id DESC";
		$resultado = mysqli_query($conectar, $consultar);

		$añadido = false;
		while($unrow=mysqli_fetch_array($resultado)){
			$array_resultado[] = $unrow;
		}
		foreach($array_resultado as $usuario){
				echo "<br>".$usuario['id']." ".$usuario['name'];
				$añadido = true;
		}
		mysqli_close($conectar);


         echo "<script> window.location='../../../example/users/registerdone.html'; </script>";


?>
</body>
</html>