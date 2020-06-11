
<?php
header('Content-Type: text/html; charset=iso-8859-1');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include($_SERVER['DOCUMENT_ROOT'] . '/includes/functions/php/encrypt.php');

function conectar_db(){
		// conexion a Servidor
		$host = "localhost";#nombre del host
		$user = "user";#Usuario
		$pass = "user12345!Ab";#contraseña
		$db_name = "armegis";#Nombre de la base de datos
		$conexion = mysqli_connect($host, $user, $pass);#Envio a la base de datos (Todas las variables antes creadas)
		$conexion->query("SET NAMES 'utf8'");#Le decimos en que charset hay que conectarse

		if( !$conexion ){ //Si la conexión no se ha logrado
			exit;
		} else {
			//seleccion de base de datos(Aqui ya se a establecido la conecxion continua) y iniciamos a decirle a que base de datos se tiene que conectar
			$select_db = mysqli_select_db($conexion,$db_name);
			if( !$select_db ){#La base de datos no existe o hay algun problema
				exit;
			}
			else{#TODO CORRECTO
				return $conexion;
			}
		}
	}


    $loginMail = encrypt($_POST['m']);
    if ($loginMail != "") {
        echo userExists($loginMail);
    } else {
        echo "Prueba";
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
