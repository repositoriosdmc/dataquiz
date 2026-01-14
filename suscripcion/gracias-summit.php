
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
</head>
<body style="background: #f1f1f1;">
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4" style="background: white;">
                    <!-- Banner -->
                    <div class="banner" style="background-color: #0678c1;">
                        <!--<div class="slogan">#AprendeConLosPioneros</div>-->
                        <div>
                            <img src="https://certificaciones.dmc.pe/suscripcion/assets/img/summit-white-all.png" width="120" alt="">
                        </div>

                        <div style="margin: 46px 0;">

                            <h2 style="font-size: 16px;">¡REGISTRO EXITOSO!</h2>

                            <h3 style="font-size: 14px; margin: 16px 65px;">Gracias por registrarse, atenderemos tu solicitud en la próximas horas.</h3>

                        </div>

                        


                    
                    <!-- Capacitaciones↓ -->
                    
                    <div style="background: #99acb759; margin: 0px 50px; color: white; display: inline-block; text-align: center; padding: 25px; font-size: 12.5px;">
                        Si deseas una atención inmediata, comunícate con un asesor comercial aquí: 
                        <div style="padding-top: 29px; text-align: center; padding-bottom: 0;">
                        
                            <a href="https://api.whatsapp.com/send?phone=<?=$celular?>&text=Hola,%20deseo%20inscribirme%20en%20el%20curso%20especializado%20de%20<?=$capacitacion?>" target="_blank"><img src="https://survey.dmc.pe/suscripcion/assets/img/whatsapp.png" width="50"></a>
                        
                        </div>
                    </div>
                    <?php if($celular){ ?>
                    <?php } ?>

                    </div> 
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
         fbq('init', '1064200720291743'); 
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" src="https://www.facebook.com/tr?id=1064200720291743&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Hotjar Tracking Code for dmc.pe -->
    <script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1904810,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
</body>
</html>