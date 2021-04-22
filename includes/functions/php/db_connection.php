<?php

function conectar_db(){
	// conexion a Servidor
	//$host = "localhost"; #nombre del host
	$host = "mysql"; #nombre del host
	$user = "user"; #Usuario
	$pass = "user12345!Ab"; #contraseña
	$db_name = "armegis"; #Nombre de la base de datos
	//$conexion = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
	$conexion = new mysqli($host, $user, $pass, $db_name); #Envio a la base de datos (Todas las variables antes creadas)
	//$conexion = mysqli_connect($host, $user, $pass); #Envio a la base de datos (Todas las variables antes creadas)
	
	//$conexion->query("SET NAMES 'utf8'"); #Le decimos en que charset hay que conectarse
	mysqli_set_charset($conexion,"UTF8");

	if (!$conexion) { //Si la conexión no se ha logrado
		echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		exit;
	} else {
		//seleccion de base de datos(Aqui ya se a establecido la conecxion continua) y iniciamos a decirle a que base de datos se tiene que conectar
//$conexion->select_db($conexion, $db_name);
		/*
		$select_db = mysqli_select_db($conexion, $db_name);
		if (!$select_db) { #La base de datos no existe o hay algun problema
			echo "Imposible seleccionar BD!!";
			exit;
		} else { #TODO CORRECTO
			echo "Conectado a la BD";
			exit;
			return $conexion;
		}
		*/
		if ($conexion->connect_error) { #La base de datos no existe o hay algun problema
			echo "<br>Imposible seleccionar BD!!<br>";
			exit;
		} else { #TODO CORRECTO
			echo "<br>Conectado a la BD<br>";
			return $conexion;
		}
	}
}