<?php
session_start();

$celular = $_GET["celular"];

$capacitacion = $_GET["capacitacion"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/assets/css/form.css">
    <style>
        .box {
            background: #1fd268;
            color: white;
            text-align: center;
            margin-left: -15px;
            margin-right: -15px;
            font-size: 13pt;
            padding-top: 20px;
        }

        .rtt {
            margin-top: 20px;
        }



        @media only screen and (max-width: 800px) {

            .cht {
                display: none;
            }

            .text-p {
                display: inline;
            }

            .box {
                padding: 0 52px;
                padding-top: 20px;
                font-size: 17px;
            }


            .box p {
                display: inline;
            }

            .rtt {

                padding: 0px 55px;

            }
        }
    </style>
</head>

<body style="background: #f1f1f1;">
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5" style="background: white;">
                    <!-- Banner -->
                    <div class="banner" style="background-color: white;text-align:left;padding:0;margin-bottom:12px;margin-top:100px;">
                        <!--<div class="slogan">#AprendeConLosPioneros</div>-->
                        <div style="text-align: center;">
                            <img src="https://certificaciones.dmc.pe/suscripcion/assets/img/logo-dmc.png" width="110" height="57" style="margin-top: 14px; margin-bottom: 10px;">
                        </div>
                    </div>
                    <!--  Condicional 1 ↓ -->
                    <div class="pasos" id="paso1">
                        <!-- Paso 1↓ -->
                        <div>

                            <div class="t" style="color: #2a7bb7; font-weight: bold; font-size: 19pt; margin-bottom: 35px;">
                                ¡REGISTRO EXITOSO!
                            </div>
                            <div class="tercer-texto" style="font-size: 13pt;">
                                <p class="text-p" style="margin: 0;">Gracias por registrarte, te llegará la información</p>
                                <p class="text-p"> deseada por correo.</p>
                                <p class="rtt">No olvides revisar la bandeja de "no deseados"</p>
                            </div>
                        </div>
                    </div>

                    <!-- Capacitaciones↓ -->
                    <?php if ($celular) { ?>
                        <div class="box">
                            <p style="margin: 0;">Si deseas una atención inmediata,</p>
                            <p>comunícate con una asesora comercial aquí:</p>
                            <div style="padding-top: 5px; text-align: center; padding-bottom: 20px; background: #1fd268">

                                <a href="https://api.whatsapp.com/send?phone=<?= $celular ?>&text=Hola,%20deseo%20información%20de%20<?= $capacitacion ?>" target="_blank"><img src="https://survey.dmc.pe/suscripcion/assets/img/whatsapp.png" width="62"></a>

                            </div>
                        </div>
                    <?php } ?>

                </div>
                <div class="col-md-5 cht" style="padding: 0;">
                    <img src="https://certificaciones.dmc.pe/suscripcion/assets/img/astradata.png" width="100%" height="660" alt="">
                </div>
            </div>
        </div>
    </div>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2LMTH0KY61"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-2LMTH0KY61');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1064200720291743');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" src="https://www.facebook.com/tr?id=1064200720291743&ev=PageView&noscript=1" />
    </noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Hotjar Tracking Code for https://certificaciones.dmc.pe -->
    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 2819597,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>
</body>

</html>