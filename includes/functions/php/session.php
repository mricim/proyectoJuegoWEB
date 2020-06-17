
<?php
// Estableciendo la conexion a la base de datos
include("config/db_connection.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos


session_start();// Iniciando Sesion
// Guardando la sesion
$user_check=$_SESSION['login_user_sys'];
// SQL Query para completar la informacion del usuario
$ses_sql=mysqli_query($con, "select email from login where email='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['email'];
if(!isset($login_session)){
mysqli_close($con); // Cerrando la conexion
header('Location: /en/index.html'); // Redirecciona a la pagina de inicio
}
?>