<?php

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

?>
