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
    <title>Gracias</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/assets/css/form.css">
</head>

<body style="background: #f1f1f1;">
    <div>
        <div class="container">
            <div class="row justify-content-center" style="text-align: center;">
                <div class="col-md-4" style="background: white;padding: 0;">
                    <!-- Banner -->
                    <div class="banner">
                        <!--<div class="slogan">#AprendeConLosPioneros</div>-->
                        <div>
                            <img src="https://dmc.pe/wp-content/uploads/2021/02/cropped-logotipo.png" width="120" alt="">
                        </div>
                    </div>
                    <!--  Condicional 1 ↓ -->
                    <div class="pasos" id="paso1" style="padding: 25px 25px;">
                        <!-- Paso 1↓ -->
                        <div>
                            <div class="primer-texto">
                                
                            </div>
                            <div class="segundo-texto" style="font-weight: bold;">
                                - Registro Exitoso -
                            </div>
                            <div class="tercer-texto">
                                <?php if($capacitacion=="Sorteo beca Especialización Credit Scoring"){ ?>
                                    Gracias por participar. Si resultas ganador nos comunicaremos contigo el 27 de Mayo.
                                <?php }else{?>    
                                    Gracias por registrarte atenderemos tu solicitud en las próximas horas.
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <!-- Capacitaciones↓ -->
                    <?php if ($celular) { ?>
                        <div style="background: #1fd268; padding: 17px 50px; color: white; display: inline-block; text-align: center;">
                            Si deseas una atención inmediata, comunícate con una asesora comercial aquí:
                            <div style="padding-top: 45px; text-align: center; padding-bottom: 45px; background: #1fd268">

                                <a href="https://api.whatsapp.com/send?phone=<?= $celular ?>&text=Hola,%20deseo%20más%20información%20de%20<?= $capacitacion ?>" target="_blank"><img src="https://certificaciones.dmc.pe/suscripcion/assets/img/whatsapp.png" width="50"></a>

                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Global site tag (gtag.js) - Google Analytics -->
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
    <!-- Hotjar Tracking Code for dmc.pe -->

    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 2593094,
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