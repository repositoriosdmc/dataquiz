<?
session_start();

if(!$_SESSION["mensaje"]){
    //header("location:..");
}


?>
<html>
	<head>    <title>DMC Datos Ingresados</title>		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">		<link rel="stylesheet" type="text/css" href="https://survey.dataminingperu.com/inscripcion/assets/css/bootstrap.min.css">		<link rel="stylesheet" type="text/css" href="http://survey.bigdatasummit.pe/enc/css/font.css">
        <style>
        .graf--h2 {
            font-family: "jaf-bernino-sans","Lucida Grande","Lucida Sans Unicode","Lucida Sans",Geneva,Verdana,sans-serif;
            letter-spacing: -0.02em;
            font-weight: 700;
            font-style: normal;
            font-size: 3em;
            margin-left: -3px;
            line-height: 1;
            letter-spacing: -0.04em;
            margin-top: 40px;
            padding-top: 12px;
            margin-bottom: 60px;
        }
        .form-control{
            background-color: #F7F7F7;
        }
        </style>        <script type="text/javascript"> var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-7977306-1']); _gaq.push(['_trackPageview']); (function() { var ga = document.createElement('script'); ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; ga.setAttribute('async', 'true'); document.documentElement.firstChild.appendChild(ga); })(); </script>
        <!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//www.peruanalitica.com/analytics/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//www.peruanalitica.com/analytics/piwik.php?idsite=5" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
<!-- Facebook Conversion Code for Pixel de conversion - Registros Data Mining -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '1064200720291743');
fbq('track', "PageView");
fbq('track', 'CompleteRegistration');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1064200720291743&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
	</head>
	<body>
		<div class="container">
            <div class="text-center" style="position:relative;">
                <h3 class="graf--h2">
                    <div style="font-size: 30px;color: #B6B6B6;"></div>
                    <div style="color: #3E85C6;">Suscripción realizada</div>
                    <div style="color: #709F2F;"><h1><?=$_SESSION["mensaje"]?></h1></div>
                    <div style="font-size: 26px;">En caso la información solicitada no ha sido respondida en un plazo de 24 horas comunicarse con el siguiente número: <a href="tel:+975491764">975491764</a></div>
                </h3>
                <p>
                    <a href="http://survey.dataminingperu.com/suscripcion/">Volver al formulario de Suscripción</a>
                </p>
                <p>Visítanos en Facebok de: </p>
                <p>
                	<a href="https://www.facebook.com/datamining.pe" target="_blank">Data Mining</a>
                </p>
                <p>
                	<a href="https://www.facebook.com/bigdatasummit.pe" target="_blank">Big Data Analytics Summit</a>
                </p>

            </div>
        </div>
	</body>
</html>
