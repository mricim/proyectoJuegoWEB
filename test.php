<!DOCTYPE html>
<html>
<body>
<h1>My first PHP page</h1>
<?php
//PARA VER LOS ERRORES
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*
CREATE TABLE IF NOT EXISTS usuarios (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(30) NOT NULL,
numero INT(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)




INSERT INTO usuarios (nombre,numero,email,reg_date) VALUES ('nombre', 15, 'correoelectronico@gmail.com', "2017-07-23");
*/
	function conectar_db(){
		// conexion a Servidor
		$host = "localhost";#nombre del host
		$user = "user";#Usuario
		$pass = "user12345!Ab";#contraseña
		$db_name = "armegis";#Nombre de la base de datos
		$conexion = mysqli_connect($host, $user, $pass);#Envio a la base de datos (Todas las variables antes creadas)
		$conexion->query("SET NAMES 'utf8'");#Le decimos en que charset hay que conectarse
		if( !$conexion ){#Si la conecxion no se a logrado
			echo "No se puede conectar a la BD";
			exit;
		}
		else{
			//seleccion de base de datos(Aqui ya se a establecido la conecxion continua) y iniciamos a decirle a que base de datos se tiene que conectar
			$select_db = mysqli_select_db($conexion,$db_name);
			if( !$select_db ){#La base de datos no existre o hay algun probkema
				echo "Imposible seleccionar BD!!";
				exit;
			}
			else{#TODO CORRECTO
				return $conexion;
			}
		}
	}





		//$consultar_mensaje = "INSERT INTO usuarios (nombre,numero,email,reg_date) VALUES ( 'nombre', 15, '".addslashes('correoelectronico@gmail.com')."', '2017-07-23')";
		//guardar usuarios
		$links = conectar_db();
		$consultar_mensaje = "INSERT INTO usuarios (nombre,numero,email,reg_date) VALUES ( 'nombre', 15, 'correoelectronico@gmail.com', '2017-07-23')";
		$result_mensaje = mysqli_query($links, $consultar_mensaje);

		if (isset($result_mensaje) == FALSE) {
			echo"Error: "+$consultar_mensaje+"<br>ERROR TIPO 2".$links->error;
			echo "<br>No se a enviado el mensaje";
		} else {
			echo"Se a guardado en nuestra base de datos<br>";
			echo"<br><b>Todo correcto</b><br>";
			}

		mysqli_close($links);



					//ver usuarios
		$conectar= conectar_db();//CONECTAR PARA EL PRODUCTO
		$consultar= "SELECT * FROM usuarios ORDER BY id DESC";
		$resultado = mysqli_query($conectar, $consultar);
		while($unrow=mysqli_fetch_array($resultado)){
			$array_resultado[] = $unrow;
		}
		foreach($array_resultado as $usuario){
				echo "<br>".$usuario['id']." ".$usuario['nombre'];
		}
		mysqli_close($conectar);

?>
</body>
</html>