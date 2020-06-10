
<?php
		//Comprueba si existe el usuario

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
                echo '<div id="resultUser">0</div>';
                return 0;
            } else {
                mysqli_close($conectar);
                echo '<div id="resultUser">1</div>';
                return 1;
            }
            /*foreach($array_resultado as $usuario){
            	echo "<br>".$usuario['id']." ".$usuario['name'];
            }*/
		}


?>
