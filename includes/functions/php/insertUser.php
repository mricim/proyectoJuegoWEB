<!DOCTYPE html>
<html>
<body>
<h1>My first PHP page</h1>
<?php
//PARA VER LOS ERRORES
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function conectar_db(){
		// conexion a Servidor
		$host = "localhost";#nombre del host
		$user = "user";#Usuario
		$pass = "user12345!Ab";#contraseña
		$db_name = "armegis";#Nombre de la base de datos
		$conexion = mysqli_connect($host, $user, $pass);#Envio a la base de datos (Todas las variables antes creadas)
		$conexion->query("SET NAMES 'utf8'");#Le decimos en que charset hay que conectarse

		if( !$conexion ){ //Si la conexión no se ha logrado
			echo "No se puede conectar a la BD";
			exit;
		} else {
			//seleccion de base de datos(Aqui ya se a establecido la conecxion continua) y iniciamos a decirle a que base de datos se tiene que conectar
			$select_db = mysqli_select_db($conexion,$db_name);
			if( !$select_db ){#La base de datos no existe o hay algun problema
				echo "Imposible seleccionar BD!!";
				exit;
			}
			else{#TODO CORRECTO
			echo "Conectado a la BD";
				return $conexion;
			}
		}
	}





		//$consultar_mensaje = "INSERT INTO usuarios (nombre,numero,email,reg_date) VALUES ( 'nombre', 15, '".addslashes('correoelectronico@gmail.com')."', '2017-07-23')";
		//guardar usuarios
		$links = conectar_db();
		$consultar_mensaje = "INSERT INTO users (name,email,password,date_register,last_conexion) VALUES ( 'nombre', 'correoelectronico@gmail.com', 'kjdhdf',now(),now())";
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