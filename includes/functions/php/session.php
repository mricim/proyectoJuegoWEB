
<?php
// Estableciendo la conexion a la base de datos
include("/includes/functions/php/db_connection.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("/includes/functions/php/encrypt.php");

session_start();// Iniciando Sesion
// Guardando la sesion

$user_check=$_SESSION['login_user_sys'];

conectar_db();
// SQL Query para completar la informacion del usuario
$sql = "SELECT email FROM users WHERE email = '" . $mail ."';";
$resultado = mysqli_query($conectar, $sql);

$login_session = $resultado;
if(!isset($login_session)){
mysqli_close($con); // Cerrando la conexion
header('Location: /en/index.html'); // Redirecciona a la pagina de inicio
}
?>