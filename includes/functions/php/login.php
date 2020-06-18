<?php
include("/includes/functions/php/db_connection.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("/includes/functions/php/encrypt.php");

session_start(); // Iniciando sesion
$error=''; // Variable para almacenar el mensaje de error
if (isset($_POST['submit'])) {
if (empty($_POST['loginMail']) || empty($_POST['loginPass'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username y $password
$mail=$_POST['loginMail'];
$password=$_POST['loginPass'];

// Estableciendo la conexion a la base de datos
conectar_db();

$mail    = encrypt($mail);
$password =  encryptPassword($password);

$sql = "SELECT email, password FROM users WHERE email = '" . $mail . "' and password='".$password."';";
$resultado = mysqli_query($conectar, $sql);

            while($unrow = mysqli_fetch_array($resultado)){
            	$array_resultado[] = $unrow;
            }

            if (count($array_resultado) > 0) {
		$_SESSION['login_user_sys']=$username; // Iniciando la sesion
		header("location: /en/users/profile.php"); // Redireccionando a la pagina profile.php


} else {
$error = "El correo electrónico o la contraseña es inválida.";
}
}
}
?>