<?php
session_start();
// Configuración de la base de datos
$db_config = [
    'host' => 'interchange.proxy.rlwy.net',
    'user' => 'root',
    'pass' => 'dMJZkVbxUrBQfkPptaWxGHDyzUArRbzC',
    'db' => 'railway',
    'port' => 20432
];

// Conexión a Railway
$conexion = mysqli_connect(
    $db_config['host'],
    $db_config['user'],
    $db_config['pass'],
    $db_config['db'],
    $db_config['port']
);

// Verificar conexión
if (!$conexion) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode([
        'error' => 'Error al conectar a la base de datos',
        'mensaje' => mysqli_connect_error()
    ]);
    exit;
}

// Establecer charset para evitar problemas con caracteres especiales
mysqli_set_charset($conexion, "utf8mb4");

// Consulta del estado del servidor
$query = "SELECT estado FROM estado_servidor WHERE id = 1";
$resultado = mysqli_query($conexion, $query);

if (!$resultado) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode([
        'error' => 'Error en la consulta',
        'mensaje' => mysqli_error($conexion)
    ]);
    mysqli_close($conexion);
    exit;
}

// Consulta de servicios
$query2 = "SELECT nombre_servicio, estado_servicio FROM estado_servicios";
$resultado2 = mysqli_query($conexion, $query2);

// Guardar servicios en sesión
if ($resultado2) {
    while ($row = mysqli_fetch_assoc($resultado2)) {
        $_SESSION[$row['nombre_servicio']] = $row['estado_servicio'];
    }
}

// Obtener el valor del campo estado
$fila = mysqli_fetch_assoc($resultado);
$valorCampo = $fila['estado'] ?? null;

// Preparar respuesta según estado
$response = ['campo_cambiado' => '0']; // Valor por defecto

switch ($valorCampo) {
    case '1':
        $_SESSION['estado'] = 1;
        $response = ['campo_cambiado' => '1'];
        break;
    case '2':
        $_SESSION['estado'] = 2;
        $response = ['campo_cambiado' => '2'];
        break;
    case '3':
        $_SESSION['estado'] = 3;
        $response = ['campo_cambiado' => '3'];
        break;
    default:
        $_SESSION['estado'] = 0;
        $response = ['campo_cambiado' => '0'];
        break;
}

// Cerrar conexión
mysqli_close($conexion);

// Enviar respuesta JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
